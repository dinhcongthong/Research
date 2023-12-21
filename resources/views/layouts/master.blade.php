<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    @include('layouts.partials.head')
    @yield('css')
</head>

<body>
    <div class="main-loader" style="display: none;">
        <div class="box">
            <div class="loader"><span></span></div>
            <div class="loader"><span></span></div>
            <div class="loader"><i></i></div>
            <div class="loader"><i></i></div>
        </div>
    </div>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.partials.aside')
            <div class="layout-page">
                @include('layouts.partials.nav-top')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('breadcrumb')
                        @include('layouts.partials.alert')
                        @yield('content')
                    </div>
                    @include('layouts.partials.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    {{-- modals --}}
    <div class="modal fade" id="status_modal" tabindex="-1" role="dialog" aria-labelledby="statusTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="statusTitle">
                        Thay đổi trạng thái
                    </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn thay đổi trạng thái của item này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                    <button type="button" id="btn_ok" data-bs-dismiss="modal" class="btn btn-primary">Có</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="alert_title"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="content"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_understand" data-bs-dismiss="modal"
                        class="btn btn-default">OK</button>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.js')
    @yield('js')
</body>

</html>
