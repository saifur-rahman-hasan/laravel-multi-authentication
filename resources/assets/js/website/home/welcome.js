
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

// Imported Components
import SectionIntro from './components/SectionIntro'
import SectionPopularService from './components/SectionPopularService'
import SectionPopularServiceProviders from './components/SectionPopularServiceProviders'

Vue.component('section-intro', SectionIntro);
Vue.component('section-popular-service', SectionPopularService);
Vue.component('section-popular-service-providers', SectionPopularServiceProviders);

var app = new Vue({

    el: '#app',
    data: {}

});