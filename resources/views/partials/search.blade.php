<algolia-autocomplete index-name="products" placeholder="Search with algolia..."></algolia-autocomplete>

<form action="{{ route('search') }}" method="GET" class="search-form">
    <i class="fa fa-search search-icon"></i>
    <input type="text" name="query" id="query" value="{{ request()->input('query') }}" class="search-box" placeholder="Search for product">
</form>