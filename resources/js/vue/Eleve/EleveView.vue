<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <h1 class="h1">Élèves</h1>

            <div class="row align-items-start v-btn-group--density-default">
                <div class="col">
                    <button class="btn btn-primary btn-lg" @click="renderEleveTable">Liste des élèves</button>
                </div>
                <div class="col">
                    <button class="btn btn-primary btn-lg" @click="renderEleveForm">Ajouter un élève</button>
                </div>
            </div>

            <EleveForm
                v-if="showFormEleve"
                :eleve=eleve
                :classes="classes"
                :editEleve=editEleve>
            </EleveForm>

            <Eleve-table
                v-if="showListEleve"
                :classes="classes"
                @editEleve='renderEditEleve($event)'>
            </Eleve-table>

        </div>
        <br/>
    </div>
</template>
<script>

export default {
    data() {
        return {
            showFormEleve: false,
            editEleve: true,
            showListEleve: true,
            eleve: {},
            classes: {},
        }
    },

    created() {
        this.axios
            .get('http://localhost/RABGOU-PW2/public/classes/all')
            .then(response => {
                this.classes = response.data;
                this.showTable = true;
            });
    },

    methods: {
        renderEleveForm() {
            this.eleve = '';
            this.showListEleve = false;
            this.showFormEleve = true;
            this.editEleve = true;
        },
        renderEleveTable() {
            this.eleve = '';
            this.showFormEleve = false;
            this.showListEleve = true;
            this.editEleve = false;
        },
        renderEditEleve(eleve) {
            this.eleve = eleve;
            this.showListEleve = false;
            this.showFormEleve = !this.showFormEleve;
            this.editEleve = false;
        }
    }
}
</script>


