<div class="filters">
    <div class="accordion" id="accordionFilter">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Topic</button>
            </h2>
            <div class="accordion-collapse collapse show">
                <div class="accordion-body">
                    @forelse ($menus as $key => $menu)
                        @if($menu->id == 4)
                            @forelse ($menu->children as $key => $child)
                                @if($child->is_menu == 0 || $child->is_menu == 3 || $child->is_menu == 4)
                                <a class="link-item {{ request()->segment(3) === $child->menuTransateDefault->first()->slug || request()->segment(2) === $child->menuTransateDefault->first()->slug ? 'active' : '' }}" href="{{ get_link($slugs, [$menu->id, $child->id]) }}">
                                    {{ $child->menuTransateDefault->first()->menu_name }}
                                </a>
                                @endif
                            @empty
                            <div>No data</div>
                            @endforelse
                        @endif
                    @empty
                    <div>No data</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-secondary has-right-icon" href="">
    </a>
</div>