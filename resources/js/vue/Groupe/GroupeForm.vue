<template>
    <div class="container-sm align-content-center shadow-lg p-3 mb-5 bg-body rounded">
        <h3 class="text-center">Ajouter un groupe</h3>
        <div>
                <form @submit.prevent="sendPost">

                    <div class="form-group">
                        <label>Libelle</label>
                        <input type="text" class="form-control" v-model="form.libelle" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter groupe</button>
                </form>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="messageModalLabel">Enregistrement du groupe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p v-if="response && response.data && response.data.groupe"> le groupe {{response.data.groupe.libelle }} à été enregistré avec succès</p>
                        <p v-if="error"> Une erreur c'est produite lors de l'enregistrement du groupe. Massage : {{error}}</p>
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
    props: ['editgroupe', 'groupe', 'classes'],

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
            libelle: this.groupe.libelle,
        }
    },

    methods: {

        sendPost() {
            this.error = '';
            if (this.editgroupe) {
                this.addPost();
            } else {
                this.editPost(this.groupe.id)
            }
        },
        addPost() {
            this.axios
                .put('http://localhost/RABGOU-PW2/public/groupes/add', this.form)
                .then(response => (
                    console.log(response.data, this.response = response)
                ))
                .catch(error => console.log(error, this.error = error))
                .finally(() => this.form = {})
            $('#messageModal').modal('show');
        },
        editPost(id) {
            this.axios
                .post('http://localhost/RABGOU-PW2/public/groupes/update/'+id, this.form)
                .then(response => (
                    console.log(response.data.ok)
                ))
                .catch(error => console.log(error))
                .finally(() => this.form = {})
        }
    },
}
</script>
