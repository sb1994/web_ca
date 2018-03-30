import Vue from 'vue';
import VueRouter from 'vue-router';


import Index from '../views/Index.vue';
import CreateEvent from '../views/event/CreateEvent.vue';
Vue.use(VueRouter);

const router = new VueRouter({
	//mode: 'history',
	base: __dirname,
	routes: [
        {
            path: '/',name:'index', component: Index 
        },
        {
            path: '/event/create',name:'event-create', component: CreateEvent 
        },
	]
})

export default router