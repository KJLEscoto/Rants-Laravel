@props(['label', 'leftIcon' => '', 'rightIcon' => '', 'bg' => 'bg-black'])

<div>
    {{-- button (label) --}}
    <button type="submit"
        class="{{ $bg }} select-none text-center px-8 py-2 hover:opacity-75 rounded text-white space-x-2">
        <span>
            @if ($leftIcon)
                <i class="{{ $leftIcon }}"></i>
            @endif
        </span>
        <span>{{ $label }}</span>
        <span>
            @if ($rightIcon)
                <i class="{{ $rightIcon }}"></i>
            @endif
        </span>
    </button>
</div>
