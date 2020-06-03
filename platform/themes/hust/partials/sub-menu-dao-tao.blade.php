<ul  id="nav" class="nav menu navbar-nav" {!! $options !!}>
    @foreach (get_menu_dao_tao($row->parent_id) as $row)
        <li class="menu-item @if ($row->has_child) menu-item-has-children @endif {{ $row->css_class }}
        @if ($row->url == Request::url()) active @endif">
            <a href="{{ $row->url }}" target="{{ $row->target }}">
                {{ $row->title }}@if ($row->icon_font)<i class="{{$row->icon_font}}"></i> @endif
            </a>
            @if (get_menu_dao_tao($row->parent_id))
                {!!
                    Menu::generateMenu([
                        'slug' => $menu->slug,
                        'view' => 'sub_menu',
                        'options' => ['class' => 'main-menu-dao-tao'],
                        'parent_id' => $row->id,
                    ])
                !!}
            @endif
        </li>
    @endforeach
</ul>
