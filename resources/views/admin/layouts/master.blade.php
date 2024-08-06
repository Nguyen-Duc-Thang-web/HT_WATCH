<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.partials.head')

<body class="container">

    <div class="site-wrap">

        <header class="site-navbar" role="banner">
            @include('admin.layouts.partials.header-menu')
        </header>

        @yield('noidung')

        <footer class="site-footer border-top">
            @include('admin.layouts.partials.footer')
        </footer>

    </div>

    @include('admin.layouts.partials.foot')

</body>

</html>
