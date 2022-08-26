<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <h1 class="h1">Enseignants</h1>

            <div class="row align-items-start v-btn-group--density-default">
                <div class="col">
                    <button
                        id="btnList"
                        class="btn btn-primary btn-lg"
                        @click="renderEnseignantTable"
                        :class="this.btnListClicked ? 'btn-dark' : ''"
                    >
                        Liste des enseignant
                    </button>
                </div>
                <div class="col">
                    <button
                        id="btnAdd"
                        class="btn btn-primary btn-lg"
                        @click="renderEnseignantForm"
                        :class="this.btnAddClicked ? 'btn-dark' : ''"
                    >
                        Ajouter un enseignant
                    </button>
                </div>
            </div>

            <br />

            <EnseignantForm
                v-if="showFormEnseignant"
                :Enseignant=Enseignant
                :classes="classes"
                :editEnseignant=editEnseignant>
            </EnseignantForm>

            <EnseignantTable
                v-if="showListEnseignant"
                :classes="classes"
                @editEnseignant='renderEditEnseignant($event)'>
            </EnseignantTable>

        </div>
        <br/>
    </div>
</template>
<script>

export default {
    data() {
        return {
            showFormEnseignant: false,
            editEnseignant: true,
            showListEnseignant: true,
            Enseignant: {},
            classes: [],
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
    },

    methods: {
        renderEnseignantForm() {
            this.Enseignant = {};
            this.showListEnseignant = false;
            this.showFormEnseignant = true;
            this.editEnseignant = true;

            this.btnListClicked = false;
            this.btnAddClicked = true;
        },
        renderEnseignantTable() {
            this.Enseignant = {};
            this.showFormEnseignant = false;
            this.showListEnseignant = true;
            this.editEnseignant = false;

            this.btnListClicked = true;
            this.btnAddClicked = false;

        },
        renderEditEnseignant(Enseignant) {
            this.Enseignant = Enseignant;
            this.showListEnseignant = false;
            this.showFormEnseignant = !this.showFormEnseignant;
            this.editEnseignant = false;

            this.btnListClicked = false;
            this.btnAddClicked = false;
        }
    }
}
</script>


