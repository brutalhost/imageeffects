<script>
    document.body.addEventListener("htmx:configRequest", (event) => {
        event.detail.headers["X-CSRF-TOKEN"] = '{{ csrf_token() }}';
    });
</script>
</body>
</html>
