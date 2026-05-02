<x-layout :title="$title ?? 'New idea'">
    <header>
        <h1>Share an idea</h1>
        <p>Add a title and description. You can edit or delete it later.</p>
    </header>

    @if (session('success'))
        <section class="card" style="margin: 16px 0;">
            <p style="margin: 0;"><strong>{{ session('success') }}</strong></p>
        </section>
    @endif

    <section class="card" aria-labelledby="idea-form-title">
        <h2 id="idea-form-title" style="margin: 0 0 12px; font-size: 18px;">New idea</h2>

        <form method="POST" action="{{ route('ideas.store') }}">
            @csrf

            @include('ideas._form', ['submitLabel' => 'Create idea'])
        </form>
    </section>
</x-layout>
