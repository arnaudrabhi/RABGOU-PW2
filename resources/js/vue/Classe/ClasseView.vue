<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <h1 class="h1">Élèves</h1>

            <div class="row align-items-start v-btn-group--density-default">
                <div class="col">
                    <button
                        id="btnList"
                        class="btn btn-primary btn-lg"
                        @click="renderclasseTable"
                        :class="this.btnListClicked ? 'btn-dark' : ''"
                    >
                        Liste des classes
                    </button>
                </div>
                <div class="col">
                    <button
                        id="btnAdd"
                        class="btn btn-primary btn-lg"
                        @click="renderclasseForm"
                        :class="this.btnAddClicked ? 'btn-dark' : ''"
                    >
                        Ajouter une classe
                    </button>
                </div>
            </div>

            <br />

            <classeForm
                v-if="showFormclasse"
                :classe=classe
                :classes="classes"
                :editclasse=editclasse>
            </classeForm>

            <classe-table
                v-if="showListclasse"
                :classes="classes"
                @editclasse='renderEditclasse($event)'>
            </classe-table>

        </div>
        <br/>
    </div>
</template>
<script>

export default {
    data() {
        return {
            showFormclasse: false,
            editclasse: true,
            showListclasse: true,
            classe: {},
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
        renderclasseForm() {
            this.classe = {};
            this.showListclasse = false;
            this.showFormclasse = true;
            this.editclasse = true;

            this.btnListClicked = false;
            this.btnAddClicked = true;
        },
        renderclasseTable() {
            this.classe = {};
            this.showFormclasse = false;
            this.showListclasse = true;
            this.editclasse = false;

            this.btnListClicked = true;
            this.btnAddClicked = false;

        },
        renderEditclasse(classe) {
            this.classe = classe;
            this.showListclasse = false;
            this.showFormclasse = !this.showFormclasse;
            this.editclasse = false;

            this.btnListClicked = false;
            this.btnAddClicked = false;
        }
    }
}
</script>


