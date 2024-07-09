<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('/img/log.png') }}">
    <title>Gheom - غيوم</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
    <script src="{{ asset('js/CheckOut.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script type="text/javascript">
        // Check for the specific login error session
        var showLoginMenuOnError = @json(session()->has('loginError'))
    </script>

    <!-- moyasar -->
    <script src="https://cdn.moyasar.com/mpf/1.14.0/moyasar.js"></script>
    <link rel='stylesheet' href='https://cdn.moyasar.com/mpf/1.14.0/moyasar.css'>
</head>

<body dir="rtl" class="font-tajawal" data-cart-contents-url="{{ route('CartContents') }}">


{{-- offerBar --}}
@include('include/offerBar')

{{-- navBar --}}
@include('include/navbar')

<div class="mysr-form"></div>
<script>
    const total = '{{!empty($checkout) ? $checkout['price'] * 100 : '0.00'}}';

    Moyasar.init({
        element: '.mysr-form',
        amount: total,
        currency: 'SAR',
        description: 'Order #{{!empty($checkout) ? $checkout['id'] : '0'}}',
        publishable_api_key: 'pk_test_UCqGb4ctpfVARUKK2Tp8J26nTMAihwfm7dce8ezf',
        callback_url: '{{ route('payment.callback', ['order_id' => !empty($checkout) ? $checkout['id'] : '0']) }}',
        methods: ['creditcard']
    });
</script>

{{-- footer --}}
@include('include.footer')
</body>
</html>

