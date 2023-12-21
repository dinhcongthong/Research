@extends('layouts.master')

@section('content')
    <form action="" method="POST" class="row">
        @csrf
        <div class="col-4">
            <!-- Google reCaptcha -->
            <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
            <!-- End Google reCaptcha -->
            <input type="text" class="form-control" name="captcha">
        </div>
        <div class="col-12 mt-3">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection

@section('js')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
