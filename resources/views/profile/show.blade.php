<x-layout>

    {{-- banner --}}
    <img class="absolute inset-0 top-16 object-cover object-center z-0 w-full h-44 bg-gray-200" src="/banner.jpg">

    <main class="relative p-10 space-y-5 z-20">
        <div class="bg-white/70 backdrop-blur p-5 w-full h-auto rounded-xl border shadow-md space-y-5">
            <section class="flex justify-between gap-5">
                <div class="flex gap-5">
                    <div class="flex flex-col items-center gap-2">
                        <img class="w-20 h-20 rounded-full border bg-white" src="/sung.jpg" />

                        @if ($user->id == Auth::id())
                            <p class="text-[10px] font-medium tracking-widest text-gray-700">YOU</p>
                        @endif
                    </div>
                    <div class="space-y-3">
                        <section>
                            <h1 class="font-bold text-3xl capitalize">{{ $user->username }}</h1>
                            <p class="text-gray-700">{{ $user->email }}</p>
                        </section>
                        @if ($user->bio)
                            <p>{{ $user->bio }}</p>
                        @else
                            <p>This user has no bio yet.</p>
                        @endif
                    </div>
                </div>
                @if ($user->id == Auth::id())
                    <x-form.button leftIcon="fa-regular fa-pen-to-square" label="Edit Profile" />
                @else
                    <x-form.button leftIcon="fa-solid fa-user-plus" label="Follow" />
                @endif
            </section>
            <hr>
            <section class="flex justify-evenly">
                <div class="flex flex-col gap-1 items-center">
                    <p class="font-bold text-lg">
                        {{ $rants->count() }}
                    </p>
                    <p class="flex gap-2 items-center text-gray-700">
                        <i class="fa-solid fa-bullhorn"></i>
                        Rants
                    </p>
                </div>
                <div class="flex flex-col gap-1 items-center">
                    <p class="font-bold text-lg">8</p>
                    <p class="flex gap-2 items-center text-gray-700">
                        <i class="fa-solid fa-users"></i>
                        Followers
                    </p>
                </div>
                <div class="flex flex-col gap-1 items-center">
                    <p class="font-bold text-lg">3</p>
                    <p class="flex gap-2 items-center text-gray-700">
                        <i class="fa-solid fa-user-group"></i>
                        Following
                    </p>
                </div>
            </section>
            <hr>
            <section class="space-y-2 text-gray-500 text-sm font-medium">
                @if ($user->location)
                    <p class="capitalize flex gap-2 items-center">
                        <i class="fa-solid fa-earth-americas"></i>
                        {{ $user->location }}
                    </p>
                @endif
                @if ($user->website)
                    <span class="flex gap-1 items-center">
                        <i class="fa-solid fa-link"></i>
                        <a href="{{ $user->website }}" target="_blank"
                            class="hover:text-blue-500 hover:underline underline-offset-4">{{ $user->website }}</a>
                    </span>
                @endif
                <p class="flex gap-2 items-center">
                    <i class="fa-regular fa-calendar-check"></i>
                    Joined {{ $user->created_at->format('F Y') }}
                </p>
            </section>
            <section>
                @if ($user->id == Auth::id())
                    <div class="flex justify-end">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <x-form.button bg="bg-red-500" leftIcon="fa-solid fa-arrow-right-from-bracket"
                                label="Logout" />
                        </form>
                    </div>
                @endif
            </section>
        </div>

        <div class="flex">
            <h1
                class="border-b-2 border-black font-semibold text-black cursor-pointer
            flex items-center gap-2 px-3 py-1">
                <i class="fa-solid fa-bullhorn"></i>
                Rants
            </h1>
            <span class="*:text-gray-500 hover:*:text-gray-800 flex gap-5 *:cursor-pointer">
                <h1 class="flex items-center gap-2  px-3 py-1">
                    {{-- <i class="fa-regular fa-heart"></i> --}}
                    <i class="fa-solid fa-heart"></i>
                    Likes
                </h1>
                <h1 class="flex items-center gap-2  px-3 py-1">
                    <i class="fa-solid fa-users"></i>
                    Followers
                </h1>
                <h1 class="flex items-center gap-2  px-3 py-1">
                    <i class="fa-solid fa-user-group"></i>
                    Following
                </h1>
            </span>
        </div>

        <div class="space-y-7">
            @foreach ($rants as $rant)
                <x-card :rant="$rant" />
            @endforeach
        </div>
    </main>
</x-layout>
