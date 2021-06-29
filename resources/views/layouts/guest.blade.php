<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('tinymce')

</head>
<body>

    <div class="font-sans text-gray-900 antialiased">
        <div class="p-6 bg-white border-b border-gray-200 flex items-center">
            <a id="logo" href="{{ route('home') }}" class="bg-blue-100 p-5 rounded-full"><img src="{{ asset('img/assets/logo-500.png') }}" class="w-16"></a>
            <ul class="flex space-around">
                <li class="text-lg lg:mx-4 font-bold"><a href="{{ route('home') }}">Home</a></li>
                <li class="text-lg lg:mx-4 font-bold"><a href="{{ route('index') }}">Properties</a></li>
                <li class="text-lg lg:mx-4 font-bold"><a href="{{ route('contact') }}">Contact</a></li>
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <li class="text-lg lg:mx-4 font-bold"><a href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a></li>
                </form>
                @endauth
            </ul>
        </div>
        {{ $slot }}
    </div>

    <script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
</body>
</html>
