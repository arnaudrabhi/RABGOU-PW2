<template>
    <div class="container-sm align-content-center shadow-lg p-3 mb-5 bg-body rounded">
        <h3 class="text-center">Ajouter un élève</h3>
        <div>
                <form @submit.prevent="sendPost">

                    <div class="row g-2">
                        <div class="col">
                            <div class="form-group">
                                <label>Civilité</label>
                                <select v-model="form.civ" class="form-control">
                                    <option value="Mr">Mr</option>
                                    <option value="Mme">Mme</option>
                                    <option value="Mlle">Mlle</option>
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" v-model="form.nom" required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>Prenom</label>
                                <input type="text" class="form-control" v-model="form.prenom" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" v-model="form.email" required>
                    </div>

                    <div class="form-group">
                        <label>Classe</label>
                        <SelectItem v-model:value="form.classe_id" :values="classes" class="form-control" required/>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter élève</button>
                </form>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="messageModalLabel">Enregistrement de l'élève</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p v-if="response && response.data && response.data.user && response.data.user.nom && response.data.user.prenom && response.data.eleve.user_id" class="text-success"> L'élève {{response.data.user.nom}} {{response.data.user.prenom}} à été enregistré avec succès</p>
                        <p v-if="error"> Une erreur c'est produite lors de l'enregistrement de l'élève. Massage : {{error}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
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
            error: '',
            response: {}
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
            this.error = '';
            if (!this.editEleve) {
                this.editPost(this.eleve.id)
            } else {
                this.addPost();
            }
        },
        addPost() {
            this.axios
                .put('http://localhost/RABGOU-PW2/public/eleves/add', this.form)
                .then(response => (
                    console.log(response.data, this.response = response)
                ))
                .catch(error => console.log(error, this.error = error))
                .finally(() => this.form = {})
            $('#messageModal').modal('show');
        },
        editPost(id) {
            this.axios
                .post('http://localhost/RABGOU-PW2/public/eleves/update/'+id, this.form)
                .then(response => (
                    console.log(response.data.ok)
                ))
                .catch(error => console.log(error))
                .finally(() => this.form = {})
        }
    },
}
</script>
