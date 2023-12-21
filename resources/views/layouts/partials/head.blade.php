<base href="{{ url('/') }}" data-domain="{{ url('/') }}">
<meta charset="utf-8" />
<meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Laravel 10 Testing</title>
<meta name="description" content="" />
<link rel="icon" type="image/x-icon" href="{{ asset('assets/front/img/favicon/favicon.ico') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/front/vendor/fonts/boxicons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/front/vendor/css/core.css') }}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('assets/front/vendor/css/theme-default.css') }}"
    class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/front/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/front/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/front/css/demo.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/front/css/customize.css') }}" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script src="{{ asset('assets/front/vendor/js/helpers.js') }}"></script>
<script src="{{ asset('assets/front/js/config.js') }}"></script>
