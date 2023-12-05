<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="htmx-config" content='{"globalViewTransitions":"true"}'>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{--Bootstrap 5 for IE11--}}
    <script
        nomodule>window.MSInputMethodContext && document.documentMode && document.write("<link rel=\"stylesheet\" href=\"/css/bootstrap-ie11.min.css\"><script src=\"https://cdn.jsdelivr.net/combine/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js,npm/ie11-custom-properties@4,npm/element-qsa-scope@1\"><\/script><script crossorigin=\"anonymous\" src=\"https://polyfill.io/v3/polyfill.min.js?features=default%2CNumber.parseInt%2CNumber.parseFloat%2CArray.prototype.find%2CArray.prototype.includes\"><\/script>");</script>

    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{config('app.name')}}
        @endif
    </title>
</head>
<body hx-boost="true" hx-swap="innerHTML">
