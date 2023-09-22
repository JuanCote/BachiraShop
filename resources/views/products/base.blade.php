<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    <div class="max-w-[1280px] mx-auto">
        <header>
            @include('header')
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            @include('footer')
        </footer>
    </div>
</body>
<script src="{{ url('js/header/header.js') }}"></script>
<script src="{{ url('js/products/products.js') }}"></script>
</html>
