<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>My Payment Flow</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- link to the Square web payment SDK library -->
    <script type="text/javascript" src="{{ $js_cdn }}"></script>
    <script type="text/javascript">
        window.applicationId = '{{ $square_app_id }}'
        window.locationId = '{{ $square_location_id }}'
        window.currency = '{{ $currency }}'
        window.country = '{{ $country }}'
        window.idempotencyKey = '{{ $uuid4 }}'
    </script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/square/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/square/sq-payment.css') }}">
</head>

<body>
    <h4 style="text-align:center;margin-top:2rem;">Payment ¥150</h4>
    <form class="payment-form" id="fast-checkout">
        <div class="wrapper">
            <div id="apple-pay-button" alt="apple-pay" type="button"></div>
            <div id="google-pay-button" alt="google-pay" type="button"></div>
            <div id="ach-wrapper">
                <label for="ach-account-holder-name">Full Name</label>
                <input id="ach-account-holder-name" type="text" placeholder="Jane Doe" name="ach-account-holder-name"
                    autocomplete="name" /><span id="ach-message"></span><button id="ach-button" type="button">Pay with
                    Bank Account</button>

            </div>
            <div id="card-container"></div><button id="card-button" type="button">Pay with Card</button>
            <span id="payment-flow-message"></span>
        </div>
    </form>

    <script type="text/javascript" src="{{ asset('assets/front/js/square/sq-card-pay.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/js/square/sq-payment-flow.js') }}"></script>
</body>

</html>
