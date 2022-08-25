import axios from 'axios'
import VueAxios from 'vue-axios'




import { createApp } from 'vue';

const app = createApp();

app.component('EleveView', EleveView);
app.use(VueAxios, axios);
app.mount('#EleveView');


