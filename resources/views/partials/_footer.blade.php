<script>
    document.body.addEventListener("htmx:configRequest", (event) => {
        event.detail.headers["X-CSRF-TOKEN"] = '{{ csrf_token() }}';
    });
</script>
<footer class="container text-muted">
    <p>Made by {{ config('app.author', 'Andrey Orlov') }}, 2023</p>
</footer>
</body>
</html>
