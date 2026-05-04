@props(['title' => 'Learn Laravel'])
<!DOCTYPE html>
<html lang="en" data-theme="night" class="bg-base-100 text-base-content">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root { color-scheme: dark; }
        body { font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji"; margin: 0; }
        .container { max-width: 720px; margin: 0 auto; padding: 32px 16px; }
        .nav { display: flex; gap: 12px; margin-bottom: 24px; align-items: center; }
        .nav-spacer { flex: 1; }
        .nav a { color: inherit; opacity: 0.85; text-decoration: none; border-bottom: 1px solid transparent; }
        .nav a:hover { opacity: 1; border-bottom-color: currentColor; }
        .nav a.btn { opacity: 1; border-bottom-color: transparent; padding: 8px 12px; border-radius: 10px; border: 1px solid color-mix(in srgb, currentColor 20%, transparent); background: color-mix(in srgb, currentColor 10%, transparent); }
        .nav a.btn:hover { background: color-mix(in srgb, currentColor 16%, transparent); }
        h1 { font-size: 32px; margin: 0 0 8px; }
        p { line-height: 1.6; margin: 0 0 16px; opacity: 0.9; }
        .card { border: 1px solid color-mix(in srgb, currentColor 15%, transparent); border-radius: 12px; padding: 16px; background: color-mix(in srgb, currentColor 3%, transparent); }
        .grid { display: grid; grid-template-columns: 1fr; gap: 16px; }
        @media (min-width: 720px) { .grid { grid-template-columns: 1fr 1fr; } }
        label { display: block; font-size: 14px; margin-bottom: 6px; opacity: 0.9; }
        input, textarea { width: 100%; box-sizing: border-box; padding: 10px 12px; border-radius: 10px; border: 1px solid color-mix(in srgb, currentColor 20%, transparent); background: transparent; color: inherit; }
        textarea { min-height: 120px; resize: vertical; }
        .actions { display: flex; gap: 12px; align-items: center; margin-top: 12px; flex-wrap: wrap; }
        button { padding: 10px 14px; border-radius: 10px; border: 1px solid color-mix(in srgb, currentColor 20%, transparent); background: color-mix(in srgb, currentColor 10%, transparent); color: inherit; cursor: pointer; }
        button:hover { background: color-mix(in srgb, currentColor 16%, transparent); }
        .hint { font-size: 13px; opacity: 0.75; }
        .meta { font-size: 14px; opacity: 0.9; }
        .meta a { color: inherit; }
        nav[aria-label="Pagination Navigation"] { margin-top: 8px; }
        .pagination { display: flex; gap: 8px; list-style: none; padding: 0; margin: 0; flex-wrap: wrap; align-items: center; }
        .page-item { list-style: none; margin: 0; }
        .page-link { display: inline-block; padding: 8px 12px; border-radius: 10px; border: 1px solid color-mix(in srgb, currentColor 20%, transparent); text-decoration: none; color: inherit; background: color-mix(in srgb, currentColor 5%, transparent); }
        .page-item.disabled .page-link { opacity: 0.45; cursor: not-allowed; }
        .page-item:not(.disabled) .page-link:hover { background: color-mix(in srgb, currentColor 12%, transparent); }
    </style>
</head>
<body class="min-h-screen antialiased">
    <div class="container">
        <nav class="nav" aria-label="Primary">
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="{{ route('ideas.index') }}">Ideas</a>
            <a href="/contact">Contact</a>
            <span class="nav-spacer" aria-hidden="true"></span>
            @guest
                <a class="btn" href="/login">Login</a>
                <a class="btn" href="/register">Register</a>
            @endguest
            @auth
                <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn">Logout</button>
                </form>
            @endauth
        </nav>

        <main style="view-transition-name: main-content;">
            {{ $slot }}
        </main>

        <footer style="margin-top: 48px; padding-top: 16px; border-top: 1px solid color-mix(in srgb, currentColor 12%, transparent);">
            <p class="hint" style="margin: 0; text-align: center;">&copy; {{ date('Y') }} Learn Laravel. All rights reserved.</p>
        </footer>
    </div>

</body>
</html>
