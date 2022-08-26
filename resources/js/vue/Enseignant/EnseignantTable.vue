<template>
    <div class="container-sm">
        <h3 class="text-center">Tous les élèves</h3><br/>

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
            <tr v-for="Enseignant in Enseignants" :key="Enseignant.id">
                <td>{{ Enseignant.id }}</td>
                <td>{{ Enseignant.civ }}</td>
                <td>{{ Enseignant.nom }}</td>
                <td>{{ Enseignant.prenom }}</td>
                <td class="">
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="deletePost(Enseignant.id)">Supprimer</button>
                    </div>
                    &nbsp
                    <div class="btn-group" role="group">
                        <button class="btn btn-primary" @click="editEnseignant(Enseignant.id)">Modif.</button>
                    </div>
                </td>
            </tr>
            <tr v-if="!Enseignants">
                <p>Non saisi.</p>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import {filter} from "lodash/collection";

export default {
    props: ['Enseignant'],

    data() {
        return {
            Enseignants: [],
            showTable: false
        }
    },
    created() {
        this.axios
            .get('http://localhost/RABGOU-PW2/public/Enseignants/all')
            .then(response => {
                this.Enseignants = response.data;
                this.showTable = true;
            });
    },

    methods: {
        getClassesLib(id) {
            return this.classes.filter(e => e.id === id)[0].nom;
        },

        deletePost(id) {
            this.axios
                .delete(`http://localhost/RABGOU-PW2/public/Enseignants/delete/${id}`)
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
