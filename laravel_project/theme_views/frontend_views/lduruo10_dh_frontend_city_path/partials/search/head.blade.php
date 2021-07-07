<form action="{{ route('page.search') }}">
    <input id="search_query" name="search_query" type="text" value="{{ old('search_query') ? old('search_query') : (isset($last_search_query) ? $last_search_query : '') }}" placeholder="{{ __('categories.search-query-placeholder') }}">
    @error('search_query')
    <div class="invalid-tooltip">
        {{ $message }}
    </div>
    @enderror
    <button type="submit">{{ __('frontend.search.search') }}</button>
</form>
