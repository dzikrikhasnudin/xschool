<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (isset($title))
    <title> {{ $title . ' | X-School' }}</title>
    @else
    <title>X-School - More Than Just Study</title>
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-EJMV8ZB8Z9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-EJMV8ZB8Z9');
    </script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    @livewireStyles
    @stack('style')
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100 pb-20 lg:pb-0">
        @livewire('navigation-menu')
        {{-- @include('navigation-menu-old') --}}
        @include('partials.sidebar')


        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow mt-16">
            <div class="max-w-6xl mx-auto pt-4 pb-2 px-4 sm:px-6 lg:px-4 md:ml-60 lg:ml-54 lg:pl-10">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main class="md:max-w-2xl lg:max-w-4xl xl:max-w-6xl lg:ml-auto md:ml-56 lg:pl-32 xl:pl-12">
            {{ $slot }}
        </main>
    </div>

    @include('partials.bottom-navigation')

    @stack('modal')
    @include('sweetalert::alert')
    @livewireScripts
    @livewire('livewire-ui-modal')
    <script src="{{ asset('js/navigation.js') }}"></script>
    @stack('script')
</body>

</html>