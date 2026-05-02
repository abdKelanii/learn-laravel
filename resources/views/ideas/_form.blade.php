@php
    /** @var \App\Models\Idea|null $idea */
    $idea = $idea ?? null;
    $submitLabel = $submitLabel ?? 'Save';
@endphp

<div style="margin-bottom: 12px;">
    <label for="title">Title</label>
    <input
        id="title"
        name="title"
        type="text"
        maxlength="255"
        placeholder="Short headline for your idea"
        value="{{ old('title', $idea?->title) }}"
        required
    >

    @error('title')
        <p class="hint" style="margin: 8px 0 0; color: color-mix(in srgb, red 70%, currentColor);">
            {{ $message }}
        </p>
    @enderror
</div>

<div style="margin-bottom: 12px;">
    <label for="body">Idea</label>
    <textarea
        id="body"
        name="body"
        placeholder="Describe your idea..."
        required
    >{{ old('body', $idea?->body) }}</textarea>

    @error('body')
        <p class="hint" style="margin: 8px 0 0; color: color-mix(in srgb, red 70%, currentColor);">
            {{ $message }}
        </p>
    @enderror
</div>

<div class="actions">
    <button type="submit">{{ $submitLabel }}</button>
    <span class="hint">Title required. Idea: 3–5000 characters.</span>
</div>
