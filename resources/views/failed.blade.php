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
        /* Loading Spinner CSS */
        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Utility class to hide elements */
        .hidden {
            display: none;
        }

        /* Example styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .flex {
            display: flex;
        }

        .justify-between {
            justify-content: space-between;
        }

        .items-center {
            align-items: center;
        }

        .ml-[1rem] {
            margin-left: 1rem;
        }

        .border {
            border-width: 1px;
        }

        .border-gray-400 {
            border-color: #d1d5db;
        }

        .rounded {
            border-radius: 0.25rem;
        }

        .mr-4 {
            margin-right: 1rem;
        }

        .px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .fixed {
            position: fixed;
        }

        .inset-0 {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }

        .bg-gray-500 {
            background-color: #6b7280;
        }

        .bg-opacity-50 {
            background-opacity: 0.5;
        }

        .z-50 {
            z-index: 50;
        }
        .text-red-600{
            font-size: 20px !important;
        }
        .text-right {
           text-align: right;
           /* width: 25rem; */
  /* display: none; */
  overflow: hidden !important;
  white-space: normal !important;
  display: -webkit-box !important;
  -webkit-line-clamp: 2 !important;
  text-overflow: ellipsis !important;
  -webkit-box-orient: vertical !important;
  text-align: center !important;
  overflow: hidden;
 } 
 .main-page-title{
font-size: x-large;
 } 

.page-width{
    background: #f8f8f8;
    padding: 0 20px 80px;
    line-height: 32px;
}
@media (max-width: 551px) {
    .page-header {
        padding: 10px 0 15px;
    }
}

    </style>

</head>

<body dir="rtl" class="font-tajawal" data-cart-contents-url="{{ route('CartContents') }}">
    {{-- offerBar --}}

    @include('include/offerBar')

    {{-- navBar --}}

    @include('include/navbar')

    {{-- product details --}}

   





    <div class="flex flex-col items-center justify-center min-h-[40rem]">
            <h2 class="text-center mb-4 md:text-[3rem] text-[2rem] font-bold">
            حدث خطا ما
            </h2>
            <div class="text-center mb-4">
                <i class="fa-solid fa-circle-xmark text-[7rem] text-red-500"></i>
            </div>
            <p class="text-center mb-4 md:text-[3rem] text-[2rem] font-bold">
            المرجو اعاده المحاوله
            </p>
            <a href="/Home">
                <button
                    class="bg-[#862d42] text-white p-2 rounded transition duration-300 hover:bg-white hover:text-black border border-white hover:border-slate-300 my-3 w-[11rem] md:w-[17rem]">
                    الرئيسية
                </button>
            </a>
        </div>





</section>
                </main>





    {{-- footer --}}

    @include('include/footer')

</body>
<script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true,
            })

            Toast.fire({
                icon: 'error',
                title: '{{ session('StoreOrder') }}',
            })
        </script>

</html>


