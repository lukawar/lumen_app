import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuetify from 'vuetify';
import app from './app.vue';
import store from './store/index.js';
import 'vuetify/dist/vuetify.min.css';

Vue.use(VueRouter);
Vue.use(Vuetify);
Vue.component('app', app);

const router = new VueRouter({
    mode: 'history',
    base: '/',
    routes: [
       // {path: '/foo', component: Foo}
    ]
});

new Vue({
    router,
    store,
    render: h => h(app),
    components: { app },
    vuetify: new Vuetify()
}).$mount('#app');
