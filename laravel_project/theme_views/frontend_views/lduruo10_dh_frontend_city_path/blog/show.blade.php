@extends('frontend_views.lduruo10_dh_frontend_city_path.layouts.app')

@section('styles')
@endsection


@section('content')

    <!-- Blog Hero Begin -->
    @if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_DEFAULT)
    <div class="custom__min__height__blog set-bg" data-setbg="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/innerpage_header_bg.webp') }}">
    @elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_COLOR)
    <div class="custom__min__height__blog set-bg" data-setbg="" style="background-color: {{ $site_innerpage_header_background_color }};">
    @elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_IMAGE)
    <div class="custom__min__height__blog set-bg" data-setbg="{{ Storage::disk('public')->url('customization/' . $site_innerpage_header_background_image) }}">
    @elseif($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
    <div class="custom__min__height__blog set-bg" data-setbg="" style="background-color: #333333;">
    @endif

        <div class="blog-details-hero custom__min__height__blog hero-grey-bg-cover set-bg" data-setbg="">

        @if($site_innerpage_header_background_type == \App\Customization::SITE_INNERPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
            <div data-youtube="{{ $site_innerpage_header_background_youtube_video }}"></div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog__hero__text">
                        <div class="label">
                            @if($data['post']->topic()->count() != 0)
                                {{ $data['post']->topic()->first()->name }}
                            @else
                                {{ __('frontend.blog.uncategorized') }}
                            @endif
                        </div>
                        <h2>{{ $data['post']->title }}</h2>
                        <ul>
                            <li><i class="fas fa-clock"></i> {{ $data['post']->updated_at->diffForHumans() }}</li>
                            <li><i class="fas fa-user-circle"></i> {{ $data['post']->user()->first()->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
    <!-- Blog Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad spad-pt-40">
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
                            @if($data['post']->topic()->count() != 0)
                                <li class="breadcrumb-item"><a href="{{ route('page.blog.topic', $data['post']->topic()->first()->slug) }}">{{ $data['post']->topic()->first()->name }}</a></li>
                            @endif
                            <li class="breadcrumb-item active" aria-current="page">{{ $data['post']->title }}</li>
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
                    <div class="blog__details__text">

                        @if($ads_before_feature_image->count() > 0)
                            @foreach($ads_before_feature_image as $ads_before_feature_image_key => $ad_before_feature_image)
                                <div class="row mb-5">
                                    @if($ad_before_feature_image->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                        <div class="col-12 text-left">
                                            <div>
                                                {!! $ad_before_feature_image->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_feature_image->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                        <div class="col-12 text-center">
                                            <div>
                                                {!! $ad_before_feature_image->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_feature_image->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                        <div class="col-12 text-right">
                                            <div>
                                                {!! $ad_before_feature_image->advertisement_code !!}
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            @endforeach
                        @endif

                        <div class="blog__details__video set-bg" data-setbg="">
                            <img src="{{ empty($data['post']->featured_image) ? asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image.webp') : url('laravel_project/public' . $data['post']->featured_image) }}" alt="">
                        </div>

                        @if($ads_before_post_content->count() > 0)
                            @foreach($ads_before_post_content as $ads_before_post_content_key => $ad_before_post_content)
                                <div class="row mb-5">
                                    @if($ad_before_post_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                        <div class="col-12 text-left">
                                            <div>
                                                {!! $ad_before_post_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_post_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                        <div class="col-12 text-center">
                                            <div>
                                                {!! $ad_before_post_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_before_post_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                        <div class="col-12 text-right">
                                            <div>
                                                {!! $ad_before_post_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            @endforeach
                        @endif

                        <div class="row post-body">
                            <div class="col-12">
                                {!! $data['post']->body !!}
                            </div>
                        </div>

                        @if($ads_after_post_content->count() > 0)
                            @foreach($ads_after_post_content as $ads_after_post_content_key => $ad_after_post_content)
                                <div class="row mb-5">
                                    @if($ad_after_post_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                        <div class="col-12 text-left">
                                            <div>
                                                {!! $ad_after_post_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_after_post_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                        <div class="col-12 text-center">
                                            <div>
                                                {!! $ad_after_post_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @elseif($ad_after_post_content->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                        <div class="col-12 text-right">
                                            <div>
                                                {!! $ad_after_post_content->advertisement_code !!}
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            @endforeach
                        @endif
                    </div>
                    @if($data['post']->tags()->count() > 0)
                    <div class="blog__details__tags">
                        <span>{{ trans_choice('frontend.blog.tag', 1) }}</span>
                        @foreach($data['post']->tags()->get() as $key => $tag)
                            <a href="{{ route('page.blog.tag', $tag->slug) }}">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    @endif

                    @if($ads_before_comments->count() > 0)
                        @foreach($ads_before_comments as $ads_before_comments_key => $ad_before_comments)
                            <div class="row mb-5">
                                @if($ad_before_comments->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                    <div class="col-12 text-left">
                                        <div>
                                            {!! $ad_before_comments->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_before_comments->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                    <div class="col-12 text-center">
                                        <div>
                                            {!! $ad_before_comments->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_before_comments->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                    <div class="col-12 text-right">
                                        <div>
                                            {!! $ad_before_comments->advertisement_code !!}
                                        </div>
                                    </div>
                                @endif

                            </div>
                        @endforeach
                    @endif

                    <div class="blog__details__comment__form">
                        <div class="blog__details__comment__title">
                            <h4>{{ trans_choice('frontend.blog.comment', 1) }}</h4>
                        </div>
                        @comments([
                        'model' => $blog_post,
                        'approved' => true,
                        'perPage' => 10
                        ])
                    </div>

                    @if($ads_before_share->count() > 0)
                        @foreach($ads_before_share as $ads_before_share_key => $ad_before_share)
                            <div class="row mb-5">
                                @if($ad_before_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                    <div class="col-12 text-left">
                                        <div>
                                            {!! $ad_before_share->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_before_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                    <div class="col-12 text-center">
                                        <div>
                                            {!! $ad_before_share->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_before_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                    <div class="col-12 text-right">
                                        <div>
                                            {!! $ad_before_share->advertisement_code !!}
                                        </div>
                                    </div>
                                @endif

                            </div>
                        @endforeach
                    @endif

                    <div class="blog__details__share">

                        <a class="btn text-white btn-sm rounded mb-2 btn-facebook" href="" data-social="facebook">
                            <i class="fab fa-facebook-f"></i>
                            {{ __('social_share.facebook') }}
                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-twitter" href="" data-social="twitter">
                            <i class="fab fa-twitter"></i>
                            {{ __('social_share.twitter') }}
                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-linkedin" href="" data-social="linkedin">
                            <i class="fab fa-linkedin-in"></i>
                            {{ __('social_share.linkedin') }}
                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-blogger" href="" data-social="blogger">
                            <i class="fab fa-blogger-b"></i>
                            {{ __('social_share.blogger') }}
                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-pinterest" href="" data-social="pinterest">
                            <i class="fab fa-pinterest-p"></i>
                            {{ __('social_share.pinterest') }}
                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-evernote" href="" data-social="evernote">
                            <i class="fab fa-evernote"></i>
                            {{ __('social_share.evernote') }}
                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-reddit" href="" data-social="reddit">
                            <i class="fab fa-reddit-alien"></i>
                            {{ __('social_share.reddit') }}
                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-buffer" href="" data-social="buffer">
                            <i class="fab fa-buffer"></i>
                            {{ __('social_share.buffer') }}
                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-wordpress" href="" data-social="wordpress">
                            <i class="fab fa-wordpress-simple"></i>
                            {{ __('social_share.wordpress') }}
                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-weibo" href="" data-social="weibo">
                            <i class="fab fa-weibo"></i>
                            {{ __('social_share.weibo') }}
                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-skype" href="" data-social="skype">
                            <i class="fab fa-skype"></i>
                            {{ __('social_share.skype') }}
                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-telegram" href="" data-social="telegram">
                            <i class="fab fa-telegram-plane"></i>
                            {{ __('social_share.telegram') }}
                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-viber" href="" data-social="viber">
                            <i class="fab fa-viber"></i>
                            {{ __('social_share.viber') }}
                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-whatsapp" href="" data-social="whatsapp">
                            <i class="fab fa-whatsapp"></i>
                            {{ __('social_share.whatsapp') }}
                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-wechat" href="" data-social="wechat">
                            <i class="fab fa-weixin"></i>
                            {{ __('social_share.wechat') }}
                        </a>
                        <a class="btn btn-primary text-white btn-sm rounded mb-2 btn-line" href="" data-social="line">
                            <i class="fab fa-line"></i>
                            {{ __('social_share.line') }}
                        </a>
                    </div>

                    @if($ads_after_share->count() > 0)
                        @foreach($ads_after_share as $ads_after_share_key => $ad_after_share)
                            <div class="row mt-5">
                                @if($ad_after_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_LEFT)
                                    <div class="col-12 text-left">
                                        <div>
                                            {!! $ad_after_share->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_after_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_CENTER)
                                    <div class="col-12 text-center">
                                        <div>
                                            {!! $ad_after_share->advertisement_code !!}
                                        </div>
                                    </div>
                                @elseif($ad_after_share->advertisement_alignment == \App\Advertisement::AD_ALIGNMENT_RIGHT)
                                    <div class="col-12 text-right">
                                        <div>
                                            {!! $ad_after_share->advertisement_code !!}
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
    <!-- Blog Details Section End -->
@endsection


@section('scripts')

    @if($site_innerpage_header_background_type == \App\Customization::SITE_HOMEPAGE_HEADER_BACKGROUND_TYPE_YOUTUBE_VIDEO)
        <!-- Youtube Background for Header -->
        <script src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/jquery-youtube-background/jquery.youtube-background.js') }}"></script>
    @endif

    <script src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/goodshare/goodshare.min.js') }}"></script>

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
