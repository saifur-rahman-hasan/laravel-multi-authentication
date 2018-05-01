
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

// Imported Components

const categoryDetailsData = window.category;

var app = new Vue({

    el: '#app',
    data: {
        category: categoryDetailsData
    },
    computed: {
        coverImageClassObject: function () {
            return {
                background: 'linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('+ category.image_url +')',
                backgroundSize: 'cover',
                minHeight: '450px',
                color: '#FFF'
            }
        }
    }

});