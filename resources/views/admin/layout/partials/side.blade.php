<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
    <a href="/admin">Mitech</a>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->segment(3) === 'about-us' ? 'active' : '' }}" href="{{ route('admin.article.about-us.form') }}">
                                    <svg class="nav-icon">
                                        <use
                                            xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-elevator') }}">
                                        </use>
                                    </svg> Về chúng tôi
                                </a>
                            </li>
                            <li class="nav-group {{ (request()->segment(2) === 'product' && request()->segment(3) != 'form')   ? 'show' : '' }}">
                                <a class="nav-link nav-group-toggle {{ (request()->segment(2) === 'product' && request()->segment(3) != 'form')   ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-cursor') }}"></use>
                                </svg>Sản phẩm</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.product.index') }}" class="nav-link"><span class="nav-icon"></span>Danh sách</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.product.create') }}" class="nav-link"><span class="nav-icon"></span>Thêm mới</a></li>
                                </ul>
                            </li>
                            <li class="nav-group {{ (request()->segment(2) === 'distributor' && request()->segment(3) != 'form')   ? 'show' : '' }}">
                                <a class="nav-link nav-group-toggle {{ (request()->segment(2) === 'distributor' && request()->segment(3) != 'form') ?? ' active' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-building') }}"></use>
                                </svg>Nhà Phân phối</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.distributor.index') }}" class="nav-link"><span class="nav-icon"></span>Danh sách</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.distributor.create') }}" class="nav-link"><span class="nav-icon"></span>Thêm mới</a></li>
                                </ul>
                            </li>
                            <li class="nav-group {{ request()->segment(2) === 'material' ? 'show' : '' }}">
                                <a class="nav-link nav-group-toggle {{ request()->segment(2) === 'material' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-braille') }}"></use>
                                </svg>Vật liệu</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.material.index') }}" class="nav-link"><span class="nav-icon"></span>Danh sách</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.material.create') }}" class="nav-link"><span class="nav-icon"></span>Thêm mới</a></li>
                                </ul>
                            </li>
                            <li class="nav-group {{ request()->segment(2) === 'category' ? 'show' : '' }}">
                                <a class="nav-link nav-group-toggle {{ request()->segment(2) === 'category' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-list') }}"></use>
                                </svg>Danh mục</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.category.index') }}" class="nav-link"><span class="nav-icon"></span>Danh sách</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.category.create') }}" class="nav-link"><span class="nav-icon"></span>Thêm mới</a></li>
                                </ul>
                            </li>
                            <li class="nav-group {{ request()->segment(2) === 'slider' ? 'show' : '' }}">
                                <a class="nav-link nav-group-toggle {{ request()->segment(2) === 'slider' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-voice') }}"></use>
                                </svg>Slider</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.slider.index') }}" class="nav-link"><span class="nav-icon"></span>Danh sách</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.slider.create') }}" class="nav-link"><span class="nav-icon"></span>Thêm mới</a></li>
                                </ul>
                            </li>
                            <li class="nav-group {{ request()->segment(2) === 'library' ? 'show' : '' }}">
                                <a class="nav-link nav-group-toggle {{ request()->segment(2) === 'library' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-address-book') }}"></use>
                                </svg>Thư viện</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.library.index') }}" class="nav-link"><span class="nav-icon"></span>Danh sách</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.library.create') }}" class="nav-link"><span class="nav-icon"></span>Thêm mới</a></li>
                                </ul>
                            </li>
                            <li class="nav-group {{ request()->segment(2) === 'document' ? 'show' : '' }}">
                                <a class="nav-link nav-group-toggle {{ request()->segment(2) === 'document' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                                </svg>Tài liệu</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.document.index') }}" class="nav-link"><span class="nav-icon"></span>Danh Sách</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.document.create') }}" class="nav-link"><span class="nav-icon"></span>Thêm mới</a></li>
                                </ul>
                            </li>
                            <li class="nav-group {{ request()->segment(3) === 'replacement' ? 'show' : '' }}">
                                <a class="nav-link nav-group-toggle {{ request()->segment(3) === 'replacement' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-building') }}"></use>
                                </svg>Chính sách bảo hành</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.article.index', ['segment' => 'replacement']) }}" class="nav-link"><span class="nav-icon"></span>Danh sách</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.article.create', ['segment' => 'replacement']) }}" class="nav-link"><span class="nav-icon"></span>Thêm mới</a></li>
                                </ul>
                            </li>
                            <li class="nav-group {{ request()->segment(3) === 'techincal' ? 'show' : '' }}">
                                <a class="nav-link nav-group-toggle {{ request()->segment(3) === 'techincal' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-cursor') }}"></use>
                                </svg>Kỹ thuật</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.article.index', ['segment' => 'techincal']) }}" class="nav-link"><span class="nav-icon"></span>Danh sách</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.article.create', ['segment' => 'techincal']) }}" class="nav-link"><span class="nav-icon"></span>Thêm mới</a></li>
                                </ul>
                            </li>
                            <li class="nav-group {{ request()->segment(3) === 'installation-guide' ? 'show' : '' }}">
                                <a class="nav-link nav-group-toggle {{ request()->segment(3) === 'installation-guide' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                                </svg>Hướng dẫn thi công</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.article.index', ['segment' => 'installation-guide']) }}" class="nav-link"><span class="nav-icon"></span>Danh sách</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.article.create', ['segment' => 'installation-guide']) }}" class="nav-link"><span class="nav-icon"></span>Thêm mới</a></li>
                                </ul>
                            </li>
                            <li class="nav-group {{ request()->segment(3) === 'identification' ? 'show' : '' }}">
                                <a class="nav-link nav-group-toggle {{ request()->segment(3) === 'identification' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-lock-unlocked') }}"></use>
                                </svg>Nhận dạng thạch cao</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.article.index', ['segment' => 'identification']) }}" class="nav-link"><span class="nav-icon"></span>Danh sách</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.article.create', ['segment' => 'identification']) }}" class="nav-link"><span class="nav-icon"></span>Thêm mới</a></li>
                                </ul>
                            </li>
                            <li class="nav-group {{ request()->segment(3) === 'news' ? 'show' : '' }}">
                                <a class="nav-link nav-group-toggle {{ request()->segment(3) === 'news' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-newspaper') }}"></use>
                                </svg>Tin tức</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.article.index', ['segment' => 'news']) }}" class="nav-link"><span class="nav-icon"></span>Danh sách</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.article.create', ['segment' => 'news']) }}" class="nav-link"><span class="nav-icon"></span>Thêm mới</a></li>
                                </ul>
                            </li>
                            <li class="nav-group {{ request()->segment(2) === 'faq' ? 'show' : '' }}">
                                <a class="nav-link nav-group-toggle {{ request()->segment(2) === 'faq' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-comment-square') }}"></use>
                                </svg>Câu hỏi thường gặp</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a  href="{{ route('admin.faq.index') }}" class="nav-link"><span class="nav-icon"></span>Danh sách</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.faq.create') }}" class="nav-link"><span class="nav-icon"></span>Thêm mới</a></li>
                                </ul>
                            </li>
                            <li class="nav-group {{ request()->segment(2) === 'faq' ? 'contact' : '' }}">
                                <a class="nav-link nav-group-toggle {{ request()->segment(2) === 'contact' ? 'active' : '' }}">
                                    <svg class="nav-icon">
                                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-phone') }}"></use>
                                </svg>Liên hệ</a>
                                <ul class="nav-group-items">
                                <li class="nav-item"><a  href="{{ route('admin.distributor.form') }}" class="nav-link"><span class="nav-icon"></span>Biểu mẫu phân phối</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.product.form') }}" class="nav-link"><span class="nav-icon"></span>Biểu mẫu Sản phẩm</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.contact.index') }}" class="nav-link"><span class="nav-icon"></span>Biểu mẫu liên hệ</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.warranty.index') }}" class="nav-link"><span class="nav-icon"></span>Biểu mẫu bảo hành</a></li>
                                    <li class="nav-item"><a  href="{{ route('admin.form-new.index') }}" class="nav-link"><span class="nav-icon"></span>Biểu mẫu tin tức</a></li>
                                </ul>
                            </li>
                            <li class="nav-item {{ request()->segment(2) === 'config' ? 'contact' : '' }}">
                                <a class="nav-link {{ request()->segment(2) === 'config' ? 'active' : '' }}" href="{{ route('admin.config.index')}}">
                                    <svg class="nav-icon">
                                        <use
                                            xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-cog') }}">
                                        </use>
                                    </svg> Cài đặt
                                </a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 841px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar" style="height: 442px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>