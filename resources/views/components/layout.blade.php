<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @auth
        <div class="w-full fixed top-0 border-b backdrop-blur-md bg-white/50 flex justify-center gap-5 px-10 py-5 z-50">
            <a href="{{ route('rants.index') }}"
                class="{{ Request::routeIs('rants.*') ? 'text-black font-medium' : 'text-gray-500 hover:text-gray-800' }}">
                <i class="fas fa-home"></i>
                Home
            </a>
            <a href="{{ route('notifications.index') }}"
                class="{{ Request::routeIs('notifications.*') ? 'text-black font-medium' : 'text-gray-500 hover:text-gray-800' }}">
                <i class="fas fa-bell"></i>
                Notifications
            </a>
            <a href="{{ route('profile.user', Auth::user()->username) }}"
                class="{{ Request::routeIs('profile.*') ? 'text-black font-medium' : 'text-gray-500 hover:text-gray-800' }}">
                <i class="fas fa-user"></i>
                Profile
            </a>
        </div>
    @endauth

    <div class="pt-14 relative">{{ $slot }}</div>
</body>

</html>
