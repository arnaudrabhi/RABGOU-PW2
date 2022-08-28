<template>
    <div class="container-sm">
        <h3 class="text-center">Tous les groupes</h3><br/>

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
            <tr v-for="groupe in groupes" :key="groupe.id">
                <td>{{ groupe.id }}</td>
                <td>{{ groupe.civ }}</td>
                <td>{{ groupe.nom }}</td>
                <td>{{ groupe.prenom }}</td>
                <td>{{ getClassesLib(groupe.classe_id) }}</td>
                <td>{{ groupe.moyenne }}</td>
                <td class="">
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="deletePost(groupe.id)">Supprimer</button>
                    </div>
                    &nbsp
                    <div class="btn-group" role="group">
                        <button class="btn btn-primary" @click="editgroupe(groupe.id)">Modif.</button>
                    </div>
                </td>
            </tr>
            <tr v-if="!groupes">
                <p>Non saisi.</p>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import {filter} from "lodash/collection";

export default {
    props: ['groupe', 'classes'],

    data() {
        return {
            groupes: [],
            showTable: false
        }
    },
    created() {
        this.axios
            .get('http://localhost/RABGOU-PW2/public/groupes/all')
            .then(response => {
                this.groupes = response.data;
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
                .delete(`http://localhost/RABGOU-PW2/public/groupes/delete/${id}`)
                .then(response => {
                    let i = this.groupes.map(item => item.id).indexOf(id); // find index of object
                    this.groupes.splice(i, 1)
                });
        },
        editgroupe(id) {
            this.$emit('editgroupe', this.groupes.filter(e => e.user_id === id)[0]);
        }
    },
}
</script>
