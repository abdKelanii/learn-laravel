<x-layout :title="$title ?? 'New Idea'">
    <header>
        <h1>Share an idea</h1>
        <p>Drop a quick idea below. We’ll validate it and show you what was submitted.</p>
    </header>

    @if (session('success'))
        <section class="card" style="margin: 16px 0;">
            <p style="margin: 0;"><strong>{{ session('success') }}</strong></p>
            @if (session('idea_submitted'))
                <p class="hint" style="margin: 10px 0 0;">Submitted:</p>
                <p style="margin: 6px 0 0;">“{{ session('idea_submitted') }}”</p>
            @endif
        </section>
    @endif

    <section class="card" aria-labelledby="idea-form-title">
        <h2 id="idea-form-title" style="margin: 0 0 12px; font-size: 18px;">New idea</h2>

        <form method="POST" action="{{ route('ideas.store') }}">
            @csrf

            <div style="margin-bottom: 12px;">
                <label for="idea">Idea</label>
                <textarea id="idea" name="idea" placeholder="e.g. Add an Ideas page where people can submit suggestions...">{{ old('idea') }}</textarea>

                @error('idea')
                    <p class="hint" style="margin: 8px 0 0; color: color-mix(in srgb, red 70%, currentColor);">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="actions">
                <button type="submit">Submit idea</button>
                <span class="hint">Required. 3–500 characters.</span>
            </div>
        </form>
    </section>
</x-layout>

