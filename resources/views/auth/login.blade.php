<x-layout title="Login">
    <div class="card">
        <h1>Login</h1>
        <p>Sign in to your account.</p>

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

        <form method="POST" action="/login">
            @csrf

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
                autocomplete="current-password"
                required
            />

            <div class="actions">
                <button type="submit">Sign in</button>
                <a href="/register" class="hint">Don't have an account? Register</a>
            </div>
        </form>
    </div>
</x-layout>
