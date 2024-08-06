<!DOCTYPE html>
<html lang="en">
@include('client.layouts.partials.head')

<body class="container">

    <div class="site-wrap">

        <header class="site-navbar" role="banner">
            @include('client.layouts.partials.header-menu')
        </header>

        @yield('noidung')

        <footer class="site-footer border-top">
            @include('client.layouts.partials.footer')
        </footer>

    </div>

    @include('client.layouts.partials.foot')

</body>

</html>
