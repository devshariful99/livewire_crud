<script>
    window.addEventListener('swal', function(e) {
        Swal.fire({
            title: e.detail.title,
            icon: e.detail.icon,
            iconColor: e.detail.iconColor,
            timer: 3000,
            toast: true,
            position: 'center',
            showConfirmButton: false,
        });
    });
</script>
