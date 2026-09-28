<!DOCTYPE html>
<html lang="en">
<head>
    @include("nami.layout.inc._meta")
    <title>@yield('page-title')</title>
    @include("nami.layout.inc._css")
    @yield("style")


</head>
<body class="layout-1  @if (app()->getLocale() == 'ar') rtl_mode @endif " data-luno="theme-blue"> <!-- h-menu  -->

@include("nami.layout.inc.sidebar")


<div class="wrapper">

    @include("nami.layout.inc.header")

     {{--@include("admin.layout.inc.top_menu")--}}
    @include('nami.layout.inc.page_loader')
    @yield('up-card')


    @include("nami.layout.inc.footer")
</div>
@include("nami.layout.inc.global_modals")
@include("nami.layout.inc.siderbar_models")


@include("nami.layout.inc._js")
@include("nami.layout.inc._js_custom")

<script>
    $('.select2').select2();

    $("input[type=search]").on("input", function() {
            var searchTerm = $(this).val().toLowerCase().trim();
            if (searchTerm.length > 0) {
                $(".nav-sidebar li").each(function() {
                    var listItemText = $(this).text().toLowerCase();
                    if (listItemText.indexOf(searchTerm) === -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            } else {
                $(".nav-sidebar li").show();
            }
        });
</script>
@yield("js")
</body>
</html>
