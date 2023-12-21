@extends('layouts.master')

@section('content')
    <form action="" method="POST" class="row">
        @csrf
        <div class="col-4">
            <p>{!! captcha_img('math') !!}</p>
            <input type="text" class="form-control" name="captcha">
        </div>
        <div class="col-12 mt-3">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
