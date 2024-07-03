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

<body dir="rtl" class="font-tajawal bg-[#ededed]" data-cart-contents-url="{{ route('CartContents') }}">

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

    <div class="lg:p-10 p-5">

        <div class="text-xs text-gray-400">
            <p>
                <a href="/Home">
                    <span class="hover:text-gray-800 cursor-pointer">الرئيسية</span>
                </a>
                <span class="mx-2">></span>
                الطلبات
            </p>
        </div>



        @if ($ordersWithProducts->isEmpty())
            <div class="flex flex-col items-center justify-center min-h-[29rem]">
                <h2 class="text-center mb-8 md:text-[3rem] text-[2rem] font-bold">
                    لم تقم بأي طلبية
                </h2>
                <div class="text-center mb-8">
                    <i class="fa-solid fa-hourglass text-[7rem] text-yellow-500"></i>
                </div>
                <p class="text-center mb-8 md:text-[3rem] text-[2rem] font-bold">
                    يمكنك البدأ في الشراء من هنا
                </p>
                <a href="/Home">
                    <button
                        class="bg-[#862d42] text-white p-2 rounded transition duration-300 hover:bg-white hover:text-black border border-white hover:border-slate-300 my-3 w-[11rem] md:w-[17rem]">
                        الرئيسية
                    </button>
                </a>
            </div>
        @else
            <div class="mt-7 text-center flex flex-col gap-7">

                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold">
                        جميع طلباتك
                    </h3>
                </div>

                @foreach ($ordersWithProducts as $order)
                    <div class="w-full flex justify-between items-center mb-4 sm:mx-6">
                        <h2 class="text-right sm:mx-2 font-bold text-[#862d42]">
                            الطلبية رقم : {{ $loop->iteration }}
                        </h2>
                        
                    </div>
                    <div class="w-full flex justify-between items-center mb-4 sm:mx-6">
                        <h2 dir="rtl" class="text-sm font-bold text-gray-500">
                            مبلغ الطلبية :
                            {{ $order->price }}
                            ريال
                        </h2>
                        <h2 dir="rtl" class="text-sm font-bold text-gray-500">
                            بتاريخ : {{ $order->created_at->format('Y-m-d') }}
                        </h2>
                    </div>
                    {{-- orders --}}

                    <div class="swiper-container-products mx-4 ">
                        <div class="swiper-wrapper">
                            <!-- Swiper Slide -->
                            @foreach ($order->products as $product)
                                <div class="swiper-slide w-60">
                                    <div
                                        class="product relative bg-white p-6 flex flex-col justify-between h-full rounded-lg gap-5">
                                        <a class="flex flex-col gap-5"
                                            href="/ProductDetails/{{ $product->title }}/{{ $product->id }}">
                                            {{-- <span
                                            class="bg-red-100 absolute px-4 py-1 rounded-lg text-red-600 top-3 right-3 font-bold">
                                            -15%
                                        </span> --}}

                                            <div class="w-full flex justify-center items-center h-56 w-60">
                                                <img src="{{ asset('Product_img/' . $product->image) }}"
                                                    class="max-w-39 max-h-52 block " alt="">
                                            </div>

                                            <p class="line-clamp-1 text-lg">{{ $product->name }}</p>

                                            <div class="font-bold">
                                                <!-- Assuming you have a discount_price field -->
                                                <span> مبلغ المنتج :</span>
                                                <span class="text-red-600">SAR {{ $product->price }}</span>
                                            </div>
                                            <div class="font-bold">
                                                <!-- Assuming you have a discount_price field -->
                                                <span>الكمية :</span>
                                                <span class="text-red-600"> {{ $product->quantity }}</span>
                                            </div>

                                            {{-- add to cart --}}
                                        </a>

                                        <span class="hidden" class="quantity-input" data-value="1"></span>

                                    </div>

                                </div>
                            @endforeach
                        </div>

                        <!-- Optional: Add Swiper Pagination and Navigation -->
                        <div class="swiper-pagination-products pt-5"></div>
                        <div class="swiper-button-next-products"></div>
                        <div class="swiper-button-prev-products"></div>

                    </div>
                @endforeach


            </div>
        @endif
    </div>

    {{-- footer --}}

    @include('include.footer')
</body>

</html>
