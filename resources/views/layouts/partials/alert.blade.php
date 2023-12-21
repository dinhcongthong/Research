<div class="main-alert @if (Session::has('success') || Session::has('error') || Session::has('warning') || (isset($errors) && $errors->any())) mb-2 @else d-none @endif">
    @if (Session::has('success'))
        <div class="alert alert-primary">
            <p class="m-0">{!! session('success') !!}</p>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            <p class="m-0">{!! session('error') !!}</p>
        </div>
    @endif
    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger">
            <p class="m-0">{{ $errors->first() }}</p>
        </div>
    @endif
    @if (Session::has('warning'))
        <div class="alert alert-warning">
            <p class="m-0">{!! session('warning') !!}</p>
        </div>
    @endif
</div>
