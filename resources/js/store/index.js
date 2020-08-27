import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    step1: {
        savedState: null,
        savedEmail: null,
        savedDateFrom: null,
        savedDateTo: null,
    },
});
