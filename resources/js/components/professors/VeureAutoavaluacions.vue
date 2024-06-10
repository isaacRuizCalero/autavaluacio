<template>
    <div>
        <h2 class="text-center">Autoavaluacions</h2>
        <div v-if="loading" class="loader"></div>
        <div v-else class="card-container">
            <div v-for="(entry, index) in validEvaluations" :key="index" class="card">
                <div class="card-body">
                    <h5 class="card-title">Usuari ID: {{ entry.userId }}</h5>
                    <button class="btn btn-primary" @click="viewEvaluation(entry)">VEURE</button>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal" tabindex="-1" role="dialog" v-if="showModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Autoavaluació de l'Usuari ID: {{ selectedEvaluation.userId }}</h5>
                        <button type="button" class="close" @click="closeModal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Criteri d'Avaluació</th>
                                    <th>Nota</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(evaluation, evalIndex) in selectedEvaluation.evaluations" :key="evalIndex">
                                    <td>{{ evaluation.criteri_descripcio }}</td>
                                    <td>{{ evaluation.nota }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            allEvaluations: [],
            loading: true,
            showModal: false,
            selectedEvaluation: null
        };
    },
    computed: {
        validEvaluations() {
            return this.allEvaluations.filter(entry => entry.userId);
        }
    },
    mounted() {
        this.fetchEvaluations();
    },
    methods: {
        fetchEvaluations() {
            const evaluations = localStorage.getItem('submittedEvaluations');
            if (evaluations) {
                this.allEvaluations = JSON.parse(evaluations);
            }
            this.loading = false;
        },
        viewEvaluation(entry) {
            this.selectedEvaluation = entry;
            this.showModal = true;
        },
        closeModal() {
            this.showModal = false;
            this.selectedEvaluation = null;
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

.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    margin-top: 20px;
}

.card {
    width: 220px;
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin: 10px;
    padding: 20px;
    background-color: #fff;
    transition: box-shadow 0.3s ease;
}

.card:hover {
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
}

.card-body {
    text-align: center;
}

.card-title {
    font-size: 18px;
    margin-bottom: 10px;
}

.btn-primary {
    background-color: #007aff;
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
    color: white;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #005bb5;
}

.modal {
    display: block;
    background-color: rgba(0, 0, 0, 0.5);
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    z-index: 1050;
}

.modal-dialog {
    margin: 1.75rem auto;
    max-width: 600px;
}

.modal-content {
    background-color: #fff;
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    padding: 20px;
}

.modal-header, .modal-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 20px;
}

.modal-header {
    border-bottom: 1px solid #e0e0e0;
}

.modal-footer {
    border-top: 1px solid #e0e0e0;
}

.close {
    background: none;
    border: none;
    font-size: 1.5rem;
}

.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
}

.table th,
.table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}

.table tbody + tbody {
    border-top: 2px solid #dee2e6;
}

.table-bordered {
    border: 1px solid #dee2e6;
}

.table-bordered th,
.table-bordered td {
    border: 1px solid #dee2e6;
}

.table-bordered thead th,
.table-bordered thead td {
    border-bottom-width: 2px;
}
</style>
