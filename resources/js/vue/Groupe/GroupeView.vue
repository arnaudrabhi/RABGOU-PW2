<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <h1 class="h1">Groupes</h1>

            <div class="row align-items-start v-btn-group--density-default">
                <div class="col">
                    <button
                        id="btnList"
                        class="btn btn-primary btn-lg"
                        @click="rendergroupeTable"
                        :class="this.btnListClicked ? 'btn-dark' : ''"
                    >
                        Liste des groupes
                    </button>
                </div>
                <div class="col">
                    <button
                        id="btnAdd"
                        class="btn btn-primary btn-lg"
                        @click="rendergroupeForm"
                        :class="this.btnAddClicked ? 'btn-dark' : ''"
                    >
                        Ajouter un groupes
                    </button>
                </div>
            </div>

            <br />

            <groupeForm
                v-if="showFormgroupe"
                :editgroupe=editgroupe>
            </groupeForm>

            <groupe-table
                v-if="showListgroupe"
                :groupes="groupes"
                @editgroupe='renderEditgroupe($event)'>
            </groupe-table>

        </div>
        <br/>
    </div>
</template>
<script>

export default {
    data() {
        return {
            showFormgroupe: false,
            editgroupe: true,
            showListgroupe: true,
            btnAddClicked: false,
            btnListClicked: true
        }
    },

    created() {
        this.axios
            .get('http://localhost/RABGOU-PW2/public/groupes/all')
            .then(response => {
                this.groupes = response.data;
                this.showTable = true;
            });
    },

    methods: {
        rendergroupeForm() {
            this.groupe = {};
            this.showListgroupe = false;
            this.showFormgroupe = true;
            this.editgroupe = true;

            this.btnListClicked = false;
            this.btnAddClicked = true;
        },
        rendergroupeTable() {
            this.groupe = {};
            this.showFormgroupe = false;
            this.showListgroupe = true;
            this.editgroupe = false;

            this.btnListClicked = true;
            this.btnAddClicked = false;

        },
        renderEditgroupe(groupe) {
            this.groupe = groupe;
            this.showListgroupe = false;
            this.showFormgroupe = !this.showFormgroupe;
            this.editgroupe = false;

            this.btnListClicked = false;
            this.btnAddClicked = false;
        }
    }
}
</script>


