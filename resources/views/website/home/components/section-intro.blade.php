@verbatim
    <div class="section-welcome" id="sectionIntroCarousel">

        <div class="jumbotron" style="background: url('assets/images/backgrounds/seamless.png')">
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
@endverbatim
