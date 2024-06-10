<template>
    <div class="container mt-5">
        <h2 class="text-center">Autoavaluació del Mòdul</h2>
        <div v-if="loading" class="loader"></div>
        <div v-else>
            <table class="table table-bordered table-modern">
                <thead>
                    <tr>
                        <th>Resultat d'Aprenentatge</th>
                        <th>Criteris d'Avaluació</th>
                        <th>Rúbriques</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="result in results" :key="result.id">
                        <tr v-for="(criteri, index) in result.criteris" :key="criteri.id">
                            <td v-if="index === 0" :rowspan="result.criteris.length">{{ result.descripcio }}</td>
                            <td>{{ criteri.descripcio }}</td>
                            <td>
                                <ul class="rubriques-list">
                                    <li v-for="rubrica in criteri.rubriques" :key="rubrica.id"><b>Nivell {{ rubrica.nivell }}:</b> {{ rubrica.descripcio }}</li>
                                </ul>
                            </td>
                            <td>
                                <select v-model="criteri.nota" class="form-control nota-select">
                                    <option v-for="n in [0, 1, 2, 3]" :key="n" :value="n">{{ n }}</option>
                                </select>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
            <button class="btn btn-primary mt-3 w-100" @click="submitEvaluation">Enviar Autoavaluació</button>
        </div>
        <div v-if="message" class="alert alert-success mt-3" role="alert">
            {{ message }}
        </div>
        <div v-if="submittedEvaluations.length" class="mt-3">
            <h4 class="text-center">Evaluaciones Enviadas</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Usuari ID</th>
                        <th>Criteri d'Avaluació</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(evaluation, index) in submittedEvaluations" :key="index">
                        <td>{{ evaluation.usuaris_id }}</td>
                        <td>{{ evaluation.criteri_descripcio }}</td>
                        <td>{{ evaluation.nota }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            results: [],
            moduleId: null,
            loading: true,
            message: null,
            submittedEvaluations: []
        };
    },
    mounted() {
        this.moduleId = window.location.pathname.split('/').pop();
        this.fetchResults();
    },
    methods: {
        fetchResults() {
            fetch(`/autavaluacio/public/api/resultat-aprenentatge?moduls_id=${this.moduleId}`)
                .then(response => response.json())
                .then(data => {
                    this.results = data.data.map(result => ({
                        ...result,
                        criteris: [],
                        nota: 0
                    }));
                    this.fetchAllCriterisAndRubriques();
                })
                .catch(error => {
                    console.error("Error fetching results:", error);
                });
        },
        fetchAllCriterisAndRubriques() {
            const criteriPromises = this.results.map(result =>
                fetch(`/autavaluacio/public/api/criteri-avaluacio?resultats_aprenentatge_id=${result.id}`)
                    .then(response => response.json())
                    .then(data => {
                        result.criteris = data.data.map(criteri => ({
                            ...criteri,
                            rubriques: [],
                            nota: 0
                        }));

                        const rubricaPromises = result.criteris.map(criteri =>
                            fetch(`/autavaluacio/public/api/rubriques?criteris_avaluacio_id=${criteri.id}`)
                                .then(response => response.json())
                                .then(rubriquesData => {
                                    criteri.rubriques = rubriquesData.data;
                                })
                                .catch(error => {
                                    console.error(`Error fetching rubriques for criteri ${criteri.id}:`, error);
                                })
                        );

                        return Promise.all(rubricaPromises);
                    })
                    .catch(error => {
                        console.error(`Error fetching criteris for result ${result.id}:`, error);
                    })
            );

            Promise.all(criteriPromises)
                .then(() => {
                    this.loading = false;
                    console.log('All criteris and rubriques fetched');
                })
                .catch(error => {
                    console.error("Error fetching all criteris and rubriques:", error);
                    this.loading = false;
                });
        },
        getUserId() {
            return window.Laravel.userId;
        },
        submitEvaluation() {
            const userId = this.getUserId();
            const evaluations = this.results.flatMap(result => 
                result.criteris.map(criteri => ({
                    usuaris_id: userId,
                    criteris_avaluacio_id: criteri.descripcio,
                    criteri_descripcio: criteri.descripcio,
                    nota: criteri.nota
                }))
            );

            console.log('Submitting evaluations:', evaluations);

            this.submittedEvaluations = evaluations;

            // Obtener las evaluaciones almacenadas en localStorage
            let allEvaluations = JSON.parse(localStorage.getItem('submittedEvaluations')) || [];

            // Agregar las nuevas evaluaciones
            allEvaluations.push({ userId, evaluations });

            // Guardar el array actualizado en localStorage
            localStorage.setItem('submittedEvaluations', JSON.stringify(allEvaluations));

            this.message = 'Autoavaluació enviada correctament!';
        }
    }
};
</script>

<style scoped>
/* Estilos específicos del componente */
.loader {
    border: 6px solid #f3f3f3;
    border-radius: 50%;
    border-top: 6px solid #3498db;
    width: 50px;
    height: 50px;
    animation: spin 2s linear infinite;
    margin: 50px auto;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.table-modern {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.table-modern th, .table-modern td {
    padding: 15px;
    vertical-align: middle;
    border: none;
}

.table-modern thead th {
    background-color: #6c757d;
    color: #fff;
    border-bottom: 2px solid #dee2e6;
}

.table-modern tbody tr:nth-child(even) {
    background-color: #f8f9fa;
}

.table-modern tbody tr:hover {
    background-color: #e9ecef;
}

.rubriques-list {
    padding-left: 20px;
}

.nota-select {
    border-radius: 5px;
    background-color: #f8f9fa;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    border-radius: 5px;
    font-weight: bold;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
}

.alert {
    text-align: center;
    font-weight: bold;
}
</style>
