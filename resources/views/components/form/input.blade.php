@props([
    'id',
    'label',
    'name' => null,
    'type' => 'text',
    'autocomplete' => null,
    'placeholder' => null,
])

<div style="margin-bottom: 12px;">
    <label for="{{ $id }}">{{ $label }}</label>
    <input
        id="{{ $id }}"
        name="{{ $name ?? $id }}"
        type="{{ $type }}"
        @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        {{ $attributes }}
    >
</div>
