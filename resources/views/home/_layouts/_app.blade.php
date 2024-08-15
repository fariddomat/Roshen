<!doctype html>
<html lang="zxx">
    @include('home._layouts._head')
    <body>

        <div class="loader-bg"></div>
        <div id="wrapper" class="wrapper2">

        @include('home._layouts._nav')

        @yield('content')

        </div>
        @include('home._layouts._footer')
        @include('home._layouts._modal')
    </body>
    </html>
