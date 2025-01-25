<x-layout>
    Login

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <x-form.input label="Username" name_id="username" />
        <x-form.input label="Password" name_id="password" type="password" />
        <x-form.button label="Login" />
    </form>
</x-layout>
