import axios from 'axios'
import VueAxios from 'vue-axios'

import AppEleve from './vue/Eleve/EleveView.vue'
import AddEleve from "./vue/Eleve/EleveForm.vue";
// import EditEleve from "./vue/Eleve/EditEleve";
import AllEleve from "./vue/Eleve/EleveTable.vue";


import { createApp } from 'vue';

const app = createApp();

app.component('AppEleve', AppEleve)
    .component('AddEleve', AddEleve)
    .component('AllEleve', AllEleve);
app.use(VueAxios, axios);
app.mount('#AppEleve');


