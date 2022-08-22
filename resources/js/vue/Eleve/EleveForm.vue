<template>
    <div>
        <h3 class="text-center">Ajouter un élève</h3>
        <div>

                <form @submit.prevent="sendPost">
                    <div class="form-group">
                        <label>Civilité</label>
                        <input type="text" class="form-control" v-model="form.civ">
                    </div>

                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" v-model="form.nom">
                    </div>

                    <div class="form-group">
                        <label>Prenom</label>
                        <input type="text" class="form-control" v-model="form.prenom">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" v-model="form.email">
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
                civ: "",
                nom: "",
                prenom:"",
                email:""
            },
        }
    },
    methods: {
        sendPost() {
            if (this.editEleveInForm) {
                this.addPost();
            } else {
                this.editPost(this.idEleveToEdit)
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
    watch: {

    }
}
</script>
