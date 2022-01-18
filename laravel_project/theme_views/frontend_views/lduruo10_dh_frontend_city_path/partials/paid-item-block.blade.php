@section('styles')

    <link rel="stylesheet" href="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/justified-gallery/justifiedGallery.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/colorbox/colorbox.css') }}" type="text/css">
@endsection

<div class="grid-item .grid-item--width2 col-6 col-md-6 col-lg-3 col-xl-3">
    <div class="card">
        <a href="{{ route('page.item', $item->item_slug) }}">
          <img class="card-img-top border-primary" src="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}" alt="Listing Image">
           <div class="listing__item__pic__tag">{{ __('frontend.item.featured') }}</div>
            </img>
        </a>

        @guest
            <a class="btn primary-btn clickHandleButton" id="item-save-button-xl" data-toggle="tooltip" title="{{ __('frontend.item.save') }}"><i class="far fa-bookmark"></i></a>
            <form id="item-save-form-xl" action="{{ route('listing.item.save', ['item_slug' => $item->item_slug]) }}" method="POST" hidden="true">
                @csrf
            </form>
            <!-- <div>{{$item->item_slug}}</div> -->
        @else
            @if(Auth::user()->hasSavedItem($item->id))
                <a class="btn primary-btn primary-btn-warning clickSavedHandleButton" id="item-saved-button-xl" data-toggle="tooltip" title="{{ __('frontend.item.saved') }}"><i class="fas fa-check"></i></a>
                <form id="item-unsave-form-xl" action="{{ route('page.item.unsave', ['item_slug' => $item->item_slug]) }}" method="POST" hidden="true">
                    @csrf
                </form>
            @else
                <a class="btn primary-btn" id="item-save-button-xl" data-toggle="tooltip" title="{{ __('frontend.item.save') }}"><i class="far fa-bookmark"></i></a>
                <form id="item-save-form-xl" action="{{ route('listing.item.save', ['item_slug' => $item->item_slug]) }}" method="POST" hidden="true">
                    @csrf
                </form>

                <!-- <a class="pl-1" target="_blank" href="{{ route('page.item.save', ['item_slug' => $item->item_slug]) }}">
                                <i class="fas fa-external-link-alt"></i>
                                {{ __('page.item.save') }}
                            </a> -->
            @endif
        @endguest

        <a href="tel:{{ $item->item_phone }}" data-toggle="tooltip" title="{{ __('frontend.item.call') }}"><i class="listing__item__home__tag fas fa-phone-alt" ></i></a>
      <div class="card-body" >
        <div class="d-flex align-items-center listing__item__text__inside">
            
                
           <h5 class="card-title flex-fill"> <a href="{{ route('page.item', $item->item_slug) }}">{{ str_limit($item->item_title, 44, '...') }}</a> </h5>
           @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
           <dt  class="flex-fill" style="display: inline-block;">
                    <i class="fas fa-map-marker-alt fa-sm"></i>
                     <small class="break-word font-weight-bold"  >
                    {{number_format($item->distance_miles, 2, '.', '')}} miles</small> 

                </dt>
             @endif
             
                
                         
         </div>
            <!-- @if($item->getCountRating() > 0)
                <a href="{{ route('page.item', $item->item_slug) }}" style="display:inline-block;">
                    
                    <div class="listing__item__rating__star">
                        <div class="pl-0 rating_stars rating_stars_{{ $item->item_slug }}" data-id="rating_stars_{{ $item->item_slug }}" data-rating="{{ $item->item_average_rating }}"></div>
                    </div> 
                    <small>
                        {{$item->getAverageRating()}}
                    </small>

                    <small>
                        @if($item->getCountRating() == 1)
                            {{ $item->getCountRating() . ' ' . __('review.frontend.review') }}
                        @else
                            {{ $item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                        @endif
                    </small>
                </a>
            @endif -->

            

            <div class="d-flex align-items-center listing__item__text__inside">
            @if($item->galleries()->count() > 0)
                <div class="listing__details__gallery__pic flex-fill" style="display: inline-block;">
                    @php
                    $item_galleries = $item->galleries()->take(3)->get();
                    $i=0;
                    @endphp
                    @foreach($item_galleries as $galleries_key => $gallery)
                        <a href="{{ route('page.item', $item->item_slug) }}">
                            <img  class="card-gallery" alt="Image" src="{{ empty($gallery->item_image_gallery_thumb_name) ? Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_name) : Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_thumb_name) }}"/>
                        </a>
                         
                    
                    @endforeach

                     @if($item->galleries()->count() > 3)
                        <small class="break-word font-weight-bold flex-fill" style="display: inline-block;"><a href="{{ route('page.item', $item->item_slug) }}">+more</a></small>
                     @endif
                </div>
            @endif

            <dt  class="flex-fill"  >
                @if($item->getCountRating() > 0)
                <small class="break-word font-weight-bold flex-fill" style="display: inline-block;">
                    {{$item->getAverageRating()}} stars
                
                    @if($item->getCountRating() == 1)
                        {{ $item->getCountRating() }} review
                    @else
                        {{ $item->getCountRating()}} reviews
                    @endif
                </small>
                @endif
            </dt>
            </div>
        
      </div>
      <div class="card-footer bg-white">
        <!-- <small class="text-muted">Last updated 3 mins ago</small> -->

            <!-- <div class="listing__item__text__info__left"> -->
                    @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                        <a class="listing__item__text__info__left" style="padding-top: 0px" href="{{ route('page.category', $category->category_slug) }}">
                            <span class="custom-color-schema-{{ $paid_items_key%10 }}">
                                @if(!empty($category->category_icon))
                                    <i class="{{ $category->category_icon }}"></i>
                                @else
                                    <i class="fas fa-heart"></i>
                                @endif
                                {{ $category->category_name }}
                            </span>
                        </a>
                    @endforeach
                <!-- </div> -->
                <!-- <div class="listing__item__text__info__right" style="padding-top: 0px;"> -->
                    @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                    
                        @if($item->hasOpened())
                            <span class="item-box-hour-span-opened float-right">{{ __('item_hour.frontend-item-box-hour-opened') }}</span>
                        @else
                            <span class="item-box-hour-span-closed float-right">{{ __('item_hour.frontend-item-box-hour-closed') }}</span>
                        @endif
               
                    @endif
                <!-- </div> -->

      </div>
    </div>
</div>

<script src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/justified-gallery/jquery.justifiedGallery.min.js') }}"></script>
<script src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/colorbox/jquery.colorbox-min.js') }}"></script>


<script src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/bootstrap-select/bootstrap-select.min.js') }}"></script>
@include('frontend_views.lduruo10_dh_frontend_city_path.partials.bootstrap-select-locale')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>

    // $(function () {
    //   $('[data-toggle="tooltip"]').tooltip()
    // });

     $(document).ready(function(){

        @if($item->galleries()->count() > 0)
        $("#item-image-gallery").justifiedGallery({
            rowHeight : 100,
            maxRowHeight: 120,
            lastRow : 'nojustify',
            margins : 3,
            captions: false,
            randomize: true,
            rel : 'item-image-gallery-thumb', //replace with 'gallery1' the rel attribute of each link
        }).on('jg.complete', function () {
            $(this).find('a').colorbox({
                maxWidth : '95%',
                maxHeight : '95%',
                opacity : 0.8,
            });
        });
        @endif
     });

    $(document).on('click', '.clickHandleButton', (e) => { //replaces function book()
        $(e.currentTarget).addClass("disabled");

       $(e.currentTarget).next('form').submit();
       //find the form next to the clicked button and submit the form.
    });

    $(document).on('click', '.clickSavedHandleButton', (e) => { //replaces function book()

        $(e.currentTarget).off("mouseenter");
        $(e.currentTarget).off("mouseleave");
        $(e.currentTarget).addClass("disabled");
       $(e.currentTarget).next('form').submit();
       //find the form next to the clicked button and submit the form.
    });

</script>
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/vendor/bootstrap-select/bootstrap-select.min.js') }}"></script>
@include('frontend_views.lduruo10_dh_frontend_city_path.partials.bootstrap-select-locale') -->


<!-- <script>

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });

