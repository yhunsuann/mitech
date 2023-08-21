<html lang="en">
    @include('admin.layout.partials.head')
    <body>
        @include('admin.layout.partials.side')
        <div class="wrapper d-flex flex-column min-vh-100 bg-light bg-white">
            @include('admin.layout.partials.header')
            <div class="body flex-grow-1 px-3 pt-4">
                <div class="container-lg">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('admin.layout.partials.footer')
    </body>
</html>