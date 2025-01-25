@props([
'name'
])

<span>

  {{-- display error from validation (name) --}}
  @error($name)
  <p class="text-red-500 font-semibold tracking-wider text-sm select-none">{{ $message }}</p>
  @enderror
</span>