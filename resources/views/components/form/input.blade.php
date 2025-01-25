@props(['label', 'type' => 'text', 'name_id', 'value' => ''])

<div class="flex flex-col gap-2">
  {{-- label (name or id) --}}
  <label for="{{ $name_id }}">{{ $label }}</label>

  {{-- input (type, name, id, value) --}}
  <input @class(['px-3 py-2 border rounded', 'border-red-500'=> $errors->has($name_id)])
  type="{{ $type }}"
  name="{{ $name_id }}"
  id="{{ $name_id }}"
  value="{{ old($name_id, $value) }}">

  {{-- error (name or id) --}}
  <x-form.error name="{{ $name_id }}" />
</div>