@extends('website.layouts.app')

@section('body-attrs')
    class="login-container login-cover"
@stop

@section('navbar-main')
@stop

@section('content')

    <!-- Content area -->
    <div class="content pb-20">

        <!-- Tabbed form -->
        <div class="tabbable panel login-form width-400">
            <ul class="nav nav-tabs nav-justified">
                <li><a href="#basic-tab1" data-toggle="tab"><h6>Sign in</h6></a></li>
                <li class="active"><a href="#basic-tab2" data-toggle="tab"><h6>Register</h6></a></li>
            </ul>

            <div class="tab-content panel-body">
                <div class="tab-pane fade" id="basic-tab1">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                            <h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autofocus>
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>


                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group login-options">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="checkbox-inline">
                                        <input type="checkbox"
                                               name="remember" {{ old('remember') ? 'checked' : '' }}
                                               class="styled"> {{ __('Remember Me') }}
                                    </label>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-blue btn-block">
                                {{ __('Login') }}
                                <i class="icon-arrow-right14 position-right"></i>
                            </button>
                        </div>
                    </form>

                    <div class="content-divider text-muted form-group"><span>or sign in with</span></div>
                    <ul class="list-inline form-group list-inline-condensed text-center">
                        <li><a href="#" class="btn border-indigo text-indigo btn-flat btn-icon btn-rounded"><i class="icon-facebook"></i></a></li>
                        <li><a href="#" class="btn border-pink-300 text-pink-300 btn-flat btn-icon btn-rounded"><i class="icon-dribbble3"></i></a></li>
                        <li><a href="#" class="btn border-slate-600 text-slate-600 btn-flat btn-icon btn-rounded"><i class="icon-github"></i></a></li>
                        <li><a href="#" class="btn border-info text-info btn-flat btn-icon btn-rounded"><i class="icon-twitter"></i></a></li>
                    </ul>

                    <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
                </div>

                <!-- Registration Form -->
                <div class="tab-pane fade in active" id="basic-tab2">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="text-center">
                            <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                            <h5 class="content-group">{{ __('Create New Account') }} <small class="display-block">All fields are required</small></h5>
                        </div>

                        <!-- First Name -->
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" placeholder="{{ __('First Name') }}" value="{{ old('first_name') }}" required autofocus>

                            <div class="form-control-feedback">
                                <i class="icon-mention text-muted"></i>
                            </div>

                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!-- Last Name -->
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}" required autofocus>

                            <div class="form-control-feedback">
                                <i class="icon-mention text-muted"></i>
                            </div>

                            @if ($errors->has('last_name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!-- Email -->
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
                            <div class="form-control-feedback">
                                <i class="icon-mention text-muted"></i>
                            </div>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!-- Password -->
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>
                            <div class="form-control-feedback">
                                <i class="icon-user-lock text-muted"></i>
                            </div>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!-- Password Confirmation -->
                        <div class="form-group has-feedback has-feedback-left">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
                            <div class="form-control-feedback">
                                <i class="icon-user-check text-muted"></i>
                            </div>
                        </div>

                        <div class="content-divider text-muted form-group"><span>Additions</span></div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="styled" checked="checked">
                                    Send me <a href="#">test account settings</a>
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="styled" checked="checked">
                                    Subscribe to monthly newsletter
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="styled">
                                    Accept <a href="#">terms of service</a>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn bg-indigo-400 btn-block">{{ __('Register')  }} <i class="icon-circle-right2 position-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /tabbed form -->

    </div>
    <!-- /content area -->

@endsection
