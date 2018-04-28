@extends('website.layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('css/website/home/welcome.css') }}" />
@endpush

@section('content')
    
    <!-- Section Intro -->
    @include('website.home.components.section-intro')
    <!-- /Section Intro -->

    <!-- Section Popular Services -->
    @include('website.home.components.section-popular-services')
    <!-- /Section Popular Services -->

@stop

@push('scripts')

    <script src="{{ asset('js/website/home/welcome.js') }}"></script>

@endpush