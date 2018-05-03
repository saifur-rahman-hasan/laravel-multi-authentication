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
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_submit_quote">Next</button>
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

@section('modals')
    <!-- Small modal -->
    <div id="modal_submit_quote" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Get free Quotes about <strong>XYZ</strong></h5>
                </div>

                <div class="modal-body">
                    <h6 class="text-semibold">Text in a modal</h6>
                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>

                    <hr>

                    <h6 class="text-semibold">Another paragraph</h6>
                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /small modal -->
@endsection

@push('scripts')

    {{--<script src="{{ asset('js/website/categories/show.js') }}"></script>--}}

@endpush