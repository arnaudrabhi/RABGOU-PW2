<template>
    <div>
        <h3 class="text-center">Ajouter un élève</h3>
        <div>

                <form @submit.prevent="sendPost">
                    <div class="form-group">
                        <label>Civilité</label>
                        <input type="text" class="form-control" v-model="form.civ" requiredF>
                    </div>

                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" v-model="form.nom" required>
                    </div>

                    <div class="form-group">
                        <label>Prenom</label>
                        <input type="text" class="form-control" v-model="form.prenom" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" v-model="form.email" required>
                    </div>

                    <div class="form-group">
                        <label>Classe</label>
                        <SelectItem v-model:value="form.classe_id" :values="classes" required/>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter élève</button>
                </form>

        </div>
    </div>
</template>

<script>
import SelectItem from '../Commun/SelectItem.vue'

export default {
    props: ['editEleve', 'eleve', 'classes'],

    components: {
        SelectItem
    },

    data() {
        return {
            createNew: false,
            form:{},
        }
    },

    created() {
        this.form = {
            civ: this.eleve.civ,
                nom: this.eleve.nom,
                prenom: this.eleve.prenom,
                email: this.eleve.email,
                classe_id: this.eleve.classe_id
        }
    },

    methods: {

        sendPost() {
            if (this.editEleve) {
                this.addPost();
            } else {
                this.editPost(this.eleve.id)
            }
        },
        addPost() {
            this.axios
                .post('http://localhost/RABGOU-PW2/public/eleves/add', this.form)
                .then(response => (
                    console.log(response.data)
                ))
                //.catch(error => console.log(error))
                // .finally(() => this.loading = false)
        },
        editPost(id) {
            this.axios
                .post('http://localhost/RABGOU-PW2/public/eleves/update/'+id, this.form)
                .then(response => (
                    console.log(response.data.ok)
                ))
                .catch(error => console.log(error))
        }
    },
}
</script>
