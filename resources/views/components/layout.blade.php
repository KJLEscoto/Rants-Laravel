<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @auth
        <div class="flex justify-between px-10 py-3">
            <section class="flex gap-3">
                <a href="{{ route('rants.index') }}">Home</a>
                <a href="/rants#">Notifications</a>
                <a href="/rants#">Profile</a>
            </section>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <x-form.button label="Logout" />
            </form>
        </div>
    @endauth

    <div>{{ $slot }}</div>
</body>

</html>
