<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
            @include('layouts.head')
<body>
    <div id="app">
            @include('layouts.nav')
        <div class="container">
        <main class="py-4">
            @yield('content')
        </main>
            @include('layouts.footer')
        </div>
    </div>
</body>
</html>
