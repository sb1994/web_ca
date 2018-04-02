import Vue from 'vue';
import VueRouter from 'vue-router';


import Index from '../views/Index.vue';
import CreateEvent from '../views/event/CreateEvent.vue';
import ShowEvent from '../views/event/ShowEvent.vue';
import EditEvent from '../views/event/EditEvent.vue';
Vue.use(VueRouter);

const router = new VueRouter({
	//mode: 'history',
	base: __dirname,
	routes: [
        {
            path: '/',name:'index', component: Index 
        },
        {
            path: '/:id',name:'show_event', component: ShowEvent 
        },
        {
            path: '/edit/:id',name:'edit_event', component: EditEvent 
        },
        {
            path: '/event/create',name:'event-create', component: CreateEvent 
        },
	]
})

export default router