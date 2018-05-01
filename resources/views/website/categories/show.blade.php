@extends('website.layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('css/website/home/welcome.css') }}" />
@endpush

@section('content')

    <!-- Section Category Cover -->
    <div class="section-category-image-cover">

        <div class="jumbotron" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ $category->image_url  }}); background-size: cover; min-height: 450px; color: #FFF">
            <div class="container text-center">

                <br> <br> <br>
                <h1>{{ $category->name }}</h1>

                <a href="#" class="btn btn-lg btn-success">View available services</a>

            </div>
        </div>

    </div>
    <!-- ./Section Category Cover -->

    <!-- Section Category Services -->
    <div class="section-category-details">
        <div class="container">

            @if(!empty($category->services()->get()))

                @foreach($category->services()->get()->chunk(4) as $services)
                    <div class="row">

                        @foreach($services as $service)
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <div class="thumbnail">
                                    <img src="{{ $service->image_url }}" alt="">
                                    <div class="caption">
                                        <h4>
                                            <a href="{{ route('explore.service.show', $service->id) }}">
                                                {{ $service->name }}
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endforeach

            @else
                <div class="alert alert-danger">
                    <strong>Notice: </strong> Sorry! there is no available services associated with this category.
                </div>
            @endif

        </div>
    </div>
    <!-- ./Section Category Services -->

@stop

@push('scripts')

    {{--<script src="{{ asset('js/website/categories/show.js') }}"></script>--}}

@endpush