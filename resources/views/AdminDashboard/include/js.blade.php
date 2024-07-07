<!-- plugins:js -->
<script src="{{ asset('AdminDash/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('AdminDash/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('AdminDash/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('AdminDash/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('AdminDash/js/dataTables.select.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('AdminDash/js/off-canvas.js') }}"></script>
<script src="{{ asset('AdminDash/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('AdminDash/js/template.js') }}"></script>
<script src="{{ asset('AdminDash/js/settings.js') }}"></script>
<script src="{{ asset('AdminDash/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('AdminDash/js/dashboard.js') }}"></script>
<script src="{{ asset('AdminDash/js/Chart.roundedBarCharts.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        @if(session()->has('success'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: 'success',
                title: '{{ session("success") }}',
            });
        @endif
        @if(session()->has('error'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: 'error',
                title: '{{ session("error") }}',
            });
        @endif
    });

</script>
