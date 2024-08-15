<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

@include('dashboard._layouts._head')


<body class="navbar-fixed sidebar-nav fixed-nav">
 
    <!-- fixed-top-->
    @include('dashboard._layouts._nav')

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    @include('dashboard._layouts._side')

    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>

        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
              @yield('content')
            </div>
        </div>
    </main>

    <!-- ////////////////////////////////////////////////////////////////////////////-->

    @include('dashboard._layouts._footer')

</body>

</html>
