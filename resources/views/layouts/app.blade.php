<!DOCTYPE html>
<html lang="en">

@include('layouts.head') {{-- layouts/head --}}

<body id="page-top">

    {{-- @yield is used in app.blade.php file and 
    is used to define section in layout from child to master and 
    the current page app.blade.php is the master page--}}

@yield('content')

</body>

@include('layouts.scripts') {{-- layouts/scripts --}}

</html>