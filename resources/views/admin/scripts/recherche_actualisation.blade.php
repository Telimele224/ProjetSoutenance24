<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search');

        searchInput.addEventListener('input', function () {
            if (searchInput.value === '') {
                searchInput.form.submit();
            }
        });
    });
</script>
