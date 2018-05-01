<footer class="bg-white pt-20 pb-20">
    <div class="container pt-20 pb-20">
        <div class="row">

            <!-- Logo and Social Links -->
            <div class="col-sm-3">

                <div class="mt-10 pb-20">
                    <a href="{{ url('/') }}" class="footer-brand">
                        <img src="{{ asset('assets/images/logo_dark.png') }}" alt="">
                    </a>
                </div>

                <ul class="list-inline mt-20">
                    <li><a href="#" class="text-slate-400"><i class="icon-instagram icon-2x"></i></a></li>
                    <li><a href="#" class="text-slate-400"><i class="icon-facebook2 icon-2x"></i></a></li>
                    <li><a href="#" class="text-slate-400"><i class="icon-linkedin icon-2x"></i></a></li>
                    <li><a href="#" class="text-slate-400"><i class="icon-youtube icon-2x"></i></a></li>
                </ul>
            </div>

            <!-- Company Links [ Col 2 ] -->
            <div class="col-sm-2">
                <h4 class="text-grey text-bold">Company</h4>
                <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Terms and Conditions</a></li>
                    <li><a href="#">Join Us</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>

            <!-- Pros Links [ Col 2 ] -->
            <div class="col-sm-2">
                <h4 class="text-grey text-bold">Pros</h4>
                <ul class="list-unstyled">
                    <li><a href="#">Become a Pro</a></li>
                    <li><a href="#">Company Partnership</a></li>
                    <li><a href="#">Task center</a></li>
                    <li><a href="#">Monthly pass</a></li>
                </ul>
            </div>

            <!-- Info Links [ Col 2 ] -->
            <div class="col-sm-2">
                <h4 class="text-grey text-bold">Info</h4>
                <ul class="list-unstyled">
                    <li><a href="#">Sitemap</a></li>
                </ul>
            </div>

            <!-- Other Links [ Col 2 ] -->
            <div class="col-sm-3">

                <h4 class="text-grey text-bold">Others</h4>

                <!-- Language Select -->
                <select name="language" class="form-control">
                    <option value="en" selected>English (Us)</option>
                    <option value="hk">Hong Kong</option>
                </select>

                <ul class="list-unstyled mt-20">
                    <li class="text-slate-400"><i class="icon-envelop5 mr-10"></i> info@getyougo.com</></li>
                </ul>
            </div>

        </div>
    </div>
</footer>