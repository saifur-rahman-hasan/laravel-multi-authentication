@extends('website.layouts.app')

@push('styles')
@endpush

@section('content')

    <!-- Section Service Cover -->
    <div class="section-service-image-cover">

        <div class="jumbotron" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ $service->image_url }}) no-repeat center; background-size: cover; min-height: 450px;">
            <div class="container">
                <div class="row">

                    <!-- Service Title Column -->
                    <div class="col-sm-6 text-white">
                        <h2>{{ $service->title }}</h2>
                        <h3>{{ $service->sub_title }}</h3>
                    </div>

                    <!-- Service Get Free Quote Column -->
                    <div class="col-sm-4 col-sm-offset-2">
                        @if(!empty($service->questions()->get()))
                            <div class="content-group bg-white p-20">
                                <h6 class="text-semibold heading-divided">
                                    <i class="icon-question7 no-edge-top text-success position-left"></i> {{ $service->questions()->first()->question }}
                                </h6>
                                <div class="list-group no-border">
                                    @if($service->questions()->first()->option_type == 'radio')
                                        @foreach($service->questions()->first()->options as $option)
                                            <a href="#" class="list-group-item no-padding-left">
                                                <i class="icon-radio-unchecked"></i>
                                                {{ $option }}
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                                <hr>
                                <div class="text-center">
                                    <button type="button" class="btn btn-success">Next</button>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-danger">
                                <strong>Warning:</strong> Sorry! there is no available question found for this service.
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- ./Section Service Cover -->

    <!-- Section How It Works -->
    <div class="section-category-details">
        <div class="container text-center">

            <div class="headline" style="margin-bottom: 80px">
                <h1>Get the Best {{ $service->name }} service in 3 Steps</h1>
            </div>

            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-sm-offset-1">
                    <div class="thumbnail" style="background-color: transparent; border: 0;">
                        <img src="{{ asset('assets/images/how-gyg-work-1.png') }}" alt="" style="width: 150px">
                        <div class="caption">
                            <h3>Submit Request</h3>
                            <p>
                                Answer a few quick questions so we can match you to the right Pro
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-sm-offset-1">
                    <div class="thumbnail" style="background-color: transparent; border: 0;">
                        <img src="{{ asset('assets/images/how-gyg-work-2.png') }}" alt="" style="width: 150px">
                        <div class="caption">
                            <h3>Receive Free Quotes</h3>
                            <p>
                                Compare up to 4 custom quotes that include profile and ratings
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-sm-offset-1">
                    <div class="thumbnail" style="background-color: transparent; border: 0;">
                        <img src="{{ asset('assets/images/how-gyg-work-3.png') }}" alt="" style="width: 150px">
                        <div class="caption">
                            <h3>Hire Pro</h3>
                            <p>
                                Choose who to hire and get the job done
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ./Section How It Works -->

@stop

@push('scripts')

    {{--<script src="{{ asset('js/website/categories/show.js') }}"></script>--}}

@endpush