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

    <script type="text/javascript">
        // Check for the specific login error session
        var showLoginMenuOnError = @json(session()->has('loginError'))
    </script>

</head>

<body dir="rtl" class="font-tajawal"  data-cart-contents-url="{{ route('CartContents') }}">

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
                اعادة تعيين كلمة المرور
            </p>
        </div>



        @if ($err === 0)
            <div class="mt-12 text-sm">
                <h3 class="text-xl font-bold">
                    اعادة تعيين كلمة المرور
                </h3>
                <p class="mt-4">
                    أدخل كلمة مرور جديدة
                </p>

                <form action="/StoreNewPassword" method="post">
                    @csrf


                    <!-- Include the password reset token -->
                    <input type="hidden" name="token" value="{{ $token }}">

                    <p class="mt-4">
                        كلمة المرور
                        <span class="text-red-800">*</span>
                    </p>
                    <input type="password" name="password" id="password" required
                        class="rounded-3xl border border-slate-400 w-60 md:w-[20rem] h-[40px] mt-2 p-2">

                    <p class="mt-4">
                        تأكيد كلمة المرور
                        <span class="text-red-800">*</span>
                    </p>
                    <input type="password" name="password_confirmation" id="confirm-password" required
                        class="rounded-3xl border border-slate-400 w-60 md:w-[20rem] h-[40px] mt-2 p-2">

                    @if ($errors->has('password'))
                        <p class="mt-4 text-xs mr-2 text-red-800">
                            {{ $errors->first('password') }}
                        </p>
                    @endif

                    <br>
                    <button
                        class="custom-color rounded-3xl text-white h-10 w-60 mt-6 hover:text-black hover:bg-inherit hover:border hover:border-black transition duration-5000">
                        إعادة تعيين كلمة المرور
                    </button>
                </form>

            </div>
        @elseif($err === 1)
            <div class="flex items-center justify-center h-[25rem]">
                <div class="text-center">
                    <i class="fa-solid fa-triangle-exclamation text-4xl text-red-500"></i>
                    <h2 class="text-xl font-semibold mt-6 mb-8">
                        حدث خطأ غير متوقع، الرجاء المحاولة مرة أخرى .
                    </h2>
                    <a href="/ResetPassword" class="underline text-xs">
                        اضغط هنا لاعادة المحاولة
                    </a>
                </div>
            </div>
        @elseif($err === 2)
            <div class="flex items-center justify-center h-[25rem]">
                <div class="text-center">
                    <i class="fa-solid fa-hourglass text-4xl text-red-500"></i>
                    <h2 class="text-xl font-semibold mt-6">
                        لقد انتهت صلاحية رمز إعادة تعيين كلمة المرور، يرجى طلب واحد جديد .
                    </h2>
                    <a href="/ResetPassword" class="underline text-xs">
                        اضغط هنا لاعادة المحاولة
                    </a>
                </div>
            </div>
        @elseif($err === 3)
            <div class="flex items-center justify-center h-[25rem]">
                <div class="text-center">
                    <i class="fa-solid fa-triangle-exclamation text-4xl text-red-500"></i>
                    <h2 class="text-xl font-semibold mt-6">
                        لا يوجد اي مستخدم بهدا البريد الالكتروني
                    </h2>
                    <a href="/ResetPassword" class="underline text-xs">
                        اضغط هنا لاعادة المحاولة
                    </a>
                </div>
            </div>
        @endif


    </div>


    {{-- footer --}}

    @include('include.footer')
</body>

</html>
