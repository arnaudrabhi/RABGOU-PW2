import axios from 'axios'
import VueAxios from 'vue-axios'
import EmargementView from './vue/emargement/EmargementView.vue'
import EmargementDetail from './vue/emargement/EmargementDetail.vue'

import { createApp } from 'vue';

const app = createApp();

app.component('EmargementView', EmargementView)
    .component('EmargementDetail', EmargementDetail);
app.use(VueAxios, axios);
app.mount('#EmargementView');


