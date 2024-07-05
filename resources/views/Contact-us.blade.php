<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('/img/log.png') }}">
    <title>Gheom - غيوم</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        // Check for the specific login error session
        var showLoginMenuOnError = @json(session()->has('loginError'))
    </script>
    <style>
body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: right;
            color: #333;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #666;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 30px;
            font-size: 1rem;
        }

        textarea {
            height: 150px;
            resize: vertical;
            padding: 1rem !important;
        }

        .form-group-required label::after {
            content: ' *';
            color: red;
        }

        .submit-button {
            display: inline-block;
            padding: 1rem 2rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 30px;
            font-size: 1rem;
            cursor: pointer;
            text-align: center;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }
        .main-page-title{
font-size: x-large;
 } 


    </style>

</head>

<body dir="rtl" class="font-tajawal" data-cart-contents-url="{{ route('CartContents') }}">
    {{-- offerBar --}}

    @include('include/offerBar')

    {{-- navBar --}}

    @include('include/navbar')

    {{-- product details --}}

   





    <div class="container">
    <h1 class="main-page-title page-header">
        اتصل بنا
    </h1>
    <br>
    <p>هل لديك سؤال أو تعليق؟<br>استخدم النموذج أدناه لإرسال رسالة لنا</p>
    <br>
    <hr class="lg:hidden block h-[3px] bg-[#a8a7a7]">
    <br>
    <form  action="https://formcarry.com/s/FfMtW4bqqDt"
  method="POST"
  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">رقم الجوال</label>
            <input type="text" id="phone" name="phone" class="form-control">
        </div>
        <div class="form-group form-group-required">
            <label for="email">البريد الإلكتروني</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group form-group-required">
            <label for="subject">الموضوع</label>
            <textarea id="subject" name="subject" class="form-control" required></textarea>
        </div>
        <div>
            <button type="submit" class="submit-button">إرسال</button>
        </div>
    </form>
</div>





</section>
                </main>





    {{-- footer --}}

    @include('include/footer')

</body>

</html>


