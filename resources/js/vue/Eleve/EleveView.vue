<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">Élèves</span>

            <div class="row align-items-start">
                <div class="col">
                    One of three columns
                </div>
                <div class="col">
                    <p><button @click="renderAddEleve">Ajouter un élève</button></p>
                    <add-eleve
                        v-if="showFormEleve"
                        :eleve=eleve
                        :editEleve=editEleveInForm>
                    </add-eleve>
                </div>
                <div class="col">
                    One of three columns
                </div>
            </div>

            <div>
                <all-eleve
                    v-if="showListEleve"
                    @editEleve='renderEditEleve($event)'>
                </all-eleve>
            </div>

        </div>
        <br/>
    </div>
</template>
<script>
import AddEleve from "@/vue/Eleve/EleveForm.vue";

export default {
    data() {
        return {
            showFormEleve: false,
            editEleveInForm: true,
            showListEleve: true,
            eleve: '',
        }
    },
    methods: {
        renderAddEleve() {
            this.showListEleve = false;
            this.showFormEleve = !this.showFormEleve;
            this.editEleveInForm = true;
            this.eleve = '';
        },
        renderAllEleve() {

        },
        renderEditEleve(eleve) {
            this.eleve = eleve;
            this.showListEleve = false;
            this.showFormEleve = !this.showFormEleve;
            this.editEleveInForm = false;
        }
    }
}
</script>


