import { createApp } from 'vue';

//const app = Vue.createApp({});
import Accordion from './molecules/accordion/Accordion.vue';

const app = createApp({
	components: {
		accordion: Accordion,
	},
});

app.mount('#main');
