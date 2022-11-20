@extends($activeTemplate.'layouts.app')
@section('app')
@php
$login = getContent('login.content',true);
@endphp
<section class="pt-50 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-mod">        
                    <div class="text-center">
                        <a class="site-logo-auth" href="{{ route('home') }}">
                            <img src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="RealDriss">
                        </a>
                        <h3 class="title mb-2">{{ __(@$login->data_values->title) }}</h3> 
                        <p>{{ __(@$login->data_values->subtitle) }}</p>
                    </div>
                    <form method="POST" action="{{ route('user.login')}}" class="login-form mt-50 verify-gcaptcha">
                        @csrf
                        <div class="form-group">
                            <label>@lang('Username or Email')</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="las la-user"></i></div>
                                <input type="text" class="form-control" value="{{ old('username') }}" name="username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang('Password')</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="las la-key"></i></div>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <x-captcha />

                        <div class="mt-5">
                            <button type="submit" id="recaptcha" class="cmn-btn rounded-0 w-100">@lang('Sign In')</button>
                            <div class="mt-20 d-flex flex-wrap justify-content-between">
                                @if ($general->registration)
                                <p>@lang("Have no account?") <a href="{{ route('user.register') }}" class="text--base">@lang('Sign Up')</a></p>
                                @endif
                                <p><a href="{{ route('user.password.request') }}" class="text--base">@lang('Forgot password?')</a></p>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
