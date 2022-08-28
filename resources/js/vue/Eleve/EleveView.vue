<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <h1 class="h1">Élèves</h1>

            <div class="row align-items-start v-btn-group--density-default">
                <div class="col">
                    <button
                        id="btnList"
                        class="btn btn-primary btn-lg"
                        @click="renderEleveTable"
                        :class="this.btnListClicked ? 'btn-dark' : ''"
                    >
                        Liste des élèves
                    </button>
                </div>
                <div class="col">
                    <button
                        id="btnAdd"
                        class="btn btn-primary btn-lg"
                        @click="renderEleveForm"
                        :class="this.btnAddClicked ? 'btn-dark' : ''"
                    >
                        Ajouter un élève
                    </button>
                </div>
            </div>

            <br />

            <EleveForm
                v-if="showFormEleve"
                :eleve=eleve
                :classes="classes"
                :groupes="groupes"
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
            classes: [],
            groupes: [],
            btnAddClicked: false,
            btnListClicked: true
        }
    },

    created() {
        this.axios
            .get('http://localhost/RABGOU-PW2/public/classes/all')
            .then(response => {
                this.classes = response.data;
                this.showTable = true;
            });
        this.axios
            .get('http://localhost/RABGOU-PW2/public/groupes/all')
            .then(response => {
                this.groupes = response.data;
                this.showTable = true;
            });
    },

    methods: {
        renderEleveForm() {
            this.eleve = {};
            this.showListEleve = false;
            this.showFormEleve = true;
            this.editEleve = true;

            this.btnListClicked = false;
            this.btnAddClicked = true;
        },
        renderEleveTable() {
            this.eleve = {};
            this.showFormEleve = false;
            this.showListEleve = true;
            this.editEleve = false;

            this.btnListClicked = true;
            this.btnAddClicked = false;

        },
        renderEditEleve(eleve) {
            this.eleve = eleve;
            this.showListEleve = false;
            this.showFormEleve = !this.showFormEleve;
            this.editEleve = false;

            this.btnListClicked = false;
            this.btnAddClicked = false;
        }
    }
}
</script>


