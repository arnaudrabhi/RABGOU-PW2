<template>
    <div class="container-sm">
        <h3 class="text-center">Tous les élèves</h3><br/>

        <table v-if="showTable" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Civilité</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Classe</th>
                <th>Moyenne</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="classe in classes" :key="classe.id">
                <td>{{ classe.id }}</td>
                <td>{{ classe.civ }}</td>
                <td>{{ classe.nom }}</td>
                <td>{{ classe.prenom }}</td>
                <td>{{ getClassesLib(classe.classe_id) }}</td>
                <td>{{ classe.moyenne }}</td>
                <td class="">
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="deletePost(classe.id)">Supprimer</button>
                    </div>
                    &nbsp
                    <div class="btn-group" role="group">
                        <button class="btn btn-primary" @click="editclasse(classe.id)">Modif.</button>
                    </div>
                </td>
            </tr>
            <tr v-if="!classes">
                <p>Non saisi.</p>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ['classe', 'classes'],

    data() {
        return {
            classes: [],
            showTable: false
        }
    },
    created() {
        this.axios
            .get('http://localhost/RABGOU-PW2/public/classes/all')
            .then(response => {
                this.classes = response.data;
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
                .delete(`http://localhost/RABGOU-PW2/public/classes/delete/${id}`)
                .then(response => {
                    let i = this.classes.map(item => item.id).indexOf(id); // find index of object
                    this.classes.splice(i, 1)
                });
        },
        editclasse(id) {
            this.$emit('editclasse', this.classes.filter(e => e.user_id === id)[0]);
        }
    },
}
</script>
