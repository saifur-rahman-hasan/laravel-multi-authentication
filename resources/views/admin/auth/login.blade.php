@extends('admin.layouts.app')

@section('body-attrs')
class="login-container"
@endsection

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Advanced login -->
        <form method="POST" action="{{ route('admin.login') }}">
            
            @csrf

            <div class="login-form">
                <div class="text-center">
                    <div class="icon-object border-primary-400 text-primary-400"><i class="icon-user-lock"></i></div>
                    <h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
                </div>

                <div class="form-group has-feedback has-feedback-left {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control input-lg" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autofocus>
                    
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback has-feedback-left {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control input-lg" placeholder="{{ __('Password') }}" required>
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group login-options">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="col-sm-6 text-right">
                            <a href="{{ route('admin.password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn bg-blue btn-block btn-lg">{{ __('Login') }} <i class="icon-arrow-right14 position-right"></i></button>
                </div>

            </div>
        </form>
        <!-- /advanced login -->
        
    </div>
    <!-- /content area -->

@endsection
