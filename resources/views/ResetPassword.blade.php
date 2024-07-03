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


    {{-- offerBar --}}

    @include('include/offerBar')

    {{-- navBar --}}

    @include('include/navbar')

    <div class="flex flex-row mb-20 sm:mb-40"> <!-- Use "flex-row-reverse" to put the form on the left -->

        <!-- Existing content wrapped in a div for clarity -->
        <div class="flex-1">
            <div class="m-6 md:mr-[5rem]">
                <div class="text-xs text-gray-400">
                    <p>
                        <a href="/Home">
                            <span class="hover:text-gray-800 cursor-pointer">الرئيسية</span>
                        </a>
                        <span class="mx-2">></span>
                        كلمة السر
                    </p>
                </div>
                <div class="mt-12 text-sm">
                    <h3 class="text-xl font-bold">
                        نسيان كلمة السر
                    </h3>
                    <p class="mt-10">
                        اعد ضبط كلمه السر
                    </p>
                    <p class="mt-4 text-xs">
                        سنرسل لك بريدًا إلكترونيًا لإعادة تعيين كلمة المرور الخاصة بك
                    </p>
                    <form action="/SendResetPassword" method="post">
                        @csrf
                        <p class="mt-4 text-xs font-bold">
                            البريد الالكتروني
                        </p>
                        <input type="text" name="email" id="full-name" required
                            class="rounded-3xl border border-slate-400 w-full md:w-[20rem] h-[40px] mt-4 p-2">

                        @if (session('success'))
                            <p class="text-xs mt-2 text-green-400">{{ session('success') }}</p>
                        @endif
                        @if (session('error'))
                            <p class="text-xs mt-2 text-red-800">{{ session('error') }}</p>
                        @endif

                        <br>
                        <div class="flex justify-center sm:justify-start">
                            <button class="custom-color rounded-3xl text-white h-10 w-60 mt-6 hover:text-black hover:bg-inherit hover:border hover:border-black transition duration-5000">
                                ارسال
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Form to be placed on the left -->
        <div class="flex-1 mt-20 hidden sm:block">
            <h3 class="text-xl font-bold">
                انشاء حساب
            </h3>
            <p class="mt-4 text-xs">
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
