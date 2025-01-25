<x-layout>
    <main class="p-10 space-y-5">

        @if (session('success'))
            <x-flash-msg msg="success" />
        @endif

        <form action="{{ route('rants.store') }}" method="POST" class="p-5 rounded-xl bg-white space-y-3 shadow border">
            @csrf
            <section class="flex gap-2">
                <x-random-pic className="h-10 w-10 rounded-full border" />
                <textarea name="content" id="content" placeholder="Speak your mind..."
                    class="px-2 py-1 h-20 overflow-auto w-full focus:ring-0 focus:outline-none rounded focus:shadow resize-none border-0">{{ old('thoughts') }}</textarea>
            </section>
            <hr>
            <div class="flex justify-between items-center gap-3">
                <button>Insert image</button>
                <x-form.button label="Post" />
            </div>
        </form>

        <hr>

        <div class="space-y-7">
            @foreach ($rants as $index => $rant)
                <div
                    class=" border shadow-md rounded-xl p-5 space-y-5
                     @if ($rant->user->id == Auth::id() && $index == 0) border-2 border-green-500 @endif">
                    <section class="flex gap-5">
                        <x-random-pic className="w-10 h-10 rounded-full border" />
                        <div>
                            <section class="flex items-center gap-2 mb-2">
                                <h1 class="font-bold capitalize">{{ $rant->user->username }}</h1>
                                <span>&bull;</span>
                                <p class="text-sm font-medium text-gray-500">
                                    {{ $rant->created_at->diffForHumans() }}
                                </p>
                            </section>
                            <span>{{ Str::words($rant->content, 35) }}</span>
                            @if (Str::wordCount($rant->content) > 35)
                                <a href="#" class="text-xs text-gray-400 font-medium hover:text-blue-500">read
                                    more.</a>
                            @endif
                        </div>
                    </section>
                    <section>
                        <x-random-pic className="w-full h-full rounded" />
                    </section>
                    <section
                        class="flex gap-4 text-sm font-semibold text-gray-600 hover:*:text-blue-500 *:cursor-pointer">
                        <span>hearts 3</span>
                        <span>comments 1</span>
                    </section>
                </div>
            @endforeach
        </div>

    </main>
</x-layout>
