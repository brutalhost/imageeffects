@include('partials._head')
@include('partials.navbar')
<div id="app" class="slide-it container py-3">
    @yield('content')
</div>
@include('partials._footer')
