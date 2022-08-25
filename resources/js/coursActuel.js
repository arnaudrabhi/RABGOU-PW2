import axios from 'axios'
import VueAxios from 'vue-axios'
import CoursView from './vue/Cours/CoursView.vue'

import { createApp } from 'vue';

const app = createApp();

app.component('CoursView', CoursView);
app.use(VueAxios, axios);
app.mount('#CoursView');


