<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    @include('site.inc.meta')
    <title>Zemovit | @yield('title')</title>
    @include('site.inc.css')
</head>

<body>
<div class="preLoader">
    <!-- preLoaderImage -->
    <figure class="Loading"></figure>
</div>
<!-- header -->
<header>
    @include('site.layouts.header')
</header>
<!-- ===================================
 ==================start page content========================
 ============================================================ -->
<main>
    @yield('content')
</main>
<!-- ===================================
 ==================end page content========================
 ============================================================ -->
<!-- footer -->
<footer>
    @include('site.layouts.footer')

</footer>

<!-- (((((((((script))))))))) -->
@include('site.inc.js')
</body>
</html>
