import axios from 'axios'
import VueAxios from 'vue-axios'

import EleveView from './vue/Eleve/EleveView.vue'
import EleveForm from "./vue/Eleve/EleveForm.vue";
import EleveTable from "./vue/Eleve/EleveTable.vue";


import EnseignantView from './vue/Enseignant/EnseignantView.vue'
import EnseignantForm from "./vue/Enseignant/EnseignantForm.vue";
import EnseignantTable from "./vue/Enseignant/EnseignantTable.vue";

import { createApp } from 'vue';
import appBackOffice from "./vue/appBackOffice.vue";

const app = createApp();

app.component('appBackOffice', appBackOffice);
app
    .component('EleveView', EleveView)
    .component('EleveForm', EleveForm)
    .component('EleveTable', EleveTable);

app
    .component('EnseignantView', EnseignantView)
    .component('EnseignantForm', EnseignantForm)
    .component('EnseignantTable', EnseignantTable);


app.use(VueAxios, axios);
app.mount('#appBackOffice');


