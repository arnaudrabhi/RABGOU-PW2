<script>
import EleveForm from "@/vue/Eleve/EleveForm.vue";

export default {
    data() {
        return {
            showEleveForm: false
        }
    },
    methods: {
        renderEleveForm() {
            this.showEleveForm = !this.showEleveForm;
        }
    }

}
</script>
<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">Élèves</span>
            <button @click="renderEleveForm">Ajouter un élève</button>
            <add-eleve
            v-if="showEleveForm">
            </add-eleve>

        </div>
        <br/>
    </div>
</template>


