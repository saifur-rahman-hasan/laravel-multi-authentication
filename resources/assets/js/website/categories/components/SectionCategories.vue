<template>
    <div class="container">
        <div v-for="row in Math.ceil(categories.length / 4)" class="row">

            <div v-for="category in categories.slice((row - 1) * 4, row * 4)" class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="thumbnail">
                    <img :src="category.image_url" alt="">
                    <div class="caption">
                        <h3>{{ category.name }}</h3>
                        <p>
                            <a href="#" class="btn btn-primary" @click.prevent="redirectToCategoryDetails(category.id)">Action</a>
                            <a href="#" class="btn btn-default">Action</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>

    let categoriesData = window.categories;

    export default {

        name: 'sectionCategories',

        data(){
            return {

                categories: categoriesData

            }
        },

        methods:{
            redirectToCategoryDetails(categoryId){
                const categoryDetailsUrl = window.base_url + '/explore/categories/' + categoryId + '/show';
                location.href = categoryDetailsUrl;
            }
        }

    }
</script>