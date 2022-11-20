@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $policyPages = getContent('policy_pages.element', false, null, true);
        $register = getContent('register.content', true);
    @endphp

    <section class="pt-50 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-mod">  
                        <form class="verify-gcaptcha mt-4" action="{{ route('user.register') }}" method="POST">
                            @csrf
                            <div class="row">
                                @if (session()->get('reference') != null)
                                    <div class="form-group col-md-12">
                                        <label for="referenceBy">@lang('Reference By')</label>

                                        <div class="input-group">
                                            <div class="input-group-text"><i class="las la-user"></i></div>
                                            <input class="form-control" id="referenceBy" name="referBy" type="text" value="{{ session()->get('reference') }}" readonly>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group col-md-6">
                                    <label for="username">@lang('Username')</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="las la-user"></i></div>
                                        <input class="form-control checkUser" id="username" name="username" type="text" value="{{ old('username') }}" required>
                                    </div>
                                    <small class="text--danger usernameExist"></small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">@lang('Email Address')</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="las la-at"></i></div>
                                        <input class="form-control checkUser" id="email" name="email" type="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="country">@lang('Country')</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="las la-globe"></i></div>
                                        <select class="form-control" id="country" name="country" required>
                                            @foreach ($countries as $key => $country)
                                                <option data-mobile_code="{{ $country->dial_code }}" data-code="{{ $key }}" value="{{ $country->country }}">{{ __($country->country) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="country">@lang('Mobile')</label>
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <span class="input-group-text mobile-code border-0"></span>
                                            <input name="mobile_code" type="hidden">
                                            <input name="country_code" type="hidden">
                                        </div>
                                        <input class="form-control checkUser" id="mobile" name="mobile" type="number" value="{{ old('mobile') }}" required>
                                    </div>
                                    <small class="text--danger mobileExist"></small>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">@lang('Password')</label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="las la-key"></i></div>
                                            <input class="form-control" id="password" name="password" type="password" required>
                                        </div>
                                        @if ($general->secure_password)
                                            <div class="input-popup">
                                                <p class="error lower">@lang('1 small letter minimum')</p>
                                                <p class="error capital">@lang('1 capital letter minimum')</p>
                                                <p class="error number">@lang('1 number minimum')</p>
                                                <p class="error special">@lang('1 special character minimum')</p>
                                                <p class="error minimum">@lang('6 character password')</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password-confirm">@lang('Confirm Password')</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="las la-key"></i></div>
                                        <input class="form-control" id="password-confirm" name="password_confirmation" type="password" required autocomplete="new-password">
                                    </div>
                                </div>

                                <x-captcha />

                                @if ($general->agree)
                                    <div class="form-group d-flex align-items-start">
                                        <input class="custom_checkbox" id="agree" name="agree" type="checkbox" @checked(old('agree')) required>
                                        <div class="d-flex flex-wrap gap-2">
                                            <label class="ms-1 mb-0" for="agree">@lang(' I agree with') </label>
                                            @foreach ($policyPages as $policy)
                                                <a class="text--base" href="{{ route('policy.pages', [slug($policy->data_values->title), $policy->id]) }}">{{ __($policy->data_values->title) }}</a>
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </div>

                                    </div>
                                @endif

                                <div class="col-md-12 mt-3 text-center">
                                    <button class="cmn-btn rounded-0 w-100" id="recaptcha" type="submit">@lang('Sign Up')</button>
                                    <p class="mt-20">@lang('Have an account? ') <a class="text--base" href="{{ route('user.login') }}">@lang('Sign In')</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="existModalCenter" role="dialog" aria-labelledby="existModalCenterTitle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content section--bg">
                <div class="modal-header">
                    <h5 class="modal-title" id="existModalLongTitle">@lang('You are with us')</h5>
                    <span class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
                        <i class="las la-times"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <h6 class="text-center">@lang('You already have an account please sign in. ')</h6>
                </div>
                <div class="modal-footer">
                    <a class="cmn-btn btn-sm" href="{{ route('user.login') }}">@lang('Sign In')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <style>
        .country-code .input-group-text {
            background: #fff !important;
        }

        .country-code select {
            border: none;
        }

        .country-code select:focus {
            border: none;
            outline: none;
        }
    </style>
@endpush
@if($general->secure_password)
    @push('script-lib')
        <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
    @endpush
@endif
@push('script')
    <script>
        "use strict";
        (function($) {
            @if ($mobileCode)
                $(`option[data-code={{ $mobileCode }}]`).attr('selected', '');
            @endif

            $('select[name=country]').change(function() {
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));

            $('.checkUser').on('focusout', function(e) {
                var url = '{{ route('user.checkUser') }}';
                var value = $(this).val();
                var token = '{{ csrf_token() }}';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {
                        mobile: mobile,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'email') {
                    var data = {
                        email: value,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'username') {
                    var data = {
                        username: value,
                        _token: token
                    }
                }
                $.post(url, data, function(response) {
                    if (response.data != false && response.type == 'email') {
                        $('#existModalCenter').modal('show');
                    } else if (response.data != false) {
                        $(`.${response.type}Exist`).text(`${response.type} already exist`);
                    } else {
                        $(`.${response.type}Exist`).text('');
                    }
                });
            });
        })(jQuery);
    </script>
@endpush
