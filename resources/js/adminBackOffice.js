import axios from 'axios'
import VueAxios from 'vue-axios'

import AppEleve from './vue/EleveCrud/AppEleve.vue'
import AddEleve from "./vue/EleveCrud/AddEleve.vue";
// import EditEleve from "./vue/EleveCrud/EditEleve";
import AllEleve from "./vue/EleveCrud/AllEleve.vue";


import { createApp } from 'vue';

const app = createApp();

app.component('AppEleve', AppEleve)
    .component('AddEleve', AddEleve)
    .component('AllEleve', AllEleve);
app.use(VueAxios, axios);
app.mount('#AppEleve');


