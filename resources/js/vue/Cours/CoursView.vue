<template>

    <span class="">
        <button v-if="this.authuser.role === 1" class="btn-primary btn-lg" @click="this.iseleve = !this.iseleve">Preview éleve / enseignant</button>
    </span>
    <br />
    <br />


    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3>
                    Cours actuel
                </h3>
            </div>

            <div class="card-text" v-if="this.cour[0] && this.iseleve">

                {{ this.cour[0] ? this.cour[0].matiere : '' }}
                <br />
                De {{ this.cour[0] ? this.cour[0].date_heure_debut : '' }} à {{ this.cour[0] ? this.cour[0].date_heure_fin : '' }}
            </div>
            <div class="card-text" v-if="this.cour[0] && !this.iseleve">
                {{ this.cour[0] ? this.cour[0].matiere : '' }}
                <br />
                De {{ this.cour[0] ? this.cour[0].date_heure_debut : '' }} à {{ this.cour[0] ? this.cour[0].date_heure_fin : '' }}
            </div>
            <div class="card-text" v-if="!this.cour[0]">
                Aucun cours actuellement
            </div>
            <br />
            <div class="card-text" v-if="this.cour[0] && this.iseleve && !hasSignedAlready">
                <a class="btn btn-primary" @click="signFeuille">Signer la feuille d'émargement</a>
            </div>
            <div class="card-text" v-else-if="this.cour[0] && this.iseleve && hasSignedAlready">
                La feuille a déjà été signée
            </div>
            <div class="v-card-text" v-if="this.cour[0] && !this.iseleve">
                <a class="btn btn-primary">Ouvrir la feuille d'émargement</a>
            </div>


        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Enregistrement de l'élève</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p v-if="signSuccess" class="text-success"> La signature à été enregistré avec succès</p>
                    <p v-if="error"> Une erreur c'est produite lors de l'enregistrement de la signature. Massage : {{error}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

import SelectItem from '../Commun/SelectItem.vue'

export default {

    name: "CoursView",

    props: ['iseleveprop', 'authuser'],

    components: {
        SelectItem
    },
    data() {
        return {
            cour: {},
            iseleve: this.iseleveprop,
            error: '',
            signSuccess: false,
            hasSignedAlready: false
        }
    },

    created() {
        this.axios
            .get('http://localhost/RABGOU-PW2/public/cours/actual/' + this.authuser.id)
            .then(response => {
                if (response != null) {
                    this.cour = response.data
                    this.hasSigned();
                }
            })



    },
    methods: {
        signFeuille() {
            this.axios
                .get('http://localhost/RABGOU-PW2/public/cours/' + this.cour[0].id + '/sign/' + this.authuser.id)
                .then(response => {
                    this.signSuccess = true
                })
                .catch(error => console.log(error, this.error = error))

            $('#messageModal').modal('show');
        },
        hasSigned() {
            this.axios
                .get('http://localhost/RABGOU-PW2/public/cours/' + this.cour[0].id + '/hassigned/' + this.authuser.id)
                .then(response => {
                    this.hasSignedAlready = response.data.hassigned;
                })
                .catch(error => console.log(error, this.error = error))
        }

    }


}


</script>

<style scoped>

</style>
