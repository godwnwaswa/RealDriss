@php
$content = getContent('cta.content',true);
@endphp
<section class="cta-section pt-100 pb-100" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center position-relative">
                <h2>{{ __(@$content->data_values->heading) }}</h2>
                <a href="{{ @$content->data_values->button_url }}" class="cmn-btn mt-4">{{ __(@$content->data_values->button) }}</a>
            </div>
        </div>
    </div>
</section>