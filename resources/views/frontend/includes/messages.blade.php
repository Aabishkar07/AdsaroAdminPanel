@if (Session::has('poperror'))
    <div id="toast-error" style="z-index: 999;"  class="position-fixed bottom-0 end-0 mb-4 me-4 toast show z-50" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-danger">
            {{ Session::get('poperror') }}
        </div>
    </div>
@endif

@if (Session::has('popsuccess'))
    <div style="z-index: 999;" id="toast-success" class="position-fixed  bottom-0 end-0 mb-4 me-4 toast show z-999" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-success">
            {{ Session::get('popsuccess') }}
        </div>
    </div>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let successToast = new bootstrap.Toast(document.getElementById('toast-success'));
        let errorToast = new bootstrap.Toast(document.getElementById('toast-error'));

        if (document.getElementById('toast-success')) {
            setTimeout(() => successToast.hide(), 5000);
        }

        if (document.getElementById('toast-error')) {
            setTimeout(() => errorToast.hide(), 5000);
        }
    });
</script>

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show z-50" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('message'))
    <div class="alert alert-primary alert-dismissible fade show z-50" role="alert">
        {{ Session::get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show z-50" role="alert">
        {{ Session::get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
