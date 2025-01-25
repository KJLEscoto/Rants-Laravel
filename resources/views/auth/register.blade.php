<x-layout>
    register

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <x-form.input label="Username" name_id="username" />
        <x-form.input label="Email" name_id="email" type="email" />
        <x-form.input label="Password" name_id="password" type="password" />
        <x-form.input label="Confirm Password" name_id="password_confirmation" type="password" />
        <x-form.button label="Register" />
    </form>
</x-layout>
