<template>

    <div v-if="dataLoaded">

        <div id="feuilleData">

            <div class="row row-cols-4">

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
                    <div class="btn-group" role="group">
                        <label for="elevePresent">Présent ?</label>
                        <input id="elevePresent" type="checkbox" class="btn btn-primary"
                            @change="present">
                    </div>
                    &nbsp
                    <div class="btn-group" role="group">
                        <label for="signatureEleve">Signature de l'élève</label>
                        <input id="signatureEleve" type="checkbox" class="btn btn-primary"
                               :value="eleve.statut_signature === 1 || eleve.statut_signature === 3"
                        >

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
        this.axios
            .get('http://localhost/RABGOU-PW2/public/emargement/' + this.feuilleId)
            .then(response => {
                this.feuilleEmargement = response.data;
                this.dataLoaded = true;
            })

    },
    methods: {
        elevePresent(id) {

        }
    }

}
</script>
