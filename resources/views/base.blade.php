<!DOCTYPE html>
<html class="relative" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="main-container" class="w-[1280px] mx-auto">
        <header class="relative">
            @include('header')
        </header>
        <main>
            @yield('main')
        </main>
        <footer>
            @include('footer')
        </footer>
    </div>
</body>
<script type="module" src="{{ url('js/header/header.js') }}"></script>
</html>
