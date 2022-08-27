<template>

    <div>
        <h3 v-if="showTable" class="h3">Feuilles d'émargements</h3>
        <table class="table table-bordered table-hover" v-if="showTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Classe</th>
                <th>Cours</th>
                <th>Enseignant</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="feuilleEmargement in feuilleEmargements" :key="feuilleEmargement.id">
                <td>{{ feuilleEmargement.id }}</td>
                <td>{{ feuilleEmargement.classe.nom }}</td>
                <td>{{ feuilleEmargement.cours.matiere }}</td>
                <td>{{ feuilleEmargement.enseignant.civ }} {{ feuilleEmargement.enseignant.nom }}</td>
                <td>De {{ feuilleEmargement.cours.date_heure_debut }}<br />à {{ feuilleEmargement.cours.date_heure_fin }}</td>
                <td class="">
                    <div class="btn-group" role="group">
                        <button class="btn btn-primary" @click="renderDetail(feuilleEmargement.id)">Afficher</button>
                    </div>
                    &nbsp
                </td>
            </tr>
            </tbody>
        </table>

        <emargement-detail
            v-if="showDetail"
            :feuilleId="feuilleEmargementID"
        >

        </emargement-detail>

    </div>

</template>

<script>
export default {
    name: "EmargementView",

    data() {
        return {
            feuilleEmargements: [],
            showTable: true,
            showDetail: false,
            feuilleEmargementID: 0
        }
    },
    created() {
        this.axios
            .get('http://localhost/RABGOU-PW2/public/emargement/all')
            .then(response => {
                this.feuilleEmargements = response.data;
                this.showTable = true;
            })
            .finally(() =>this.showTable = true);

    },
    methods: {
        renderDetail(id) {
            this.feuilleEmargementID = id;
            setTimeout(() => {}, 500);
            this.showTable = false;
            this.showDetail = true;
        }
    }

}
</script>
