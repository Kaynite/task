@if (session()->has('success') || session()->has('error'))
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>
@endif

@if (session()->has('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@elseif (session()->has('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
@endif
