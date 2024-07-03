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

</head>

<body dir="rtl" class="font-tajawal" data-cart-contents-url="{{ route('CartContents') }}">

    @if (session('StoreOrder'))
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
                icon: 'success',
                title: '{{ session('StoreOrder') }}',
            })
        </script>
    @endif




    {{-- offerBar --}}

    @include('include/offerBar')

    {{-- navBar --}}

    @include('include/navbar')


    @if (session('StoreOrder'))
        <div class="flex flex-col items-center justify-center min-h-[40rem]">
            <h2 class="text-center mb-4 md:text-[3rem] text-[2rem] font-bold">
            شكرا لك لثقتك في متجرنا
            </h2>
            <div class="text-center mb-4">
                <i class="fa-solid fa-circle-check text-[7rem] text-green-500"></i>
            </div>
            <p class="text-center mb-4 md:text-[3rem] text-[2rem] font-bold">
               يمكنك مواصلة الشراء من هنا
            </p>
            <a href="/Home">
                <button
                    class="bg-[#862d42] text-white p-2 rounded transition duration-300 hover:bg-white hover:text-black border border-white hover:border-slate-300 my-3 w-[11rem] md:w-[17rem]">
                    الرئيسية
                </button>
            </a>
        </div>
    @else
        <div class="flex flex-col">
            <p class="text-xs text-gray-400 px-10 py-4">
                <a href="/Home">
                    <span class="hover:text-gray-800 cursor-pointer">الرئيسية</span>
                </a>
                <span class="mx-2">></span>
                الدفع
            </p>


            <form action="/StoreOrder" method="post">
                @csrf
                <div class="flex flex-col md:flex-row justify-between md:gap-10 gap-7">
                    <div class="md:w-1/2 flex flex-col gap-6 lg:px-0 lg:pr-10 px-5 ">
                        <h2 class="text-2xl font-bold">الشحن</h2>
                        <select name="country" id=""
                            class="rounded border border-slate-400 w-full h-[40px] pr-2" required>
                            <option selected value="المملكة العربية السعودية">المملكة العربية السعودية</option>
                        </select>
                        <div class="flex flex-col md:flex-row w-full gap-6">
                            <div class="md:w-1/2 w-full">
                                <input type="text" name="firstname" required
                                    class="rounded border border-slate-400 w-full h-[40px] p-2"
                                    placeholder="الاسم الاول" value="{{ Auth::user()->fullName }}">
                            </div>
                            <div class="md:w-1/2 w-full">
                                <input type="text" name="secoundname" required
                                    class="rounded border border-slate-400 w-full h-[40px] p-2"
                                    placeholder="الاسم الاخير">
                            </div>
                        </div>
                        <input type="text" name="adress" required
                            class="rounded border border-slate-400 w-full h-[40px] p-2" placeholder="العنوان بالتفصيل">
                        <div class="flex flex-col md:flex-row w-full gap-6">
                            <div class="md:w-1/2 w-full">
                                <input type="text" name='city' required
                                    class="rounded border border-slate-400 w-full h-[40px] p-2" placeholder="المدينة">
                            </div>
                            
                            
                        </div>
                        <input type="text" name="phone" required
                            class="rounded border border-slate-400 w-full h-[40px] p-2" placeholder="الهاتف"
                            value="{{ Auth::user()->phone }}">

                        <div class="flex gap-1">
                            <input type="checkbox" name="save" class="">
                            <span class="mr-2">احفظ هذه المعلومات للمرات القادمة</span>
                        </div>
                    </div>
                    <div class="md:w-1/2 w-full relative lg:px-0 lg:pl-10 px-5 flex flex-col md:gap-1 gap-5">
                        <h2 class="text-2xl font-bold">
                            محتويات السلة
                        </h2>
                        <div id="cart-items" class="relative overflow-auto max-h-[45rem] min-h-[10rem]">
                            <!-- Cart items will be loaded here -->
                            <div id="cart-spinner-overlay" class="absolute inset-0 flex justify-center items-center bg-white bg-opacity-75 z-10 hidden">
                                <div class="customSpinner"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="flex justify-center">
                    <button
                        class="custom-color text-white p-2 rounded transition duration-300 hover:bg-white rounded-3xl hover:text-black border border-[#fff] hover:border-slate-300 my-3 w-[11rem] md:w-[17rem]">
                        شراء
                    </button>
                </div>

            </form>


        </div>
    @endif
    {{-- footer --}}

    @include('include.footer')
</body>

</html>