</script> -->

<!-- <script type="text/javascript">


    
    $('#item-save-button-xl').on('click', function(){
            $("#item-save-button-xl").addClass("disabled");
            $("#item-save-form-xl").submit();
        });

        $('#item-saved-button-xl').on('click', function(){
            $("#item-saved-button-xl").off("mouseenter");
            $("#item-saved-button-xl").off("mouseleave");
            $("#item-saved-button-xl").addClass("disabled");
            $("#item-unsave-form-xl").submit();
        });

        $("#item-saved-button-xl").on('mouseenter', function(){
            $("#item-saved-button-xl").attr("class", "btn primary-btn primary-btn-danger");
            $("#item-saved-button-xl").html("<i class=\"far fa-trash-alt\"></i>");
        });

        $("#item-saved-button-xl").on('mouseleave', function(){
            $("#item-saved-button-xl").attr("class", "btn primary-btn primary-btn-warning");
            $("#item-saved-button-xl").html("<i class=\"fas fa-check\"></i>");
        });
</script>
 -->
<!-- <script>
    $(document).ready(function(){

            "use strict";

            /**
             * Start initial save button
             */

             /**
              * Start initial tooltips
              */
            // $('[data-toggle="tooltip"]').tooltip();


            // $('#item-save-button-xl').on('click', function(){
            //     $("#item-save-button-xl").addClass("disabled");
            //     $("#item-save-form-xl").submit();
            // });

            // $('#item-saved-button-xl').on('click', function(){
            //     $("#item-saved-button-xl").off("mouseenter");
            //     $("#item-saved-button-xl").off("mouseleave");
            //     $("#item-saved-button-xl").addClass("disabled");
            //     $("#item-unsave-form-xl").submit();
            // });

            // $("#item-saved-button-xl").on('mouseenter', function(){
            //     $("#item-saved-button-xl").attr("class", "btn primary-btn primary-btn-danger");
            //     $("#item-saved-button-xl").html("<i class=\"far fa-trash-alt\"></i>");
            // });

            // $("#item-saved-button-xl").on('mouseleave', function(){
            //     $("#item-saved-button-xl").attr("class", "btn primary-btn primary-btn-warning");
            //     $("#item-saved-button-xl").html("<i class=\"fas fa-check\"></i>");
            // });
            /**
             * End initial save button
             */

        });
