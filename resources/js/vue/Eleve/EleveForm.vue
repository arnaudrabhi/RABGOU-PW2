<template>
    <div>
        <h3 class="text-center">Ajouter un élève</h3>
        <div>

                <form @submit.prevent="sendPost">
                    <div class="form-group">
                        <label>Civilité</label>
                        <input type="text" class="form-control" v-model="eleve.civ">
                    </div>

                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" v-model="eleve.nom">
                    </div>

                    <div class="form-group">
                        <label>Prenom</label>
                        <input type="text" class="form-control" v-model="eleve.prenom">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" v-model="eleve.email">
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter élève</button>
                </form>

        </div>
    </div>
</template>

<script>
export default {
    props: ['editEleve', 'eleve'],

    data() {
        return {
            createNew: false,
            form: {
                civ: this.eleve.civ,
                nom: this.eleve.nom,
                prenom: this.eleve.prenom,
                email: this.eleve.email
            },
        }
    },
    methods: {
        sendPost() {
            if (this.editEleveInForm) {
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
                .catch(error => console.log(error))
                // .finally(() => this.loading = false)
        },
        editPost(id) {
            this.axios
                .post('http://localhost/RABGOU-PW2/public/eleves/update/'.id, this.form)
                .then(response => (
                    console.log(response.data.ok)
                ))
                .catch(error => console.log(error))
        }
    },
}
</script>
