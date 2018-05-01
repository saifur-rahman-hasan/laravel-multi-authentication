<template>
    <div class="section-welcome" id="sectionIntro">

        <div class="jumbotron" style="background: url('../../../assets/images/backgrounds/seamless.png')">
            <div class="container">

                <h1>{{ categoryName }}</h1>

                <a href="#" class="btn btn-lg btn-success">View available services</a>

            </div>
        </div>

    </div>
</template>

<script>
    import 'owl.carousel';

    export default {
        name: 'SectionCategoryCover',

        props: [ 'categoryName', 'categoryCoverImageUrl' ],

        data(){
            return {}
        }
    }
</script>