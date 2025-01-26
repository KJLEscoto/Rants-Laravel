<x-layout>
    <main class="p-10 flex justify-between">
        Profile
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <x-form.button label="Logout" />
        </form>
    </main>
</x-layout>
