<template>
    <div>
        <Autoavaluacio @evaluation-submitted="handleEvaluationSubmitted" />
        <VeureAutoavaluacions :evaluations="evaluations" />
    </div>
</template>

<script>
import Autoavaluacio from './alumnes/Autoavaluacio.vue';
import VeureAutoavaluacions from './professors/VeureAutoavaluacions.vue';

export default {
    components: {
        Autoavaluacio,
        VeureAutoavaluacions
    },
    data() {
        return {
            evaluations: []
        };
    },
    methods: {
        handleEvaluationSubmitted(evaluations) {
            this.evaluations = evaluations;
        }
    }
};
</script>
