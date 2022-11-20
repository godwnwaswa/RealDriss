@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="blog-details-section pt-50 pb-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="blog-details-wrapper">
                        <div class="post-details-header">
                            <span class="post-card__date text--base">{{ $blog->created_at->format('d M, Y') }}</span>
                            <h3 class="post-title">{{ __(@$blog->data_values->title) }}</h3>
                        </div>
                        <div class="post-details-thumb"><img class="w-100" src="{{ getImage('assets/images/frontend/blog/' . @$blog->data_values->image, '700x500') }}" alt="image"></div>
                        <div class="blog-details-content">
                            @php echo $blog->data_values->description @endphp
                        </div>
                    </div>
                    <div class="fb-comments" data-href="{{ route('blog.details', [$blog->id, slug($blog->data_values->title)]) }}" data-numposts="5"></div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar">
                        <div class="widget">
                            <h5 class="widget-title">@lang('Latest Blog')</h5>
                            <ul class="small-post-list">
                                @foreach ($latestBlogs as $blog)
                                    <li class="small-post">
                                        <div class="small-post__thumb"><img src="{{ getImage('assets/images/frontend/blog/thumb_' . @$blog->data_values->image, '350x250') }}" alt="image">
                                        </div>
                                        <div class="small-post__content">
                                            <h6>
                                                <a href="{{ route('blog.details', [slug(@$blog->data_values->title), $blog->id]) }}">{{ __(@$blog->data_values->title) }}</a>
                                            </h6>
                                            <a class="date" href="{{ route('blog.details', [slug(@$blog->data_values->title), $blog->id]) }}">{{ showDateTime($blog->created_at) }}</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget-title">@lang('Most Views')</h5>
                            <ul class="small-post-list">
                                @forelse($mostViews as $blog)
                                    <li class="small-post">
                                        <div class="small-post__thumb"><img src="{{ getImage('assets/images/frontend/blog/thumb_' . @$blog->data_values->image, '350x250') }}" alt="image">
                                        </div>
                                        <div class="small-post__content">
                                            <h6>
                                                <a href="{{ route('blog.details', [slug(@$blog->data_values->title), $blog->id]) }}">{{ __(@$blog->data_values->title) }}</a>
                                            </h6>
                                            <a class="date" href="{{ route('blog.details', [slug(@$blog->data_values->title), $blog->id]) }}">{{ @showDateTime($blog->created_at) }}</a>
                                        </div>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('fbComment')
    @php echo loadExtension('fb-comment') @endphp
@endpush
