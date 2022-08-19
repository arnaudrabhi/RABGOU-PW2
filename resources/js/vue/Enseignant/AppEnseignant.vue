<script>
import AddEleve from "@/vue/Eleve/EleveForm.vue";

export default {
    data() {
        return {
            showAddEleve: false
        }
    },
    methods: {
        renderAddEleve() {
            this.showAddEleve = !this.showAddEleve;
        }
    }

}
</script>
<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">Élèves</span>
            <button @click="renderAddEleve">Ajouter un élève</button>
            <add-eleve
            v-if="showAddEleve">
            </add-eleve>

        </div>
        <br/>
    </div>
</template>


