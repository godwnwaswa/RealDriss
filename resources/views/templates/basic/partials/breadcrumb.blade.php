@php
$breadcrumb = getContent('breadcrumb.content', true);
@endphp
<section class="inner-hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 position-relative text-center">
                <h2 class="page-title">{{ __($pageTitle) }}</h2>
                <ul class="page-list justify-content-center">
                    <li><a href="{{ route('home') }}">@lang('Home')</a></li>
                    <li>{{ __($pageTitle) }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
