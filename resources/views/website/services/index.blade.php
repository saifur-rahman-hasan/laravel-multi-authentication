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
                                            @foreach($categories as $category)
                                                <li><a href="{{ route('explore.categories.services', $category->id) }}">{{ $category->name }}</a></li>
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

                    @foreach($services->chunk(4) as $services_rows)
                        <div class="row">

                            @foreach($services_rows as $service)
                                <div class="col-sm-4">
                                    <div class="thumbnail">
                                        <div class="thumb">
                                            <img src="{{ $service->image_url }}" alt="">
                                            <div class="caption-overflow">
                                                <span>
                                                    <a href="{{ route('explore.services.show', $service->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="caption">
                                            <h6 class="text-semibold no-margin-top no-margin-bottom">{{ $service->name }}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endforeach

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