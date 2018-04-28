@extends('website.layouts.app')

@section('content')
    
    <!-- Section Intro -->
    <div class="section-welcome">
        <div class="jumbotron" style="background: url({{ asset('assets/images/backgrounds/seamless.png') }})">
            <div class="container">
                
                <div class="row">

                    <!-- Left Side -->
                    <div class="col-sm-5">
                        <br><br><br>

                        <h1 class="text-thin text-success">Get you Go</h1>
                        <p>A Right place to pick your service</p>
                        <br>
                        <p>
                            <a class="btn btn-info btn-lg">Learn more</a>
                            @guest
                            <a href="{{ route('register') }}" class="btn btn-success btn-lg">Create an account</a>
                            @endguest
                        </p>
                    </div>
                    <!-- ./Left Side -->
                    
                    <!-- Right Side -->
                    <div class="col-sm-7">
                        <div class="owl-carousel owl-theme carousel-block">
                
                            <div class="item">
                                <div class="thumbnail">
                                    <img src="{{ asset('assets/images/backgrounds/seamless.png') }}" alt="Cover Image">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Right Side -->

                </div>

            </div>
        </div>
    </div>
    <!-- /Section Intro -->

@stop

@push('scripts')
@endpush