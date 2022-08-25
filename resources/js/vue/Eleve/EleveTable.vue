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
                <th>Classe</th>
                <th>Moyenne</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="eleve in eleves" :key="eleve.id">
                <td>{{ eleve.id }}</td>
                <td>{{ eleve.civ }}</td>
                <td>{{ eleve.nom }}</td>
                <td>{{ eleve.prenom }}</td>
                <td>{{ getClassesLib(eleve.classe_id) }}</td>
                <td>{{ eleve.moyenne }}</td>
                <td class="">
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="deletePost(eleve.id)">Supprimer</button>
                    </div>
                    &nbsp
                    <div class="btn-group" role="group">
                        <button class="btn btn-primary" @click="editEleve(eleve.id)">Modif.</button>
                    </div>
                </td>
            </tr>
            <tr v-if="!eleves">
                <p>Non saisi.</p>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import {filter} from "lodash/collection";

export default {
    props: ['eleve', 'classes'],

    data() {
        return {
            eleves: [],
            showTable: false
        }
    },
    created() {
        this.axios
            .get('http://localhost/RABGOU-PW2/public/eleves/all')
            .then(response => {
                this.eleves = response.data;
                this.showTable = true;
            });
    },

    methods: {
        getClassesLib(id) {
            return this.classes.filter(e => e.id === id)[0].nom;
        },

        deletePost(id) {
            this.axios
                .delete(`http://localhost/RABGOU-PW2/public/eleves/delete/${id}`)
                .then(response => {
                    let i = this.eleves.map(item => item.id).indexOf(id); // find index of object
                    this.eleves.splice(i, 1)
                });
        },
        editEleve(id) {
            this.$emit('editEleve', this.eleves.filter(e => e.user_id === id)[0]);
        }
    },
}
</script>
