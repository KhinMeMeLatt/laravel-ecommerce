<ul>
    @foreach($items as $menu_item)
        @if ($menu_item->title === 'Follow Me:')
            <li>{{ $menu_item->title }}</li>
        @endif
        <li><a href="{{ $menu_item->link() }}"><i class="fa {{ $menu_item->title }}"></i></a></li>
    @endforeach
</ul>
{{-- <ul>
    <li>Follow Me: </li>
    <li><a href="https://andremadarang.com"><i class="fa fa-globe"></i></a></li>
    <li><a href="https://www.youtube.com/drehimself"><i class="fa fa-youtube"></i></a></li>
    <li><a href="https://github.com/drehimself"><i class="fa fa-github"></i></a></li>
    <li><a href="https://twitter.com/drehimself"><i class="fa fa-twitter"></i></a></li>
</ul> --}}