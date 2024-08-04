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
.modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: white;
            scrollbar-width: none;
        }

        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #862d42;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        .zoom-controls {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 2; /* Ensure zoom controls are above the image */
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .zoom-btn {
            background: transparent;
            border: none;
            color: #862d42;
            font-size: 30px;
            cursor: pointer;
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            transition: transform 0.25s ease;
        }

        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        .fa-whatsapp,
        .fa-bars {
            display: none;
        }

        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
                height: 100%;
            }
        }
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
        span.font-bold.text-xl-1 {
            color: #E91E63;
            font-size: 19px !important;
        }
        .text-right {
           text-align: right;
           /* width: 25rem; */
  /* display: none; */
  overflow: hidden !important;
  white-space: normal !important;
  display: -webkit-box !important;
  -webkit-line-clamp: var(--product-title-line-text) !important;
  text-overflow: ellipsis !important;
  -webkit-box-orient: vertical !important;
  text-align: center !important;
}
.line-clamp-1 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2 !important;
    overflow: hidden !important;
  white-space: normal !important; 
  text-overflow: ellipsis !important;
  text-align: center !important;
 
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


        <div id="imageModal" class="modal">
    <span class="close">&times;</span>
 <!--   <div class="zoom-controls">
        <button id="zoomIn" class="zoom-btn"><i class="fa fa-plus"></i></button>
        <button id="zoomOut" class="zoom-btn"><i class="fa fa-minus"></i></button>
    </div> -->
    <img class="modal-content" id="modalImg">
    <div id="caption"></div>
</div>





        <div class="product flex flex-col gap-10 bg-[#ededed]">

            <div class="flex lg:flex-row flex-col bg-[#ededed]">
                {{-- product image --}}

                <div class="flex lg:flex-row flex-col w-full bg-white">
                    <div
                        class="w-full flex lg:flex-row flex-col lg:justify-center justify-start lg:items-start items-center gap-3">
                        <div class="flex justify-center items-center w-[380px] h-[380px]">
    @if (strpos($products->image, 'https://') !== false)
        <img src="{{ $products->image }}?{{ time() }}" id="bigProductImg" class="max-w-[300px] h-[300px] cursor-pointer" alt="{{ $products->name }}">
    @else
        <img src="{{ asset('Product_img/' . $products->image) }}?{{ time() }}" id="bigProductImg" class="max-w-[300px] h-[300px] cursor-pointer" alt="{{ $products->name }}">
    @endif
</div>

                    </div>
                </div>

                {{-- product info --}}

                <div class=" w-full p-10 lg:pt-10 pt-0 flex flex-col gap-7 bg-white">

                    <div class="flex flex-col gap-6">
                        <h1 class="font-bold lg:text-2xl text-lg">
                            {{ $products->title }}
                        </h1>

                        {{-- حالة المنتج --}}

                        <div class="flex gap-4">
                            <span class="font-[500]">حالة المنتج :</span>
                            <span>متوفر</span>
                        </div>

                        <div class="flex gap-4">
                            <span class="font-[500]">الكمية :</span>
                            <span>
                                {{ $products->quantity }}
                            </span>
                        </div>

                        {{-- price --}}

                        <div class="flex gap-4">
                            <span class="font-[500]">السعر :</span>
                            <span class="font-bold text-xl-1" dir="ltr">
                                {{ $products->price }}
                                SAR
                            </span>
                        </div>

                    </div>


                    {{-- quantity and cart --}}

                    <div class="flex flex-col gap-6">
                        {{-- الكمية --}}
                        <div class="flex gap-4 items-center">
                            <span class="font-bold">الكمية التي تريد :</span>
                            <div
                                class="border border-[#999] py-2 px-4 w-[fit-content] rounded-full text-xl flex gap-8 items-center">
                                <i class="fa-solid fa-plus cursor-pointer quantity-increase"
                                    data-quantity-selector="#uniqueQuantity1"></i>
                                <span id="uniqueQuantity1" class="quantity-input" data-value="1">1</span>
                                <i class="fa-solid fa-minus cursor-pointer quantity-decrease"
                                    data-quantity-selector="#uniqueQuantity1"></i>
                            </div>
                        </div>


                        {{-- أضف للسلة --}}
                        <div class="w-full flex gap-6 items-center">
                            <button data-product-id="{{ $products->id }}"
                                class="addToCartButton py-3 text-center bg-[#862d42] hover:bg-transparent hover:text-black border hover:border-[#999] border-[#fff] text-white font-bold rounded-full w-[80%] transition-all duration-200">أضف
                                للسلة</button>
                            <i
                                class="fa-regular fa-heart text-3xl cursor-pointer hover:scale-110 transition-all duration-200"></i>
                            <i
                                class="fa-solid w-[8%] fa-share-nodes self-center text-3xl cursor-pointer hover:scale-110 transition-all duration-200"></i>
                        </div>
                    </div>

                </div>
            </div>

            {{-- product description --}}

            <div class="bg-white p-10 flex flex-col gap-6">
                <h1 class="font-bold lg:text-2xl text-lg"> {{ $products->title }} :</h1>

                <p class=" w-full text-justify">
                    {{ $products->description }}
                </p>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("imageModal");
    var img = document.getElementById("bigProductImg");
    var modalImg = document.getElementById("modalImg");
    var captionText = document.getElementById("caption");
    var span = document.getElementsByClassName("close")[0];
    var zoomInBtn = document.getElementById("zoomIn");
    var zoomOutBtn = document.getElementById("zoomOut");

    img.onclick = function() {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    span.onclick = function() {
        modal.style.display = "none";
        modalImg.style.transform = "scale(0.7)";
    }

    var scale = 1;
    zoomInBtn.onclick = function() {
        scale += 0.1;
        modalImg.style.transform = "scale(" + scale + ")";
    }

    zoomOutBtn.onclick = function() {
        scale = Math.max(0.1, scale - 0.1);
        modalImg.style.transform = "scale(" + scale + ")";
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const productDescription = document.getElementById('productDescription');
    if (productDescription.scrollHeight > productDescription.clientHeight) {
        productDescription.scrollTop = productDescription.scrollHeight;
    }
});
</script>
