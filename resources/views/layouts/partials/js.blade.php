<script src="{{ asset('assets/front/vendor/libs/jquery/jquery.js') }}"></script>
<script>
var rootLoader = $('.main-loader');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
const APP_URL = $('base').attr('href');
</script>
<script src="{{ asset('assets/front/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/front/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/front/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/front/vendor/js/menu.js') }}"></script>
<script src="{{ asset('assets/front/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/front/js/dashboards-analytics.js') }}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{ asset('assets/front/js/main.js') }}"></script>
<script src="{{ asset('assets/front/js/master.js') }}"></script>
<script src="{{ asset('assets/common/js/common.js') }}"></script>
