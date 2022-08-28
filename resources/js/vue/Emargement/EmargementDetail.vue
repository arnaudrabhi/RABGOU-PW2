<template>

    <div v-if="dataLoaded">

        <div id="feuilleData">
            <div class="row">
                <div class="col border">
                    Classe : <br />
                     {{ feuilleEmargement.classe.nom }}
                </div>
                <div class="col border">
                    Matière : <br />
                    {{ feuilleEmargement.cours.matiere }}
                </div>
                <div class="col border">
                    Horaire : <br />
                    De {{ feuilleEmargement.cours.date_heure_debut }} <br />
                    à {{ feuilleEmargement.cours.date_heure_fin }}
                </div>
                <div class="col border">
                    Enseignant : <br />
                    {{ feuilleEmargement.enseignant.civ }}&nbsp{{ feuilleEmargement.enseignant.nom }}
                </div>
            </div>
            <div class="row">
                <button class="btn btn-primary" @click="getFeuilleEmargement">Rafraîchir la liste</button>
            </div>
        </div>


        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Civilité</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="eleve in feuilleEmargement.eleves" :key="feuilleEmargement.eleves.id">
                <td>{{ eleve.id }}</td>
                <td>{{ eleve.civ }}</td>
                <td>{{ eleve.nom }}</td>
                <td>{{ eleve.prenom }}</td>
                <td class="">
                    <div class="form-check">
                        <input id="elevePresent" type="checkbox" class="form-check-input"
                            @click="elevePresent(eleve.id)"
                            :disabled="eleve.statut_signature === 3"
                            :checked="eleve.statut_signature === 3"
                        >
                        <label for="elevePresent" class="form-check-label">Présent ?</label>
                    </div>
                    <div class="form-check">
                        <input id="signatureEleve" type="checkbox" class="form-check-input"
                               :value="eleve.statut_signature !== 0"
                               :checked="eleve.statut_signature !== 0"
                               disabled
                        >
                        <label for="signatureEleve" class="form-check-label">Signature de l'élève</label>

                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <div>

        </div>
    </div>

</template>

<script>
export default {
    name: "EmargementDetail",

    props: ['feuilleId'],

    data() {
        return {
            feuilleEmargement: {},
            dataLoaded: false

        }
    },
    created() {
       this.getFeuilleEmargement()

    },
    methods: {
        elevePresent(id) {
            this.axios
                .get('http://localhost/RABGOU-PW2/public/emargement/' + this.feuilleId + '/presence/' + id)
            this.getFeuilleEmargement()
        },
        getFeuilleEmargement() {
            this.axios
                .get('http://localhost/RABGOU-PW2/public/emargement/' + this.feuilleId)
                .then(response => {
                    this.feuilleEmargement = response.data;
                    this.dataLoaded = true;
                })
        }
    }

}
</script>
