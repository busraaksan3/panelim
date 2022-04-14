

@foreach(config("menu") as $menu)

<li class="sub-category">
    <h3>{{ $menu['sub'] }}</h3>
</li>
<li class="slide">
    <a class="side-menu__item" data-bs-toggle="slide" href="{{ route($menu['route']) }}"><i
            class="{{ $menu['icon'] }}"></i><span
            class="side-menu__label">{{ $menu['name'] }}</span></a>
</li>
@endforeach