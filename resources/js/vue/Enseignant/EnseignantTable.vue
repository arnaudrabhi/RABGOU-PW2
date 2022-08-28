<template>
    <div class="container-sm">
        <h3 class="text-center">Tous les enseignants</h3><br/>

        <table v-if="showTable" class="table table-bordered">
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
            <tr v-for="enseignant in Enseignants" :key="Enseignant.id">
                <td>{{ enseignant.id }}</td>
                <td>{{ enseignant.civ }}</td>
                <td>{{ enseignant.nom }}</td>
                <td>{{ enseignant.prenom }}</td>
                <td class="">
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="deletePost(enseignant.id)">Supprimer</button>
                    </div>
                    &nbsp
                    <div class="btn-group" role="group">
                        <button class="btn btn-primary" @click="editEnseignant(enseignant.id)">Modif.</button>
                    </div>
                </td>
            </tr>
            <tr v-if="!enseignants">
                <p>Non saisi.</p>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ['enseignant'],

    data() {
        return {
            enseignants: [],
            showTable: false
        }
    },
    created() {
        this.axios
            .get('http://localhost/RABGOU-PW2/public/enseignants/all')
            .then(response => {
                this.enseignants = response.data;
                this.showTable = true;
            })
            .finally(() =>this.showTable = true);
    },

    methods: {
        getClassesLib(id) {
            return this.classes.filter(e => e.id === id)[0].nom;
        },

        deletePost(id) {
            this.axios
                .delete(`http://localhost/RABGOU-PW2/public/enseignants/delete/${id}`)
                .then(response => {
                    let i = this.Enseignants.map(item => item.id).indexOf(id); // find index of object
                    this.Enseignants.splice(i, 1)
                });
        },
        editEnseignant(id) {
            this.$emit('editEnseignant', this.Enseignants.filter(e => e.user_id === id)[0]);
        }
    },
}
</script>
