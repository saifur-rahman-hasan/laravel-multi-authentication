@extends('website.layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('css/website/home/welcome.css') }}" />
@endpush

@section('body-attrs')
    class="navbar-top has-detached-left"
@stop

@section('content')

    <div class="content">
        <div class="container">
            <div class="row">

                <!-- Left Column [ Categories List ] -->
                <div class="col-sm-3">
                    <div class="sidebar-detached">
                        <div class="sidebar sidebar-default">
                            <div class="sidebar-content">

                                <!-- Sub navigation -->
                                <div class="sidebar-category">
                                    <div class="category-content no-padding">
                                        <ul class="navigation navigation-alt navigation-accordion">
                                            <li class="navigation-header">Categories</li>
                                            @foreach($categories as $categoryList)
                                                <li><a href="{{ route('explore.categories.services', $categoryList->id) }}">{{ $categoryList->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- /sub navigation -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Left Column [ Categories List ] -->

                <!-- Right Column [ Services List ] -->
                <div class="col-sm-9">
                    @if(!empty($category) && count($category->services()->get()) )

                        @foreach( $category->services()->get()->chunk(3) as $services)
                            <div class="row">
                                @foreach($services as $service)
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <div class="thumbnail">
                                            <img src="{{ $service->getImage() }}" alt="">
                                            <div class="caption">
                                                <h3>
                                                    <a href="{{ route('explore.services.show', $service->id) }}">{{ $service->name }}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                    @else
                        <div class="alert alert-important alert-warning">
                            <strong>Notice:</strong> Sorry there is no available service found to show.
                        </div>
                    @endif
                </div>
                <!-- ./Right Column [ Services List ] -->

            </div>
        </div>
    </div>

@stop

@push('scripts-plugin')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/prism.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/sidebar_dual.js') }}"></script>
@endpush