</script>  -->   
<!-- <div class="listing__item listing__item_featured_box">
    <a href="{{ route('page.item', $item->item_slug) }}">
        <div class="listing__item__pic set-bg" data-setbg="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_medium.webp') }}">
            @if(empty($item->user->user_image))
                <img src="{{ asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/profile-'. intval($item->user->id % 10) . '.webp') }}" alt="">
            @else
                <img src="{{ Storage::disk('public')->url('user/' . $item->user->user_image) }}" alt="{{ $item->user->name }}">
            @endif
            <div class="listing__item__pic__tag">{{ __('frontend.item.featured') }}</div>
        </div>
    </a>
    <div class="listing__item__text">
        <div class="listing__item__text__inside">
            <a href="{{ route('page.item', $item->item_slug) }}">
                <h5>{{ str_limit($item->item_title, 44, '...') }}</h5>
            </a>

            @if($item->getCountRating() > 0)
                <div class="listing__item__text__rating">
                    <div class="listing__item__rating__star">
                        <div class="pl-0 rating_stars rating_stars_{{ $item->item_slug }}" data-id="rating_stars_{{ $item->item_slug }}" data-rating="{{ $item->item_average_rating }}"></div>
                    </div>
                    <h6>
                        @if($item->getCountRating() == 1)
                            {{ $item->getCountRating() . ' ' . __('review.frontend.review') }}
                        @else
                            {{ $item->getCountRating() . ' ' . __('review.frontend.reviews') }}
                        @endif
                    </h6>
                </div>
            @endif

            @if($item->item_type == \App\Item::ITEM_TYPE_REGULAR)
                <ul>
                    <li>
                        <span class="icon_pin_alt"></span>
                        {{ $item->item_address_hide == \App\Item::ITEM_ADDR_NOT_HIDE ? $item->item_address . ',' : '' }}
                        <a href="{{ route('page.city', ['state_slug'=>$item->state->state_slug, 'city_slug'=>$item->city->city_slug]) }}">{{ $item->city->city_name }}</a>,
                        <a href="{{ route('page.state', ['state_slug'=>$item->state->state_slug]) }}">{{ $item->state->state_name }}</a>
                        {{ $item->item_postal_code }}
                    </li>
                </ul>
            @endif
        </div>
        <div class="listing__item__text__info">
            <div class="listing__item__text__info__left">
                @foreach($item->getAllCategories(\App\Item::ITEM_TOTAL_SHOW_CATEGORY_HOMEPAGE - 1) as $item_categories_key => $category)
                    <a href="{{ route('page.category', $category->category_slug) }}">
                        <span class="custom-color-schema-{{ $paid_items_key%10 }}">
                            @if(!empty($category->category_icon))
                                <i class="{{ $category->category_icon }}"></i>
                            @else
                                <i class="fas fa-heart"></i>
                            @endif
                            {{ $category->category_name }}
                        </span>
                    </a>
                @endforeach
            </div>
            <div class="listing__item__text__info__right">
                @if($item->item_hour_show_hours == \App\Item::ITEM_HOUR_SHOW)
                    @if($item->hasOpened())
                        <span class="item-box-hour-span-opened">{{ __('item_hour.frontend-item-box-hour-opened') }}</span>
                    @else
                        <span class="item-box-hour-span-closed">{{ __('item_hour.frontend-item-box-hour-closed') }}</span>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div> -->
