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

    <!-- Section Categories -->
    @verbatim
        <section-categories></section-categories>
    @endverbatim
    <!-- ./Section Categories -->

@stop

@push('scripts')

    <script src="{{ asset('js/website/categories/index.js') }}"></script>

@endpush