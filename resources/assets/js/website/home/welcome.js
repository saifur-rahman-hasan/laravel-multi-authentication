
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

import 'owl.carousel';

// Application for Section Intro
var sectionIntroCarousel = new Vue({

    el: '#sectionIntroCarousel',

    data: {

        appName: 'Get you Go',

        activatedCarouselItem: 0,

        carouselItems: [
            {
                image: 'https://staticfiles.hellotoby.com/hellotoby-icon/landing-page/landing-banner-trainer-m.jpg',
                title: 'Looking for any service today?',
                subTitle: 'Let Get you Go help you with over 600 services.',
                buttonText: 'Get started now',
                buttonUrl: '#'
            },

            {
                image: 'https://staticfiles.hellotoby.com/hellotoby-icon/landing-page/landing-banner-photographer-m.jpg',
                title: 'Get the best pro for yourself',
                subTitle: 'Brows through thousands of service Pro\'s profile',
                buttonText: 'Explore now',
                buttonUrl: '#'
            }
        ]
    },

    mounted: function (){
        var carouselBlock = $('.carousel-block');

        carouselBlock.owlCarousel({
            autoplay: true,
            loop:true,
            margin:10,
            dots: true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                },
                600:{
                    items:1,
                },
                1000:{
                    items:1,
                    loop:false
                },
                1800:{
                    items:1,
                    loop:true
                }
            }
        });

    }

});