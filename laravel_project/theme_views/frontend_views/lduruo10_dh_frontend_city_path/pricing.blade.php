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
                        <h2 style="color: {{ $site_innerpage_header_title_font_color }};">{{ __('theme_directory_hub.pricing.head-title') }}</h2>
                        <p style="color: {{ $site_innerpage_header_paragraph_font_color }};">{{ __('theme_directory_hub.pricing.head-description') }}</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Pricing Section Begin -->
    <section class="pricing spad custom-bg-light">
        <div class="container">

            @if(!empty($login_user))
                <div class="row justify-content-center">
                    <div class="col-10 col-md-12">
                        <div class="alert alert-info" role="alert">
                            @if($login_user->isAdmin())
                                {{ __('theme_directory_hub.pricing.info-admin') }}
                            @else
                                @if($login_user->hasPaidSubscription())
                                    {{ __('theme_directory_hub.pricing.info-user-paid', ['site_name' => $site_name]) }}
                                @else
                                    {{ __('theme_directory_hub.pricing.info-user-free', ['site_name' => $site_name]) }}
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <div class="row justify-content-center">
                @foreach($plans as $plans_key => $plan)
                    <div class="col-10 col-md-6 col-lg-4">
                        <div class="card mb-4 box-shadow text-center">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">
                                    @if(!empty($login_user))
                                        @if($login_user->isUser())

                                            @if($login_user->hasPaidSubscription())
                                                @if($login_user->subscription->plan->id == $plan->id)
                                                    <span class="text-success">
                                                    <i class="fas fa-check-circle"></i>
                                                </span>
                                                @endif
                                            @else
                                                @if($plan->plan_type == \App\Plan::PLAN_TYPE_FREE)
                                                    <span class="text-success">
                                                    <i class="fas fa-check-circle"></i>
                                                </span>
                                                @endif
                                            @endif

                                        @endif
                                    @endif

                                    {{ $plan->plan_name }}
                                </h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">{{ $site_global_settings->setting_product_currency_symbol . $plan->plan_price }}
                                    <small class="text-muted">/
                                        @if($plan->plan_period == \App\Plan::PLAN_LIFETIME)
                                            {{ __('backend.plan.lifetime') }}
                                        @elseif($plan->plan_period == \App\Plan::PLAN_MONTHLY)
                                            {{ __('backend.plan.monthly') }}
                                        @elseif($plan->plan_period == \App\Plan::PLAN_QUARTERLY)
                                            {{ __('backend.plan.quarterly') }}
                                        @else
                                            {{ __('backend.plan.yearly') }}
                                        @endif
                                    </small>
                                </h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    @if(is_null($plan->plan_max_free_listing))
                                        <li>
                                            {{ __('theme_directory_hub.plan.unlimited') . ' ' . __('theme_directory_hub.plan.free-listing') }}
                                        </li>
                                    @else
                                        <li>
                                            {{ $plan->plan_max_free_listing . ' ' . __('theme_directory_hub.plan.free-listing') }}
                                        </li>
                                    @endif

                                    @if(is_null($plan->plan_max_featured_listing))
                                        <li>
                                            {{ __('theme_directory_hub.plan.unlimited') . ' ' . __('theme_directory_hub.plan.featured-listing') }}
                                        </li>
                                    @else
                                        <li>
                                            {{ $plan->plan_max_featured_listing . ' ' . __('theme_directory_hub.plan.featured-listing') }}
                                        </li>
                                    @endif

                                    @if(!empty($plan->plan_features))
                                        <li>
                                            {{ $plan->plan_features }}
                                        </li>
                                    @endif
                                </ul>

                                @if($plan->plan_type == \App\Plan::PLAN_TYPE_FREE)
                                    @if(empty($login_user))
                                        <a class="primary-btn" href="{{ route('user.items.create') }}">
                                            <i class="fas fa-plus mr-1"></i>
                                            {{ __('frontend.header.list-business') }}
                                        </a>
                                    @else
                                        @if($login_user->isAdmin())
                                            <a class="primary-btn" href="{{ route('admin.plans.index') }}">
                                                <i class="fas fa-tasks"></i>
                                                {{ __('theme_directory_hub.pricing.manage-pricing') }}
                                            </a>
                                        @else
                                            @if(!$login_user->hasPaidSubscription())
                                                <a class="primary-btn" href="{{ route('user.items.create') }}">
                                                    <i class="fas fa-plus mr-1"></i>
                                                    {{ __('frontend.header.list-business') }}
                                                </a>
                                            @endif
                                        @endif
                                    @endif
                                @else

                                    @if(empty($login_user))
                                        <a class="primary-btn" href="{{ route('user.subscriptions.index') }}">
                                            <i class="fas fa-plus mr-1"></i>
                                            {{ __('theme_directory_hub.pricing.get-started') }}
                                        </a>
                                    @else
                                        @if($login_user->isAdmin())
                                            <a class="primary-btn" href="{{ route('admin.plans.index') }}">
                                                <i class="fas fa-tasks"></i>
                                                {{ __('theme_directory_hub.pricing.manage-pricing') }}
                                            </a>
                                        @else

                                            @if($login_user->hasPaidSubscription())

                                                @if($login_user->subscription->plan->id == $plan->id)
                                                    <a class="primary-btn" href="{{ route('user.items.create') }}">
                                                        <i class="fas fa-plus mr-1"></i>
                                                        {{ __('frontend.header.list-business') }}
                                                    </a>
                                                @endif

                                            @else
                                                <a class="primary-btn" href="{{ route('user.subscriptions.edit', ['subscription' => $login_user->subscription->id]) }}">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    {{ __('theme_directory_hub.pricing.upgrade') }}
                                                </a>
                                            @endif

                                        @endif
                                    @endif

                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- Pricing Section End -->
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
