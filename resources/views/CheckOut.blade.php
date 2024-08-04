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
    <style>

body {
    font-family: Arial, sans-serif;
    direction: rtl;
    text-align: right;
    background-color: #fff;
    margin: 0;
    padding: 0px;
}

.shipping-method {
    display: flex;
    align-items: center;
    background-color: #eaf6ff;
    border: 1px solid #00c2ff;
    padding: 20px;
    margin: 20px auto;
    border-radius: 5px;
    color: #333;
    font-size: 1em;
    max-width: 600px; /* Ensures it does not get too wide on large screens */
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    justify-content: space-between; /* Ensures proper spacing between elements */
}

.shipping-method input[type="radio"] {
    margin-left: 15px;
    accent-color: #00c2ff;
    width: 18px;
    height: 18px;
}

.shipping-method input[type="radio"]:checked + label {
    font-weight: bold;
}

.shipping-method label {
    display: flex;
    justify-content: space-between;
    width: 100%;
    align-items: center;
}

.method-description {
    color: #000;
    flex-grow: 1; /* Ensures the description takes up available space */
}

.price {
    color: #000;
    font-weight: bold;
    white-space: nowrap; /* Prevents line breaks in price */
}

@media (min-width: 768px) {
    .shipping-method {
        font-size: 1.2em; /* Adjusts font size for larger screens */
    }
}

/* Your existing styles */
.discount-code-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-top: 20px;
        }

        .discount-code-container input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 200px;
            text-align: center;
        }

        .discount-code-container button {
            padding: 10px 20px;
            background-color: #00c2ff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .discount-code-container button:hover {
            background-color: #008bbf;
        }

        .total-price {
            font-size: 1.5em;
            font-weight: bold;
            margin-top: 20px;
        }

    </style>

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
                            <div class="discount-code-container">
                <input type="text" name='discountcode' id="discount-code" placeholder=" أدخل رمز الخصم">
                <button type="button" id="apply-discount">تطبيق الخصم</button>
                <div id="discount-message"></div>
            </div>

                        <div class="flex gap-1">
                            <input type="checkbox" name="save" class="">
                            <span class="mr-2">احفظ هذه المعلومات للمرات القادمة</span>
                        </div>
                    </div>
                    

                    <h2 class="text-2xl font-bold">
                         طريقة الشحن
                    </h2>
                    <div class="shipping-method">
        <input type="radio" id="option1" name="shipping" checked>
        <label for="option1">
            <span class="method-description">     شحن وتوصيل من خلال صيدليه غيوم</span>
            <span class="price">SAR 0.00 <span>
        </label>
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
