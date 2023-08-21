<header class="header" class="header">
    <nav class="navbar navbar-expand-xl navbar-light">
        <a class="navbar-brand" href="{{ app()->getLocale() == 'vi' ? '/' : '/en' }}">
            <img class="zeit-logo" src="{{!empty($trans['logo']) ? asset('storage/assets/img/constant/' . $trans['logo']) : asset('frontEnd/wp-content/themes/zeit-theme-dev/images/imgpsh_fullsize_anim.jpg') }}">
        </a>
        <button class="btn navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
            aria-label="Toggle navigation">
            <span></span>
            <span></span>
        </button>
        <div class="collapse navbar-collapse navbar-nav-scroll" id="navbarScroll">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @forelse($menus as $menu)
                @if($menu->id == 3)
                <li class="nav-item has-megamenu">
                <a class="nav-link {{ request()->segment(1) == $slugs[8] || request()->segment(2) == $slugs[8] || request()->segment(2) === $menu->slug || request()->segment(1) === $menu->slug ? 'active' : '' }}" aria-current="page"
                        href="{{ get_link($slugs, [$menu->id]) }}">{{ $menu->menu_name }}</a>
                    <div class="mega-menu">
                        <div class="container">
                            <div class="mega-wrapper">
                                <div class="link-list">
                                    <h3 class="display-2 text-blue nav-title">{{ __('message.product_solution') }}</h3>
                                    <div class="list">
                                        @forelse($menu->children as $child)
                                        <p class="item">
                                            <a
                                                href="{{ get_link($slugs, [$menu->id, $child->id]) }}">{{ $child->menuTransateDefault->first()->menu_name }}</a>
                                        </p>
                                        @empty
                                        <p class="item"></p>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="thumb">
                                    <img
                                        src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/images/mega-2.jpg') }}">
                                    <div class="content">
                                        <p class="sub">{{ __('message.product_solution_content') }}</p>
                                        <h5 class="name heading-1">{{ __('message.product_solution_description') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @elseif($menu->id == 4)
                    <li class="nav-item has-megamenu">
                        <a class="nav-link {{ request()->segment(2) === $menu->slug || request()->segment(1) === $menu->slug ? 'active' : '' }}" aria-current="page"
                            href="{{ get_link($slugs, [$menu->id]) }}">{{ $menu->menu_name }}</a>
                        <div class="mega-menu">
                            <div class="container">
                                <div class="mega-wrapper">
                                    <div class="link-list">
                                        <h3 class="display-2 text-blue nav-title">{{ $menu->menu_name }}</h3>
                                        <div class="list">
                                            @forelse($menu->children as $child)
                                                @if($child->is_menu == 1 || $child->is_menu == 3  || $child->is_menu == 4)
                                                    <p class="item">
                                                        <a
                                                            href="{{ get_link($slugs, [$menu->id, $child->id]) }}">{{ $child->menuTransateDefault->first()->menu_name }}</a>
                                                    </p>
                                                @endif
                                            @empty
                                            <p class="item"></p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        @if((request()->segment(1) =='' || request()->segment(1) === 'en' && request()->segment(2) === null) &&  $menu->slug === '')
                            <a class="nav-link active" aria-current="page"
                            href="{{ get_link($slugs, [$menu->id]) }}">{{ $menu->menu_name }}</a>
                        @else
                        <a class="nav-link {{ request()->segment(1) === $menu->slug || request()->segment(2) === $menu->slug ? 'active' : '' }}" aria-current="page"
                            href="{{ get_link($slugs, [$menu->id]) }}">{{ $menu->menu_name }}</a>
                        @endif   
                    </li>
                @endif
                @empty
                <li class="nav-item">No data</li>
                @endforelse
            </ul>
            <div class="right-col">
                <button class="btn btn-default btn-search"><span class="icon-search"></span></button>
                <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="icon-globe"></div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="{{ render_link('vi') }}">VI</a></li>
                        <li><a class="dropdown-item" href="{{ render_link('en') }}">EN</a></li>
                    </ul>
                </div>
            </div>
            <div class="search-bar">
                <form action="{{ get_link($slugs, 4) }}" id="topSearch" class="searchForm">
                    <span class="icon-search text-blue"></span>
                    <input class="search-input" type="text" name="search" placeholder="{{ __('message.search_placeholder') }}" value="">
                    <button class="btn btn-submit" type="submit"><span class="icon icon-right-arrow"></span></button>
                </form>
            </div>
        </div>
    </nav>
</header>
