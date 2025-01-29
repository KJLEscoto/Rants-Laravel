@props(['rant', 'index' => ''])

<div
    class=" border shadow-md rounded-xl p-5 space-y-5
    @if ($rant->user->id == Auth::id() && $index == 0) border-2 border-black @endif">
    <section class="flex w-full gap-5">
        <a href="{{ route('profile.user', $rant->user->username) }}"
            class="w-auto overflow-hidden bg-gray-500 h-fit rounded-full group block">
            {{-- <x-random-pic
                className="w-10 bg-center bg-cover object-cover object-center transition-transform duration-200 ease-in-out rounded-full group-hover:scale-110" /> --}}
            <img class="w-10 bg-center bg-cover object-cover object-center transition-transform duration-200 ease-in-out rounded-full group-hover:scale-110"
                src="/sung.jpg">
        </a>

        <div class="w-full">
            <section class="flex items-center gap-2 mb-2">
                <a href="#" class="font-bold capitalize hover:underline">{{ $rant->user->username }}</a>
                <span>&bull;</span>
                <p class="text-sm font-medium text-gray-500">
                    {{ $rant->created_at->diffForHumans() }}
                </p>
            </section>
            <a href="#" class="w-full block">
                <a href="{{ route('rants.show', $rant->id) }}">
                    <span>{{ Str::words($rant->content, 35) }}</span>
                </a>
                @if (Str::wordCount($rant->content) > 35)
                    <span class="text-sm text-gray-500">see more.</span>
                @endif
            </a>
        </div>
    </section>

    <section class="flex gap-7 text-sm font-semibold *:cursor-pointer">
        {{-- heart --}}
        <a href="{{ route('rants.like', $rant->id) }}"
            class="text-gray-600 hover:text-red-500 
          @if ($rant->isLikedByAuthUser()) text-red-500 @endif">
            @if ($rant->isLikedByAuthUser())
                <i class="fa-solid fa-heart"></i>
            @else
                <i class="fa-regular fa-heart"></i>
            @endif
            {{ $rant->likes->count() }}
        </a>

        {{-- comment --}}
        <span><i class="fa-regular fa-comment"></i> 0</span>
    </section>
</div>
