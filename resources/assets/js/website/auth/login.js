/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

import VueResource from 'vue-resource'
import VueLocalStorage from 'vue-localstorage'

Vue.use(VueResource)
Vue.use(VueLocalStorage)

var loginApp = new Vue({

    el: '#app',

    data: {
        loggedIn: false,
        loggedInData: {
            loggedIn: true,
            apiAccessToken: null
        },
        loginCredentials: {
            email: null,
            password: null,
            remember: false
        },
        responseData: null
    },

    methods: {
        submitLoginForm(){
            const loginApiUrl = 'http://127.0.0.1:8000//api/login';

            this.$http.post(loginApiUrl, this.loginCredentials).then(function(response){

                this.responseData = response.body

                if( this.responseData.statusCode == 200 && this.responseData.data.loggedIn == true ){

                    this.loggedIn = true;

                    this.loggedInData = {
                        loggedIn: this.loggedIn,
                        apiAccessToken: this.responseData.data.apiAccessToken
                    }

                    this.$localStorage.set('loggedIn', this.loggedIn)

                    location.href = this.responseData.data.redirectRoute;

                }else{
                    this.loggedIn = false;
                    alert('Login Failed');
                }

            })
        }
    }

});