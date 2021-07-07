<form action="{{ route('page.search') }}">
    <input name="search_query" type="text" class="@error('search_query') is-invalid @enderror" value="{{ old('search_query') }}" placeholder="{{ __('frontend.search.what-are-you-looking-for') }}">
    @error('search_query')
    <div class="invalid-tooltip invalid-tooltip-side-search-query">
        {{ $message }}
    </div>
    @enderror
    <button type="submit" class="btn primary-btn listing__sidebar__working__hours__btn">
        <i class="fas fa-search"></i>
        {{ __('frontend.search.search') }}
    </button>
</form>
