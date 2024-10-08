<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>

    @include("project.layouts.inc._meta")
    <title>@yield('page-title')</title>

    @include("project.layouts.inc._css")

    @stack("style")

</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">

    @include("project.layouts.inc.sidebar")
    <div id="loading">
        @include('project.partials.dashboard._body_loader')
    </div>
    <div class="wrapper">
        @yield('content')
        {{-- {{ $slot }} --}}
    </div>
    @include('project.layouts.inc._scripts')

    @stack("script")
</body>

</html>
