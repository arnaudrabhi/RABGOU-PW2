import axios from 'axios'
import VueAxios from 'vue-axios'

import EleveView from './vue/Eleve/EleveView.vue'
import EleveForm from "./vue/Eleve/EleveForm.vue";
import EleveTable from "./vue/Eleve/EleveTable.vue";


import { createApp } from 'vue';

const app = createApp();

app.component('EleveView', EleveView)
    .component('EleveForm', EleveForm)
    .component('EleveTable', EleveTable);
app.use(VueAxios, axios);
app.mount('#EleveView');


