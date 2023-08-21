<header class="header header-sticky">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
        </button>
        <a class="header-brand d-md-none" href="javascript:{0}">
           Mitech Project
        </a>
        <ul class="nav nav-pills header-nav ms-auto">
            <li class="nav-item">
            </li>
        </ul>
        <ul class="header-nav ms-3">
            <li class="nav-item dropdown nav-logout">
                <a href="{{ route('admin.logout') }}" class="nav-link py-0" aria-haspopup="true">
                    <div class="avatar avatar-md"><img class="avatar-img" src="" alt=""> Logout </div>
                </a>
            </li>
        </ul>
    </div>
</header>