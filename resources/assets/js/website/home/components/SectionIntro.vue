<template>
    <div class="section-welcome" id="sectionIntro">

        <div class="jumbotron" style="background: url('../assets/images/backgrounds/seamless.png')">
            <div class="container">

                <div class="row">

                    <!-- Left Side -->
                    <div class="col-sm-5">
                        <br><br><br>

                        <h1 class="text-thin text-success">{{ appName }}</h1>
                        <h2 class="text-thin text-success">{{ carouselItems[activatedCarouselItem].title }}</h2>
                        <p>{{ carouselItems[activatedCarouselItem].subTitle }}</p>
                        <br>
                        <p>
                            <a :href="carouselItems[activatedCarouselItem].buttonUrl" class="btn btn-info btn-lg">{{ carouselItems[activatedCarouselItem].buttonText }}</a>
                        </p>
                    </div>
                    <!-- ./Left Side -->

                    <!-- Right Side -->
                    <div class="col-sm-7">
                        <div class="owl-carousel owl-theme carousel-block">

                            <div class="item" v-for="item in carouselItems">
                                <div class="thumbnail">
                                    <img :src="item.image" alt="Cover Image">
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Right Side -->

                </div>

            </div>
        </div>

    </div>
</template>

<script>
    import 'owl.carousel';

    export default {
        name: 'sectionIntro',

        data(){
            return {
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
            }
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

        },
        created(){

        }
    }
</script>