<!doctype html>
<html lang="{{ app()->getLocale() == 'en' ? 'en-US' : 'vi-VN' }}">
    @include('client.layouts.partials.head')
<body class="home page-template page-template-tpl-home page-template-tpl-hometpl-home-php page page-id-7 sub">
    @include('client.layouts.partials.header')
    <main class="main">
        @yield('content')
    </main>
    @include('client.layouts.partials.footer')
</body>
</html>