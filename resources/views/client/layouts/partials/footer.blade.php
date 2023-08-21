<footer class="footer wow fadeInUp" data-wow-delay=".3s">
        <div class="container">
            <div class="wrapper">
                <div class="left-column">
                    <div class="top">
                        <img class="zeit-logo" src="{{!empty($trans['logo']) ? asset('storage/assets/img/constant/' . $trans['logo']) : asset('frontEnd/wp-content/themes/zeit-theme-dev/images/imgpsh_fullsize_anim.jpg') }}" alt="#">
                        <div class="desc mt-2">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="right-column">
                    <div class="links-block">
                        <p class="text-blue text-uppercase block-title">{{ __('message.about-us') }}</p>
                        <ul>
                            @forelse($menus as $key => $menu)
                                @if($menu->is_footer == 1)
                                    <li><a href="{{ get_link($slugs, [$menu->id]) }}">{{ $menu->menu_name }}</a></li>
                                @endif
                            @empty
                                <div></div>
                            @endforelse
                        </ul>
                    </div>
                    <div class="links-block">
                        <p class="text-blue text-uppercase block-title">{{ __('message.documents') }}</p>
                        <ul>
                            @forelse($menus as $key => $menu)
                                @forelse($menu->children as $child)
                                        @if($child->is_footer == 2)
                                            <li><a href="{{ get_link($slugs, [$menu->id, $child->id]) }}">{{ $child->menuTransateDefault->first()->menu_name }}</a></li>
                                        @endif
                                @empty
                                    <div></div>
                                @endforelse
                            @empty
                                <div></div>
                            @endforelse
                        </ul>
                    </div>
                    <div class="links-block">
                        <p class="text-blue text-uppercase block-title">{{ __('message.contact-us') }}</p>
                        <ul>
                            @forelse($menus as $key => $menu)
                                @if($menu->is_footer == 3)
                                    <li><a href="{{ get_link($slugs, [$menu->id]) }}">{{ $menu->menu_name }}</a></li>
                                @endif
                            @empty
                                <div></div>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="very-bottom-footer">
            <div class="container">
                <div class="bottom-wrapper">
                    <span class="copyright-text">{{ $trans['footer_text'] }}</span>
                    <div class="internal-links">
                        <div class="links">
                        </div>
                    </div>
                    <div class="socials">
                        <a href="{{ $trans['social_1'] }}" target="_blank" class="social-item"><span class="icon-facebook-2"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a href="tel:{{ $trans['phone_number'] }}" title="Hotline" class="al-hotline">{{ $trans['phone_number'] }}<span></span></a>
    <div id="al-cta-icon">
        <a class="al-cta-phone" title="Hotline" href="tel:028 3535 9295"><i class="al-ico-phone"></i></a>
        <a href="{{ $trans['social_2'] }}" title="Messenger" target="_blank" class="al-cta-messenger"><i class="al-ico-messenger"></i></a>
        <a href="{{ $trans['social_3'] }}" title="Zalo" target="_blank" class="al-cta-zalo"><i class="al-ico-zalo"></i></a>
    </div>
    <script type='text/javascript' src="{{ asset('frontEnd/code.jquery.com/jquery-3.5.13781.js?ver=6.2.2') }}" id='jquery351-js'></script>
    <script type='text/javascript' src="{{ asset('frontEnd/cdn.jsdelivr.net/npm/%40popperjs/core%402.9.2/dist/umd/popper.min3781.js?ver=6.2.2') }}" id='popper-js'></script>
    <script type='text/javascript' src="{{ asset('frontEnd/cdn.jsdelivr.net/npm/bootstrap%405.0.2/dist/js/bootstrap.min3781.js?ver=6.2.2') }}" id='bootstrap-js'></script>
    <script type='text/javascript' src="{{ asset('frontEnd/unpkg.com/swiper@8.4.7/swiper-bundle.min.js?ver=6.2.2') }}" id='swiper-js'></script>
    <script type='text/javascript' src="{{ asset('frontEnd/unpkg.com/current-device%400.10.2/umd/current-device.min.js?ver=6.2.2') }}" id='device-js'></script>
    <script type='text/javascript' src="{{ asset('frontEnd/wp-content/themes/zeit-theme-dev/js/core3781.js?ver=6.2.2') }}" id='corejs-js'></script>
    @yield('js-page')
