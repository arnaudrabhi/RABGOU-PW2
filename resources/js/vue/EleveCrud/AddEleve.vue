<template>
    <div>
        <h3 class="text-center">Ajouter un élève</h3>
        <div class="row">
            <div class="col-md-6">

                <form @submit.prevent="addPost">
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
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                civ: "",
                nom: "",
                prenom:"",
                email:""
            }
        }
    },
    methods: {
        addPost() {
            this.axios
                .post('http://localhost/RABGOU-PW2/public/eleves/add', this.form)
                .then(response => (
                    console.log(response.data)
                ))
                .catch(error => console.log(error))
                // .finally(() => this.loading = false)
        }
    }
}
</script>
