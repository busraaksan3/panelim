

@foreach(config("menu") as $menu)

<!--<li class="sub-category">
    @if ($menu['sub']!=null )
    <h3>{{ $menu['sub'] }}</h3>
    @endif
</li>-->
<li class="slide">
    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route($menu['route']) }}"><i
            class="{{ $menu['icon'] }}"></i><span
            class="side-menu__label">{{ $menu['name'] }}</span></a>
</li>
@endforeach