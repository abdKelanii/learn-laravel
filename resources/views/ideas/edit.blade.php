<x-layout :title="$title ?? 'Edit idea'">
    <header>
        <h1>Edit idea</h1>
        <p>Update the title or description, or <a href="{{ route('ideas.show', $idea) }}">cancel and go back</a>.</p>
    </header>

    @if (session('success'))
        <section class="card" style="margin: 16px 0;">
            <p style="margin: 0;"><strong>{{ session('success') }}</strong></p>
        </section>
    @endif

    <section class="card" aria-labelledby="idea-edit-title">
        <h2 id="idea-edit-title" style="margin: 0 0 12px; font-size: 18px;">Edit</h2>

        <form method="POST" action="{{ route('ideas.update', $idea) }}">
            @csrf
            @method('PUT')

            @include('ideas._form', ['idea' => $idea, 'submitLabel' => 'Update idea'])
        </form>
    </section>
</x-layout>
