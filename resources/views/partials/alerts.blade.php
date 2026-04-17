@if(session('success'))
    <div class="alert alert-success alert-dismissible d-flex align-items-center fade show" role="alert">
        <i class="fa-solid fa-circle-check"></i>
        <strong class="mx-2">¡Éxito!</strong>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
        <i class="fa-solid fa-circle-xmark"></i>
        <strong class="mx-2">Error:</strong>{{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning alert-dismissible d-flex align-items-center fade show" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <strong class="mx-2">Advertencia:</strong>{{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<script>
setTimeout(function() {
    var alertElement = document.querySelector('.alert');
    if (alertElement) {
        alertElement.classList.remove('show');
        alertElement.classList.add('fade');

        setTimeout(function() {
            alertElement.remove();
        }, 500);
    }
}, 3000);
</script>