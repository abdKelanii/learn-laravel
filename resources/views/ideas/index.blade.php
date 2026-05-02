<x-layout :title="$title ?? 'Ideas'">
    <header>
        <h1>Ideas</h1>
        <p>Browse and manage ideas. <a href="{{ route('ideas.create') }}">Create a new one</a>.</p>
    </header>

    @if (session('success'))
        <section class="card" style="margin: 16px 0;">
            <p style="margin: 0;"><strong>{{ session('success') }}</strong></p>
        </section>
    @endif

    @if ($ideas->isEmpty())
        <section class="card" aria-live="polite">
            <p style="margin: 0;">No ideas yet. <a href="{{ route('ideas.create') }}">Share the first idea</a>.</p>
        </section>
    @else
        <ul class="card" style="list-style: none; margin: 16px 0 0; padding: 0;">
            @foreach ($ideas as $idea)
                <li style="padding: 12px 0; border-bottom: 1px solid color-mix(in srgb, currentColor 12%, transparent);">
                    <a href="{{ route('ideas.show', $idea) }}" style="color: inherit; text-decoration: none;">
                        <strong>{{ $idea->title }}</strong>
                    </a>
                    <p class="hint" style="margin: 6px 0 0;">
                        {{ \Illuminate\Support\Str::limit(strip_tags($idea->body), 140) }}
                    </p>
                    <p class="hint" style="margin: 6px 0 0;">
                        Updated {{ $idea->updated_at->diffForHumans() }}
                    </p>
                </li>
            @endforeach
        </ul>

        <div style="margin-top: 20px;">
            {{ $ideas->links('vendor.pagination.simple-bootstrap-5') }}
        </div>
    @endif
</x-layout>
