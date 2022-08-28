import axios from 'axios'
import VueAxios from 'vue-axios'

import EleveView from './vue/Eleve/EleveView.vue'
import EleveForm from "./vue/Eleve/EleveForm.vue";
import EleveTable from "./vue/Eleve/EleveTable.vue";
import EnseignantView from './vue/Enseignant/EnseignantView.vue'
import EnseignantForm from "./vue/Enseignant/EnseignantForm.vue";
import EnseignantTable from "./vue/Enseignant/EnseignantTable.vue";
import ClasseView from './vue/Classe/ClasseView.vue'
import ClasseForm from "./vue/Classe/ClasseForm.vue";
import ClasseTable from "./vue/Classe/ClasseTable.vue";
import GroupeView from './vue/Groupe/GroupeView.vue'
import GroupeForm from "./vue/Groupe/GroupeForm.vue";
import GroupeTable from "./vue/Groupe/GroupeTable.vue";

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
app
    .component('ClasseView', ClasseView)
    .component('ClasseForm', ClasseForm)
    .component('ClasseTable', ClasseTable);
app
    .component('GroupeView', GroupeView)
    .component('GroupeForm', GroupeForm)
    .component('GroupeTable', GroupeTable);


app.use(VueAxios, axios);
app.mount('#appBackOffice');


