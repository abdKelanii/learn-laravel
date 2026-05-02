<x-layout :title="$title ?? 'Idea'">
    <header>
        <p class="meta" style="margin: 0 0 8px;">
            <a href="{{ route('ideas.index') }}">← All ideas</a>
        </p>
        <h1 style="margin: 0 0 8px;">{{ $idea->title }}</h1>
        <p class="hint" style="margin: 0;">
            Created {{ $idea->created_at->toFormattedDateString() }}
            @if ($idea->updated_at->ne($idea->created_at))
                · Updated {{ $idea->updated_at->toFormattedDateString() }}
            @endif
        </p>
    </header>

    @if (session('success'))
        <section class="card" style="margin: 16px 0;">
            <p style="margin: 0;"><strong>{{ session('success') }}</strong></p>
        </section>
    @endif

    <section class="card" style="margin-top: 16px;">
        <div style="white-space: pre-wrap; margin: 0;">{{ $idea->body }}</div>
    </section>

    <div class="actions" style="margin-top: 20px;">
        <a href="{{ route('ideas.edit', $idea) }}" style="padding: 10px 14px; border-radius: 10px; border: 1px solid color-mix(in srgb, currentColor 20%, transparent); text-decoration: none; color: inherit; display: inline-block;">
            Edit
        </a>

        <form
            method="POST"
            action="{{ route('ideas.destroy', $idea) }}"
            style="display: inline;"
            onsubmit="return confirm('Delete this idea? This cannot be undone.');"
        >
            @csrf
            @method('DELETE')
            <button type="submit" style="border-color: color-mix(in srgb, red 35%, currentColor);">
                Delete
            </button>
        </form>
    </div>
</x-layout>
