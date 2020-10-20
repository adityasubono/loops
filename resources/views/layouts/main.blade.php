<!doctype html>
<html lang="en">
@include('includes.head')
<body>
<div class="container">

{{--    Header    --}}
    @include('includes.header')
{{--    Navbar   --}}
    @include('includes._navbar')

    @yield('container-fluid')


</div>
@include('includes.footer')
</body>
</html>






