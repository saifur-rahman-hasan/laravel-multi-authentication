
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

// Imported Components
import SectionIntro from './../home/components/SectionIntro'
import SectionCategories from './components/SectionCategories'

Vue.component('section-intro', SectionIntro);
Vue.component('section-categories', SectionCategories);

var app = new Vue({

    el: '#app',
    data: {}

});