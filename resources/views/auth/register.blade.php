<x-layout title="Register">
    <div class="card">
        <h1>Register</h1>
        <p>Create your account.</p>

        @if ($errors->any())
            <div class="card" style="margin-bottom: 16px;">
                <p style="margin-bottom: 8px;"><strong>Please fix the following:</strong></p>
                <ul style="margin: 0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li class="hint">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf

            <x-form.input
                id="name"
                name="name"
                label="Name"
                autocomplete="name"
                placeholder="Jane Doe"
                value="{{ old('name') }}"
                required
            />

            <x-form.input
                id="email"
                name="email"
                type="email"
                label="Email"
                autocomplete="email"
                placeholder="jane@example.com"
                value="{{ old('email') }}"
                required
            />

            <x-form.input
                id="password"
                name="password"
                type="password"
                label="Password"
                autocomplete="new-password"
                required
            />

            <x-form.input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                label="Confirm password"
                autocomplete="new-password"
                required
            />

            <div class="actions">
                <button type="submit">Create account</button>
            </div>
        </form>
    </div>
</x-layout>
