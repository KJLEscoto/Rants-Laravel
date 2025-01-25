@props(['label', 'name_id', 'value' => ''])

<div class="flex flex-col gap-2">
  {{-- label (name or id) --}}
  <label for="{{ $name_id }}">{{ $label }}</label>

  {{-- textarea (name, id, value) --}}
  <textarea name="{{ $name_id }}" id="{{ $name_id }}" @class(['px-3 py-2 border rounded
    h-40', 'border-red-500'=> $errors->has($name_id)])>{{ old($name_id, $value) }}</textarea>

  {{-- error (name or id) --}}
  <x-form.error name="{{ $name_id }}" />
</div>