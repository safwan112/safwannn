<!DOCTYPE html>
<html>
<head>
    <title>Payment Form</title>
    <!-- Moyasar Styles -->
    <link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.14.0/moyasar.css" />

    <!-- Moyasar Scripts -->
    <script src="https://cdnjs.cloudflare.com/polyfill/v3/polyfill.min.js?version=4.8.0&features=fetch"></script>
    <script src="https://cdn.moyasar.com/mpf/1.14.0/moyasar.js"></script>
</head>
<body>
    <div class="mysr-form"></div>
    <script>
        var urlParams = new URLSearchParams(window.location.search);
        var total = urlParams.get('total');


        Moyasar.init({
            element: '.mysr-form',
            amount: total,
            currency: 'SAR',
            description: 'Coffee Order #1',
            publishable_api_key: 'pk_test_AQpxBV31a29qhkhUYFYUFjhwllaDVrxSq5ydVNui',
            callback_url: '{{ route('payment.callback') }}',
            methods: ['creditcard']
        });
    </script>
    
</body>
</html>
