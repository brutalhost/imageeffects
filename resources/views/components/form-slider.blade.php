@php
    $name = $name ?? '';
    $value = $value ?? 0;
@endphp

<div class="mb-2">
    <label class="form-label" for="{{ $name }}">{{ $slot ?? '' }}</label>
    <input
        type="range"
        class="form-range"
        id="{{ $name }}"
        name="{{ $name }}"
        min="{{ $min ?? -100 }}"
        max="{{ $max ?? 100 }}"
        value="{{ $value }}"
    >

    @error($name)
    <x-error-message id="{{$name}}_error">
        {{ $message }}
    </x-error-message>
    @enderror($name)
</div>
