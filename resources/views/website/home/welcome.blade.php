@extends('website.layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('css/website/home/welcome.css') }}" />
@endpush

@section('content')

    <!-- Section Intro -->
    @verbatim
    <section-intro></section-intro>
    @endverbatim
    <!-- ./Section Intro -->

    <!-- Section Popular Services -->
    @verbatim
        <section-popular-service></section-popular-service>
    @endverbatim
    <!-- ./Section Popular Services -->

    <!-- Section Popular Service Providers -->
    @verbatim
        <section-popular-service-providers></section-popular-service-providers>
    @endverbatim
    <!-- ./Section Popular Service Providers -->

    <!-- Section How to connect with service pros -->
    @include('website.home.components.how-to-connect-with-service-pros')
    <!-- ./Section How to connect with service pros -->

    <!-- Section Download Mobile App -->
    @include('website.home.components.section-download-mobile-app')
    <!-- ./Section Download Mobile App -->

    <!-- Section What we Provide -->
    @include('website.home.components.section-what-we-provide')
    <!-- ./Section What we Provide -->

@stop

@push('scripts')

    <script src="{{ asset('js/website/home/welcome.js') }}"></script>

@endpush