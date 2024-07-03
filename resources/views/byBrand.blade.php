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

    </style>

</head>

<body dir="rtl" class="font-tajawal" data-cart-contents-url="{{ route('CartContents') }}">
    {{-- offerBar --}}

    @include('include/offerBar')

    {{-- navBar --}}

    @include('include/navbar')

    {{-- product details --}}

    <div class=" bg-[#ededed] pb-10">
        <div class="flex gap-2 flex-wrap items-center text-sm text-gray-400 p-6">

            <a href="/Home"
                class=" w-[fit-content] px-1 hover:text-gray-800 lg:text-right hover:underline text-center cursor-pointer cursor-pointer lg:h-auto h-full">
                الصفحة الرئيسية
            </a>

            <span>></span>

            <span class="text-gray-800 lg:text-right text-center">
                {{ $title }}
            </span>

        </div>
        




         {{--<div class="lg:flex  justify-between items-center ml-[1rem]">

                <p class="flex items-center">
                    ترتيب حسب
                    <select id="sort_by" class="border border-gray-400 rounded mr-4 px-3 py-2 cursor-pointer">
                        <option value="" class=" text-center p-4 cursor-pointer">
                            اختر ما تريد
                        </option>

                        <option value="best_selling" class="text-center p-4 cursor-pointer">
                            الاكثر مبيعا
                        </option>

                        <option value="alpha_asc" class="text-center p-4 cursor-pointer">
                            أبجديًا، أ - ي
                        </option>

                        <option value="price_desc" class="text-center p-4 cursor-pointer">
                            السعر من الاعلى للادنى
                        </option>

                        <option value="price_asc" class="text-center p-4 cursor-pointer">
                            السعر من الارخص للاعلى
                        </option>

                        <option value="date_asc" class="text-center p-4 cursor-pointer">
                            التاريخ، من القديم إلى الجديد
                        </option>

                        <option value="date_desc" class="text-center p-4 cursor-pointer">
                            التاريخ، من الجديد إلى القديم
                        </option>
                    </select>
                </p>
            </div>
            <div id="loading-spinner" class="hidden fixed inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center z-50">

        <div class="loader"></div>
    </div> --}}
    <script>
        document.getElementById('sort_by').addEventListener('change', function() {
            // Show the loading spinner
            document.getElementById('loading-spinner').classList.remove('hidden');
            
            // Simulate fetching data (replace this with your actual data fetching logic)
            setTimeout(function() {
                // Hide the loading spinner
                document.getElementById('loading-spinner').classList.add('hidden');
                
                // Update the page with new offers (this part will be your actual logic)
                console.log('Offers have been loaded');
            }, 3000); // Simulated delay of 3 seconds
        });
    </script>




        {{-- products --}}

        <div class="flex flex-col gap-10 w-full ">

<div class="flex flex-col gap-5">
    <div
        class="products ProductSort flex lg:justify-start justify-center  flex-wrap w-full lg:gap-5 gap-[0.5rem]  rounded lg:text-md text-sm">

        @if ($products->isEmpty())
            <div
                class="bg-white text-[#999] flex flex-col lg:gap-10 gap-6 justify-center items-center w-full h-[310px] text-center rounded">
                <i class="fa-solid fa-bag-shopping fa-solid fa-bag-shopping lg:text-8xl text-6xl"></i>

                <span class="lg:text-2xl text-lg">عذرا لايوجد منتجات في هذا التصنيف ...</span>
            </div>
        @else
            @foreach ($products as $product)
                <div class="product lg:w-[250px] w-[48%]">
                    <div
                        class="product relative w-full h-full bg-white py-6 lg:py-3 px-3  flex flex-col justify-center gap-5 rounded">
                        <a href="/ProductDetails/{{ $product->title }}/{{ $product->id }}"
                            loading="lazy">
                            
                            <div
                                class="w-[150px] h-[150px] flex justify-center items-center sm:mr-[1.5rem] mt-10">
                                @if (strpos($product->image, 'https://') !== false)
                                <img src="{{$product->image }}"
                                    alt="Product Image"
                                    class="max-h-[150px] max-w-[150px] object-contain">
                                @else
                                <img src="{{ asset('Product_img/' . $product->image) }}"
                                    alt="Product Image"
                                    class="max-h-[150px] max-w-[150px] object-contain">
                                @endif
                            </div>

                            <!-- Right aligned title -->
                            <p
                                class="text-right lg:h-auto w-full mt-6 overflow-hidden overflow-ellipsis whitespace-nowrap">
                                {{ $product->title }}
                            </p>

                            <div class="font-bold flex gap-2 justify-center mt-4">
                                <span class="text-red-600" dir="ltr">
                                    {{ $product->price }}
                                    SAR
                                </span>
                                
                            </div>

                            <div class="flex gap-2 justify-center">

                            </div>
                        </a>

                        <button
                            class="addToCartButton w-full border border-black rounded-full py-2 px-4 font-bold hover:bg-black hover:text-white hover:border-white"
                            data-product-id="{{ $product->id }}">
                            أضف للسلة
                        </button>
                    </div>
                </div>
            @endforeach
        @endif

    </div>


    {{ $products->links() }}

</div>

</div>
    </div>

    {{-- footer --}}

    @include('include/footer')

</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const increaseButtons = document.querySelectorAll('.quantity-increase');
        const decreaseButtons = document.querySelectorAll('.quantity-decrease');

        increaseButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Use the updated function name here
                const quantitySelector = this.dataset.quantitySelector;
                adjustItemQuantity(document.querySelector(quantitySelector), 1);
            });
        });

        decreaseButtons.forEach(button => {
            button.addEventListener('click', function() {
                const quantitySelector = this.dataset.quantitySelector;
                adjustItemQuantity(document.querySelector(quantitySelector), -1);
            });
        });
    });

    // Updated function name
    function adjustItemQuantity(quantityElement, delta) {
        let quantity = parseInt(quantityElement.dataset.value) + delta;
        quantity = quantity < 1 ? 1 : quantity; // Ensure quantity doesn't go below 1
        quantityElement.dataset.value = quantity; // Update the data-value attribute
        quantityElement.innerText = quantity; // Update the displayed text
    }
</script>
