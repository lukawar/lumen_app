import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuetify from 'vuetify';
import app from './app.vue';
import 'vuetify/dist/vuetify.min.css';

Vue.use(VueRouter);
Vue.use(Vuetify);
Vue.component('app', app);

const Foo = {template: '<div>foot</div>'}
const Bar = {template: '<div>bart</div>'}

const router = new VueRouter({
    mode: 'history',
    base: '/',
    routes: [
        {path: '/foo', component: Foo},
        {path: '/bar', component: Bar}
    ]
});

new Vue({
    router,
    render: h => h(app),
    components: { app },
    vuetify: new Vuetify()
}).$mount('#app');
