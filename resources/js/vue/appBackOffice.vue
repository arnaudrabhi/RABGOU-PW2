<template>

    <div>
        <div class="align-items-start v-btn-group--density-default shadow rounded-bottom border border-primary border-3">
            <div class="row">
                <div class="col-2">
                    <h4 class="h3 mt-3 mb-3 ml-3 pt-0 font-weight-bold">Back&nbspOffice</h4>
                </div>
                <div class="col">
                    <div class="btn-group mt-3 mb-3 mr-3 pl-2" role="group">
                        <button class="btn btn-primary" @click="renderEleve">Elève</button>
                        <button class="btn btn-primary" @click="renderEnseignant">Enseignant</button>
                        <button class="btn btn-primary" @click="renderClasse">Classe</button>
                        <button class="btn btn-primary" @click="renderGroupe">Groupe</button>
                    </div>
                </div>
            </div>

        </div>

        <div id="EleveView" v-if="this.showEleve">
            <eleve-view></eleve-view>
        </div>

        <div id="EnseignantView" v-else-if="this.showEnseignant">
            <enseignant-view></enseignant-view>
        </div>

        <div id="ClasseView" v-else-if="this.showClasse">
            <classe-view></classe-view>
        </div>

        <div id="GroupeView" v-else-if="this.showGroupe">
            <groupe-view></groupe-view>
        </div>
    </div>




</template>

<script>
export default {
    name: "appBackOffice",

    data() {
        return {
            showEleve: true,
            showEnseignant: false,
            showClasse: false,
            showGroupe: false
        }
    },

    methods: {
        renderEleve() {
            this.showEnseignant = false;
            this.showClasse = false;
            this.showGroupe = false;
            this.showEleve = true;
        },
        renderEnseignant() {
            this.showClasse = false;
            this.showGroupe = false;
            this.showEleve = false;
            this.showEnseignant = true;
        },
        renderClasse() {
            this.showEnseignant = false;
            this.showGroupe = false;
            this.showEleve = false;
            this.showClasse = true;
        },
        renderGroupe() {
            this.showEnseignant = false;
            this.showEleve = false;
            this.showClasse = false;
            this.showGroupe = true;
        }
    }
}

</script>

