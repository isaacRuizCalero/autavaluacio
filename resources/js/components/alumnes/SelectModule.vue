<template>
    <div class="container mt-5">
        <h2>Seleccionar Mòdul</h2>
        <div class="form-group">
            <label for="moduleSelect">Tria un mòdul:</label>
            <select class="form-control" v-model="selectedModule" id="moduleSelect">
                <option v-for="module in modules" :key="module.id" :value="module.id">
                    {{ module.codi }} {{ module.nom }}
                </option>
            </select>
        </div>
        <button class="btn btn-primary mt-3" @click="goToEvaluation">Continuar</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            modules: [],
            selectedModule: null,
        };
    },
    mounted() {
        this.fetchModules();
    },
    methods: {
        fetchModules() {
            fetch('/autavaluacio/public/api/modul')
                .then(response => response.json())
                .then(data => {
                    this.modules = data.data;
                })
                .catch(error => {
                    console.error("Error fetching modules:", error);
                });
        },
        goToEvaluation() {
            if (this.selectedModule) {
                window.location.href = `/autavaluacio/public/alumnes/autoavaluacio/${this.selectedModule}`;
            }
        },
    },
};
</script>

<style scoped>
/* Estilos específicos del componente */
</style>
