<div class="section section-popular-services" id="popularServices">
    <div class="container">
        <div class="row">

            <div v-if="categories.length > 0">
                <!-- Left Column [ Services by Category ] -->
                <div class="col-sm-9">

                    <!-- Popular Service Heading -->
                    @include('website.home.components.popular-services-heading')
                    <!-- /Popular Service Heading -->

                    <div v-if="servicesByCategory.length > 0">
                        <div class="row">

                            <div v-for="(service, index) in servicesByCategory" class="col-sm-4">

                                <div class="thumbnail">
                                    <div class="thumb">
                                        <img :src="service.image_url" alt="">
                                        <div class="caption-overflow">
                                    <span>
                                        <a href="assets/images/placeholder.jpg" class="btn btn-flat border-white text-white btn-rounded btn-icon" data-popup="lightbox"><i class="icon-zoomin3"></i></a>
                                        <a href="#" class="btn btn-flat border-white text-white btn-rounded btn-icon"><i class="icon-link"></i></a>
                                    </span>
                                        </div>
                                    </div>

                                    <div class="caption">
                                        <h6 class="text-semibold no-margin-top">@{{ service.name }}</h6>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div v-else class="alert alert-warning alert-important">
                        <strong>Warning:</strong> Sorry! there is no available service associated with this selected category.
                    </div>

                </div>
                <!-- /Left Column [ Services by Category ] -->

                <!-- Right Column [ Service Categories ] -->
                <div class="col-sm-3">

                    <ul class="list-group">
                        <li v-for="(category, index) in categories">
                            <a href="#" @click.prevent="loadServicesByCategoryId(index)" class="list-group-item">@{{ category.name }}</a>
                        </li>
                    </ul>

                </div>
                <!-- /Right Column [ Service Categories ] -->
            </div>

            <div v-else class="alert alert-warning alert-important">
                <strong>Warning:</strong> Sorry! there is no available service categories found to show.
            </div>

        </div>
    </div>
</div>