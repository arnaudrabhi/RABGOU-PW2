<script>
import AddEleve from "@/vue/EleveCrud/AddEleve.vue";

export default {
    data() {
        return {
            showAddEleve: false
        }
    },
    methods: {
        renderAddEleve() {
            this.showAddEleve = !this.showAddEleve;
        },
        renderAllEleve() {

        }
    }

}
</script>
<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">Élèves</span>

            <div class="row align-items-start">
                <div class="col">
                    One of three columns
                </div>
                <div class="col">
                    <p><button @click="renderAddEleve">Ajouter un élève</button></p>
                    <add-eleve
                        v-if="showAddEleve">
                    </add-eleve>
                </div>
                <div class="col">
                    One of three columns
                </div>
            </div>

            <div>
                <all-eleve></all-eleve>
            </div>

        </div>
        <br/>
    </div>
</template>


