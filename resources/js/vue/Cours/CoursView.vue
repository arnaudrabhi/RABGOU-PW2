<template>

    <div class="card">


        <div class="card-body">
            <div class="card-title">
                <h3 v-if="this.iseleve">
                    Feuille de présence
                </h3>
                <h3 v-else>
                    Cours actuel :
                </h3>
            </div>

            <div class="card-text">
                {{ this.cour[0].matiere }}
                <br />
                De {{ this.cour[0].date_heure_debut.date }} à {{ this.cour[0].date_heure_fin }}
            </div>

        </div>
    </div>

</template>

<script>

export default {

    name: "CoursView",

    props: ['iseleve', 'iduser'],

    data() {
        return {
            cour: []
        }
    },

    created() {
        this.axios
            .get('http://localhost/RABGOU-PW2/public/cours/actual/' + this.iduser)
            .then(response => {
                if (response != null) {
                    this.cour = response.data
                }

            })
    }


}


</script>

<style scoped>

</style>
