@extends('frontend_views.lduruo10_dh_frontend_city_path.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- Breadcrumb Begin -->
    @if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_DEFAULT)
    <div class="custom__max__height__inner__page set-bg" data-setbg="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/innerpage_header_bg.webp') }}">
    @elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_COLOR)
    <div class="custom__max__height__inner__page set-bg" data-setbg="" style="background-color: {{ $site_innerpage_header_background_color }};">
    @elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_IMAGE)
    <div class="custom__max__height__inner__page set-bg" data-setbg="{{ Storage::disk('public')->url('customization/' . $site_innerpage_header_background_image) }}">
    @elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
    <div class="custom__max__height__inner__page set-bg" data-setbg="" style="background-color: #333333;">
    @endif

        <div class="breadcrumb-area custom__max__height__inner__page hero-grey-bg-cover set-bg" data-setbg="">

        @if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
            <div data-youtube="{{ $site_innerpage_header_background_youtube_video }}"></div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 style="color: {{ $site_innerpage_header_title_font_color }};">{{ trans_choice('frontend.blog.tag', 0) }}: {{ $tag->name }}</h2>
                        <p style="color: {{ $site_innerpage_header_paragraph_font_color }};">{{ __('frontend.blog.tag-description', ['tag_name' => $tag->name]) }}</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- About Section Begin -->
    <section class="blog-section spad spad-pt-40">
        <div class="container">

            @if($ads_before_breadcrumb->count() > 0)
                @foreach($ads_before_breadcrumb as $ads_before_breadcrumb_key => $ad_before_breadcrumb)
                    <div class="row mb-5">
                        @if($ad_before_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                            <div class="col-12 text-left">
                                <div>
                                    {!! $ad_before_breadcrumb->advertisement_code !!}
                                </div>
                            </div>
                        @elseif($ad_before_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                            <div class="col-12 text-center">
                                <div>
                                    {!! $ad_before_breadcrumb->advertisement_code !!}
                                </div>
                            </div>
                        @elseif($ad_before_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                            <div class="col-12 text-right">
                                <div>
                                    {!! $ad_before_breadcrumb->advertisement_code !!}
                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach
            @endif

            <div class="row mb-4">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('page.home') }}">
                                    <i class="fas fa-bars"></i>
                                    {{ __('frontend.shared.home') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('page.blog') }}">{{ __('frontend.blog.title') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans_choice('frontend.blog.tag', 0) }}: {{ $tag->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            @if($ads_after_breadcrumb->count() > 0)
                @foreach($ads_after_breadcrumb as $ads_after_breadcrumb_key => $ad_after_breadcrumb)
                    <div class="row mb-5">
                        @if($ad_after_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                            <div class="col-12 text-left">
                                <div>
                                    {!! $ad_after_breadcrumb->advertisement_code !!}
                                </div>
                            </div>
                        @elseif($ad_after_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                            <div class="col-12 text-center">
                                <div>
                                    {!! $ad_after_breadcrumb->advertisement_code !!}
                                </div>
                            </div>
                        @elseif($ad_after_breadcrumb->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                            <div class="col-12 text-right">
                                <div>
                                    {!! $ad_after_breadcrumb->advertisement_code !!}
                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach
            @endif

            <div class="row">
                <div class="col-lg-8">

                    @if($ads_before_content->count() > 0)
                        @foreach($ads_before_content as $ads_before_content_key => $ad_before_content)
                            <div class="row mb-5">
                                @if($ad_before_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                    <div class="col-12 text-left">
                                        <div>
                                            {!! $ad_before_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_before_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                    <div class="col-12 text-center">
                                        <div>
                                            {!! $ad_before_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_before_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                    <div class="col-12 text-right">
                                        <div>
                                            {!! $ad_before_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @endif

                            </div>
                        @endforeach
                    @endif

                    @php
                        $posts = $data['posts'];
                    @endphp

                    @if($posts->count() > 0)

                        @php
                            $post = $posts->pull(0);
                        @endphp
                        <div class="blog__item__large">
                            @if(empty($post->featured_image))
                                <div class="blog__item__pic set-bg" data-setbg="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image.webp') }}"></div>
                            @else
                                <div class="blog__item__pic set-bg" data-setbg="{{ url('laravel_project/public' . $post->featured_image) }}"></div>
                            @endif
                            <div class="blog__item__text">
                                <ul class="blog__item__tags">
                                    <li>
                                        <i class="fas fa-tags"></i>
                                        @if($post->topic()->count() != 0)
                                            {{ $post->topic()->first()->name }}
                                        @else
                                            {{ __('frontend.blog.uncategorized') }}
                                        @endif
                                    </li>
                                </ul>
                                <h3><a href="{{ route('page.blog.show', $post->slug) }}">{{ $post->title }}</a></h3>
                                <p>{{ str_limit(preg_replace("/&#?[a-z0-9]{2,8};/i"," ", strip_tags($post->body)), 200) }}</p>
                                <ul class="blog__item__widget">
                                    <li><i class="fas fa-clock"></i> {{ $post->updated_at->diffForHumans() }}</li>
                                    <li><i class="fas fa-user-circle"></i> {{ $post->user()->first()->name }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">

                            @foreach($posts as $posts_key => $post)
                                <div class="col-lg-6 col-md-6">
                                    <div class="blog__item">
                                        @if(empty($post->featured_image))
                                            <div class="blog__item__pic set-bg" data-setbg="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}"></div>
                                        @else
                                            <div class="blog__item__pic set-bg" data-setbg="{{ url('laravel_project/public' . $post->featured_image) }}"></div>
                                        @endif
                                        <div class="blog__item__text">
                                            <ul class="blog__item__tags">
                                                <li>
                                                    <i class="fas fa-tags"></i>
                                                    @if($post->topic()->count() != 0)
                                                        {{ $post->topic()->first()->name }}
                                                    @else
                                                        {{ __('frontend.blog.uncategorized') }}
                                                    @endif
                                                </li>
                                            </ul>
                                            <h5><a href="{{ route('page.blog.show', $post->slug) }}">{{ $post->title }}</a></h5>
                                            <p>{{ str_limit(preg_replace("/&#?[a-z0-9]{2,8};/i"," ", strip_tags($post->body)), 200) }}</p>
                                            <ul class="blog__item__widget">
                                                <li><i class="fas fa-clock"></i> {{ $post->updated_at->diffForHumans() }}</li>
                                                <li><i class="fas fa-user-circle"></i> {{ $post->user()->first()->name }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-12">
                                {{ $data['posts']->links() }}
                            </div>
                        </div>
                    @endif

                    @if($ads_after_content->count() > 0)
                        @foreach($ads_after_content as $ads_after_content_key => $ad_after_content)
                            <div class="row mt-5">
                                @if($ad_after_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                    <div class="col-12 text-left">
                                        <div>
                                            {!! $ad_after_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_after_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                    <div class="col-12 text-center">
                                        <div>
                                            {!! $ad_after_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_after_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                    <div class="col-12 text-right">
                                        <div>
                                            {!! $ad_after_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @endif

                            </div>
                        @endforeach
                    @endif

                </div>
                <div class="col-lg-4">

                    @if($ads_before_sidebar_content->count() > 0)
                        @foreach($ads_before_sidebar_content as $ads_before_sidebar_content_key => $ad_before_sidebar_content)
                            <div class="row mb-5">
                                @if($ad_before_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                    <div class="col-12 text-left">
                                        <div>
                                            {!! $ad_before_sidebar_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_before_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                    <div class="col-12 text-center">
                                        <div>
                                            {!! $ad_before_sidebar_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_before_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                    <div class="col-12 text-right">
                                        <div>
                                            {!! $ad_before_sidebar_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @endif

                    @include('frontend_views.lduruo10_dh_frontend_city_path.blog.partials.sidebar')

                    @if($ads_after_sidebar_content->count() > 0)
                        @foreach($ads_after_sidebar_content as $ads_after_sidebar_content_key => $ad_after_sidebar_content)
                            <div class="row mt-5">
                                @if($ad_after_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                    <div class="col-12 text-left">
                                        <div>
                                            {!! $ad_after_sidebar_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_after_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                    <div class="col-12 text-center">
                                        <div>
                                            {!! $ad_after_sidebar_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_after_sidebar_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                    <div class="col-12 text-right">
                                        <div>
                                            {!! $ad_after_sidebar_content->advertisement_code !!}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>

        </div>
    </section>
    <!-- About Section End -->
@endsection

@section('scripts')

    @if($site_innerpage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
    <!-- Youtube Background for Header -->
        <script src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/jquery-youtube-background/jquery.youtube-background.js') }}"></script>
    @endif

    <script>
        $(document).ready(function(){

            "use strict";

            @if($site_innerpage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
            /**
             * Start Initial Youtube Background
             */
            $("[data-youtube]").youtube_background();
            /**
             * End Initial Youtube Background
             */
            @endif

        });
    </script>
@endsection
