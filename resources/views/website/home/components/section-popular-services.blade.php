<div class="section section-popular-services">
    <div class="container">

        @if(!empty($categories))
            <!-- Left Column [ Services by Category ] -->
            <div class="col-sm-9">



            </div>
            <!-- /Left Column [ Services by Category ] -->

            <!-- Right Column [ Service Categories ] -->
            <div class="col-sm-3">

                <ul class="list-unstyled">
                    @foreach($categories as $category)
                        <li>
                            <a href="#">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>

            </div>
            <!-- /Right Column [ Service Categories ] -->
        @else
            <div class="alert alert-warning alert-important">
                <strong>Warning:</strong> Sorry! there is no available service categories found to show.
            </div>
        @endif

    </div>
</div>