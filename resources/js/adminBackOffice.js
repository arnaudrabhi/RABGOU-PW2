import AddEleve from "./vue/EleveCrud/AddEleve.vue";
// import EditEleve from "./vue/EleveCrud/EditEleve";
import AllEleve from "./vue/EleveCrud/AllEleve.vue";
import axios from 'axios'
import VueAxios from 'vue-axios'

import { createApp } from 'vue'
import AppEleve from './vue/EleveCrud/AppEleve.vue'


const app = createApp()

app.component('AppEleve', AppEleve)
app.mount('#AppEleve')
app.use(VueAxios, axios)
app
    .component('AddEleve', AddEleve)
    .component('AllEleve', AllEleve)
    // .component('AddEleve', AddEleve)

