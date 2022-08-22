<template>
    <div>
        <h3 class="text-center">Tous les élèves</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="eleve in eleves" :key="eleve.id">
                <td>{{ eleve.id }}</td>
                <td>{{ eleve.civ }}</td>
                <td>{{ eleve.nom }}</td>
                <td>{{ eleve.prenom }}</td>
                <td>{{ eleve.moyenne }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-danger" @click="deletePost(eleve.id)">Supprimer</button>
                    </div>
                    <div class="btn-group" role="group">
                        <button class="btn btn-light" @click="editEleve(eleve.id)">Modif.</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import {filter} from "lodash/collection";

export default {
    props: ['editEleve'],

    data() {
        return {
            eleves: []
        }
    },
    created() {
        this.axios
            .get('http://localhost/RABGOU-PW2/public/eleves/all')
            .then(response => {
                this.eleves = response.data;
            });
    },
    methods: {
        deletePost(id) {
            this.axios
                .delete(`http://localhost/RABGOU-PW2/public/eleves/delete/${id}`)
                .then(response => {
                    let i = this.eleves.map(item => item.id).indexOf(id); // find index of object
                    this.eleves.splice(i, 1)
                });
        },
        editEleve(id) {
            this.$emit('editEleve', this.eleves.filter(e => e.user_id === id));

        }
    }
}
</script>
