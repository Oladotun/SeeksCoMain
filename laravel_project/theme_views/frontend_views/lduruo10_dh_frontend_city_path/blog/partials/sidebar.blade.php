<div class="blog__sidebar">
    @if($recent_posts->count() > 0)
        <div class="blog__sidebar__recent">
            <h5>{{ __('frontend.blog.popular-posts') }}</h5>

            @foreach($recent_posts as $recent_posts_key => $post)
                <a href="{{ route('page.blog.show', $post->slug) }}" class="blog__sidebar__recent__item">
                    <div class="blog__sidebar__recent__item__pic">
                        <img src="{{ empty($post->featured_image) ? asset('theme_assets/frontend_assets/lduruo10_dh_frontend_city_path/placeholder/full_item_feature_image_tiny.webp') : url('laravel_project/public' . $post->featured_image) }}" alt="">
                    </div>
                    <div class="blog__sidebar__recent__item__text">
                        <span>
                            <i class="fas fa-tags"></i>
                            @if($post->topic()->count() != 0)
                                {{ $post->topic()->first()->name }}
                            @else
                                {{ __('frontend.blog.uncategorized') }}
                            @endif
                        </span>
                        <h6>{{ $post->title }}</h6>
                        <p><i class="fas fa-clock"></i> {{ $post->updated_at->diffForHumans() }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif

    @if($all_topics->count() > 0)
        <div class="blog__sidebar__categories">
            <h5>{{ trans_choice('frontend.blog.topic', 1) }}</h5>
            <ul>
                @foreach($all_topics as $all_topics_key => $topic)
                    <li><a href="{{ route('page.blog.topic', $topic->slug) }}">{{ $topic->name }} <span>{{ $topic->posts()->where('published_at', '!=', null)->count() }}</span></a></li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($all_tags->count() > 0)
        <div class="blog__sidebar__tags">
            <h5>{{ trans_choice('frontend.blog.tag', 1) }}</h5>
            @foreach($all_tags as $all_tags_key => $tag)
                <a href="{{ route('page.blog.tag', $tag->slug) }}">{{ $tag->name }}</a>
            @endforeach
        </div>
    @endif
</div>
