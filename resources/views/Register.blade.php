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

    <script type="text/javascript">
        // Check for the specific login error session
        var showLoginMenuOnError = @json(session()->has('loginError'))
    </script>

</head>

<body dir="rtl"  class="font-tajawal"  data-cart-contents-url="{{ route('CartContents') }}" >

    @if (session()->has('success'))
        <script>
            Swal.fire(
                'Success',
                '{{ session('success') }}',
                'success'
            )
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            Swal.fire(
                'Error',
                '{{ session('error') }}',
                'error'
            )
        </script>
    @endif


    {{-- offerBar --}}

    @include('include/offerBar')

    {{-- navBar --}}

    @include('include/navbar')

    <div class="m-6 md:mr-[5rem] mb-[7rem]">

        <div class="text-xs text-gray-400">
            <p>
                <a href="/Home">
                    <span class="hover:text-gray-800 cursor-pointer">الرئيسية</span>
                </a>
                <span class="mx-2">></span>
                انشاء حساب
            </p>
        </div>

        <div class="mt-12 text-sm">
            <h3 class="text-xl font-bold">
                انشاء حساب
            </h3>
            <p class="mt-4">
                الرجاء التسجيل أدناه لإنشاء حساب
            </p>

            <form action="/StoreUser" method="post">

                @csrf
                <p class="mt-4">
                    الاسم الاول
                </p>
                <input type="text" name="fullName" id="full-name" required
                    class="rounded-3xl border border-slate-400 w-60 md:w-[20rem] h-[40px] mt-2 p-2">
                
                <p class="mt-4">
                    البريد الالكتروني
                    <span class="text-red-800">*</span>
                </p>
                <input type="text" name="email" id="email" required
                    class="rounded-3xl border border-slate-400 w-60 md:w-[20rem] h-[40px] mt-2 p-2">
                <p class="mt-4">
                    كلمة المرور
                    <span class="text-red-800">*</span>
                </p>
                <input type="password" name="password" id="password" required
                    class="rounded-3xl border border-slate-400 w-60 md:w-[20rem] h-[40px] mt-2 p-2">
                <br>
                <button
                    class="custom-color rounded-3xl text-white h-10 w-60 mt-6 hover:text-black hover:bg-inherit hover:border hover:border-black transition duration-5000">
                    انشاء حساب
                </button>

            </form>


        </div>
    </div>


    {{-- footer --}}

    @include('include.footer')
</body>

</html>
