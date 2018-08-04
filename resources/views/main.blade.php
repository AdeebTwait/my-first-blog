<!doctype html>
<html lang="en">

<head>
    @include('partials._head')
</head>


<body>
    @include('partials._nav')
<!-- Start Content -->
    <div class="container">
        @include('partials._messages')
        @yield('content')
        @include('partials._footer')
    </div>
<!-- End Content -->

    @include('partials._javascript')

    @yield('scripts')
</body>


</html>
