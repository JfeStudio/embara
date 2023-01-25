<!doctype html>
<html lang="en">

<head>
    <!-- link css -->
    @include('includes.style')
</head>

<body>

    <!-- navigation -->
    @include('includes.navigation')

    <!-- content -->
    @yield('content')
    <!-- end -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    @include('includes.script')

</body>

</html>
