<x-layout title="Contact">
    <header>
        <h1>Contact</h1>
        <p>Have a question or feedback? Send a quick message below or reach me using the details on the right.</p>
    </header>

    <main class="grid">
        <section class="card" aria-labelledby="contact-form-title">
            <h2 id="contact-form-title" style="margin: 0 0 12px; font-size: 18px;">Message</h2>

            <form>
                <x-form.input id="name" label="Name" name="name" autocomplete="name" placeholder="Jane Doe" />

                <div style="margin-bottom: 12px;">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" placeholder="jane@example.com">
                </div>

                <div style="margin-bottom: 12px;">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="What can I help with?"></textarea>
                </div>

                <div class="actions">
                    <button type="button">Send message</button>
                    <span class="hint">This is a static page for now (no backend handler yet).</span>
                </div>
            </form>
        </section>

        <aside class="card" aria-labelledby="contact-details-title">
            <h2 id="contact-details-title" style="margin: 0 0 12px; font-size: 18px;">Details</h2>
            <p class="meta"><strong>Email:</strong> <a href="mailto:hello@example.com">hello@example.com</a></p>
            <p class="meta"><strong>Phone:</strong> +1 (555) 010-0000</p>
            <p class="meta"><strong>Hours:</strong> Mon–Fri, 9:00–17:00</p>
            <p class="hint" style="margin-top: 12px;">Tip: When you’re ready, we can wire this up to a POST route and send email using Laravel’s mailables.</p>
        </aside>
    </main>
</x-layout>
