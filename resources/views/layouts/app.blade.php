<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
            @include('layouts.head')
<body>
    <div id="app">
            @include('layouts.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
