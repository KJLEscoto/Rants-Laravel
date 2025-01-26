<x-layout>
    <main class="p-10 space-y-5">

        @if (session('success'))
            <x-flash-msg msg="success" />
        @elseif (session('status'))
            <x-flash-msg msg="status" />
        @endif

        <form action="{{ route('rants.store') }}" method="POST" class="p-5 rounded-xl bg-white space-y-3 shadow border">
            @csrf
            <section class="flex gap-2">
                <img class="h-10 w-10 rounded-full border" src="/sung.jpg">
                <textarea name="content" id="content" placeholder="Speak your mind..."
                    class="px-2 py-1 h-20 overflow-auto w-full focus:ring-0 focus:outline-none rounded focus:shadow resize-none border-0">{{ old('thoughts') }}</textarea>
            </section>
            <hr>
            <div class="flex justify-between items-center gap-3">
                <button class="text-gray-500 hover:text-black">
                    <i class="fa-regular fa-image"></i>
                    <span>Photo</span>
                </button>
                <x-form.button leftIcon="fa-solid fa-bullhorn" label="Rant" />
            </div>
        </form>

        <hr>

        <div class="space-y-7">
            @foreach ($rants as $index => $rant)
                <x-card :rant="$rant" :index="$index" />
            @endforeach
        </div>

    </main>
</x-layout>
