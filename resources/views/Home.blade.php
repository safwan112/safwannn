<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('/img/log.png') }}">
    <title>Gheom.shop || غيوم.شوب</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <style>
        .swiper.mySwiper:hover .custom-prev,
        .swiper.mySwiper:hover .custom-next {
            opacity: 1;
        }

        .custom-prev,
        .custom-next {
            transition: opacity 0.3s ease-in-out;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
        }

        .custom-prev {
            left: 10px;
        }

        .custom-next {
            right: 10px;
        }

        .custom-prev button,
        .custom-next button {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .line-clamp-1 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2 !important;
  white-space: normal !important;
  text-overflow: ellipsis !important;
  text-align: center !important;
  
}

    </style>



</head>

<body dir="rtl" class="font-tajawal" data-cart-contents-url="{{ route('CartContents') }}">

    @if (session()->has('success') || session('success'))
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
                title: '{{ session('success') }}',
            })
        </script>
    @endif

    {{-- offerBar --}}

    @include('include/offerBar')

    {{-- nav bar --}}

    @include('include/navbar')



    <div class="welcomeBigDivHolder  bg-[#ededed] flex flex-col gap-10">

        <!-- Swiper -->
        <div class="swiper mySwiper w-full relative">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('img/slide1.png') }}" alt="Image 1" class="w-full lg:block hidden">
                    <img src="{{ asset('img/sliderPicLgScreen1.png') }}" alt="Image 1" class="w-full lg:hidden block">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('img/slide2.png') }}" alt="Image 2" class="w-full lg:block hidden">
                    <img src="{{ asset('img/sliderPicLgScreen2.png') }}" alt="Image 2" class="w-full lg:hidden block">
                </div>
                <!-- ... additional slides ... -->
            </div>
            <div class="swiper-pagination"></div>
            <!-- Custom Navigation Buttons -->
            <div class="custom-prev opacity-0">
                <button type="button" class="bg-gray-800 text-white rounded-full p-[0.25rem] hover:bg-red-700 hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="custom-next opacity-0">
                <button type="button" class="bg-gray-800 text-white rounded-full p-[0.25rem] hover:bg-red-700 hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 010-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>


        {{-- الأقسام الأكثر مبيعا --}}
        <div class="hot_sales text-center flex flex-col gap-10  bg-white p-10">
            <h1 class="text-xl font-bold">الأقسام الأكثر مبيعا</h1>
            <div class="swiper-container-products">
                <div class="swiper-wrapper">
                    @for ($i = 1; $i <= 10; $i++)
                        <div class="module-item module-item-3 swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" style="width: 288px;">
<a href="/Product/العناية/2">
<img src="https://www.asrar-co.com/image/cache/wp/gp/Categories/P16A-302x335.webp" srcset="https://www.asrar-co.com/image/cache/wp/gp/Categories/P16A-302x335.webp 1x, https://www.asrar-co.com/image/cache/wp/gp/Categories/P16A-302x335.webp 2x" alt="العناية" width="" height="">
</a>
</div><div class="module-item module-item-4 swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3" style="width: 288px;">
<a href="/Product/الأجهزة/5">
<img src="https://www.asrar-co.com/image/cache/wp/gp/Categories/P17A-302x335.webp" srcset="https://www.asrar-co.com/image/cache/wp/gp/Categories/P17A-302x335.webp 1x, https://www.asrar-co.com/image/cache/wp/gp/Categories/P17A-302x335.webp 2x" alt="الأجهزة" width="" height="">
</a>
</div>
<div class="module-item module-item-1 swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 288px;">
<a href="/Product/العطور/1">
<img src="https://www.asrar-co.com/image/cache/wp/gp/Categories/P15A-302x335.webp" srcset="https://www.asrar-co.com/image/cache/wp/gp/Categories/P15A-302x335.webp 1x, https://www.asrar-co.com/image/cache/wp/gp/Categories/P15A-302x335.webp 2x" alt="العطور" width="" height="">
</a>
</div>
<div class="module-item module-item-2 swiper-slide swiper-slide-duplicate-next" data-swiper-slide-index="1" style="width: 288px;">
<a href="/Product/المكياج/3">
<img src="https://www.asrar-co.com/image/cache/wp/gp/Categories/P18A-302x335.webp" srcset="https://www.asrar-co.com/image/cache/wp/gp/Categories/P18A-302x335.webp 1x, https://www.asrar-co.com/image/cache/wp/gp/Categories/P18A-302x335.webp 2x" alt="المكياج" width="" height="">
</a>
</div>
<div class="module-item module-item-3 swiper-slide" data-swiper-slide-index="2" style="width: 288px;">
<a href="/Product/العناية/2">
<img src="https://www.asrar-co.com/image/cache/wp/gp/Categories/P16A-302x335.webp" srcset="https://www.asrar-co.com/image/cache/wp/gp/Categories/P16A-302x335.webp 1x, https://www.asrar-co.com/image/cache/wp/gp/Categories/P16A-302x335.webp 2x" alt="العناية" width="" height="">
</a>
</div>
<div class="module-item module-item-4 swiper-slide" data-swiper-slide-index="3" style="width: 288px;">
<a href="/Product/الأجهزة/5">
<img src="https://www.asrar-co.com/image/cache/wp/gp/Categories/P17A-302x335.webp" srcset="https://www.asrar-co.com/image/cache/wp/gp/Categories/P17A-302x335.webp 1x, https://www.asrar-co.com/image/cache/wp/gp/Categories/P17A-302x335.webp 2x" alt="الأجهزة" width="" height="">
</a>
</div>
<div class="module-item module-item-1 swiper-slide swiper-slide-duplicate swiper-slide-visible swiper-slide-active" data-swiper-slide-index="0" style="width: 288px;">
<a href="/Product/العطور/1">
<img src="https://www.asrar-co.com/image/cache/wp/gp/Categories/P15A-302x335.webp" srcset="https://www.asrar-co.com/image/cache/wp/gp/Categories/P15A-302x335.webp 1x, https://www.asrar-co.com/image/cache/wp/gp/Categories/P15A-302x335.webp 2x" alt="العطور" width="" height="">
</a>
</div><div class="module-item module-item-2 swiper-slide swiper-slide-duplicate swiper-slide-visible swiper-slide-next" data-swiper-slide-index="1" style="width: 288px;">
<a href="/Product/المكياج/3">
<img src="https://www.asrar-co.com/image/cache/wp/gp/Categories/P18A-302x335.webp" srcset="https://www.asrar-co.com/image/cache/wp/gp/Categories/P18A-302x335.webp 1x, https://www.asrar-co.com/image/cache/wp/gp/Categories/P18A-302x335.webp 2x" alt="المكياج" width="" height="">
</a>
</div><div class="module-item module-item-3 swiper-slide swiper-slide-duplicate swiper-slide-visible" data-swiper-slide-index="2" style="width: 288px;">
<a href="/Product/العناية/2">
<img src="https://www.asrar-co.com/image/cache/wp/gp/Categories/P16A-302x335.webp" srcset="https://www.asrar-co.com/image/cache/wp/gp/Categories/P16A-302x335.webp 1x, https://www.asrar-co.com/image/cache/wp/gp/Categories/P16A-302x335.webp 2x" alt="العناية" width="" height="">
</a>
</div><div class="module-item module-item-4 swiper-slide swiper-slide-duplicate swiper-slide-visible" data-swiper-slide-index="3" style="width: 288px;">
<a href="/Product/الأجهزة/5">
<img src="https://www.asrar-co.com/image/cache/wp/gp/Categories/P17A-302x335.webp" srcset="https://www.asrar-co.com/image/cache/wp/gp/Categories/P17A-302x335.webp 1x, https://www.asrar-co.com/image/cache/wp/gp/Categories/P17A-302x335.webp 2x" alt="الأجهزة" width="" height="">
</a>
</div>
                    @endfor


                </div>
                <!-- Optional: Add Swiper Pagination and Navigation -->
                <div class="swiper-button-next-products"></div>
                <div class="swiper-button-prev-products"></div>

            </div>
        </div>

        {{-- اهم العلامات التجارية --}}



        <div class="brands text-center flex flex-col gap-10">
    <h1 class="text-xl font-bold">اهم العلامات التجارية</h1>
    <div class="sectionsSlider flex justify-center md:gap-6 gap-3 px-3 lg:flex-nowrap flex-wrap">
        @php
            $brandNames = ['Garnier', 'QV', 'Nivea', 'Durex', 'Johnson\'s', 'essence', 'Dove', 'Vatika'];
        @endphp
        @foreach ($brandNames as $index => $brandName)
            <a href="{{ url('products/brand/' . urlencode($brandName)) }}" class="bg-white p-4 rounded-lg md:w-[128px] md:h-[128px] w-[110px] h-[110px] flex items-center justify-center">
                <img src="{{ asset('img/brands/top' . ($index + 1) . '.jpg') }}" class="w-32" alt="">
            </a>
        @endforeach
    </div>
</div>






        {{-- first ads section --}}
        <div class="speacehome md:mx-12">
            <div class="ads_1 brands text-center gap-10 flex lg:flex-row flex-col">
                <a href="/SubProduct/الأدوية/الفيتامينات%20والمكملات%20الغذائية/113" class="ad1 flex justify-center gap-6 px-3 rounded-lg overflow-hidden">
                    <img src="{{ asset('img/ad1.png') }}"
                        class="rounded-lg transform transition duration-500 hover-scale-102" alt="">
                </a>

                <a href="/Product/العناية/2" class="ad1 flex justify-center gap-6 px-3 rounded-lg overflow-hidden">
                    <img src="{{ asset('img/ad2.png') }}"
                        class="rounded-lg transform transition duration-500 hover-scale-102" alt="">
                </a>
            </div>

            {{-- أقوى العروض --}}

            <div class="brands text-center flex flex-col gap-10">
                <div class="flex justify-between w-full px-5 mt-4">
                    <h1 class="text-xl font-bold">أقوى العروض</h1>
                    {{-- <a href="#" class="underline">عرض الكل</a> --}}
                </div>
                <div class="swiper-container-ProductsContent mx-4">
                    <div class="swiper-wrapper">
                        <!-- Swiper Slide -->

                        @foreach ($randomProducts as $product)
                            <div class="swiper-slide swiper-product">
                                <div
                                    class="product relative bg-white p-6 flex flex-col justify-between h-full rounded-lg gap-5">
                                    <a class="flex flex-col gap-5"
                                        href="/ProductDetails/{{ $product->title }}/{{ $product->id }}">
                                        {{-- <span
                                            class="bg-red-100 absolute px-4 py-1 rounded-lg text-red-600 top-3 right-3 font-bold z-10">
                                            -15%
                                        </span> --}}

                                        <div class="w-full flex justify-center items-center h-56 w-60 relative">
                                            <div class="loader"></div>
                                            @if (strpos($product->image, 'https://') !== false)
                                                <img src="{{ $product->image }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @else
                                                <img src="{{ asset('Product_img/' . $product->image) }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @endif
                                        </div>



                                        <p class="line-clamp-1 text-lg">{{ $product->title }}</p>

                                        <div class="font-bold" dir="ltr">
                                            <!-- Assuming you have a discount_price field -->
                                            <span class="text-red-600 price"> {{ $product->price }} SAR</span>


                                        </div>

                                        {{-- add to cart --}}
                                    </a>
                                    <button
                                        class="addToCartButton w-full border border-black rounded-full py-2 px-4 font-bold hover:bg-[#862d42] hover:text-white hover:border-white"
                                        data-product-id="{{ $product->id }}">
                                        أضف للسلة
                                        <span class="customSpinner hidden"></span>
                                    </button>


                                    <span class="hidden" class="quantity-input" data-value="1"></span>

                                </div>

                            </div>
                        @endforeach

                    </div>
                    <!-- Optional: Add Swiper Pagination and Navigation -->
                    <div class="swiper-pagination-ProductsContent pt-5"></div>
                    <div class="swiper-button-next-ProductsContent"></div>
                    <div class="swiper-button-prev-ProductsContent"></div>
                </div>
            </div>

            {{-- second ads section --}}


            <div class="ads_2 text-center lg:gap-3 gap-6 flex lg:flex-row flex-col gap-10 mt-4">

                <a href="/Product/العناية/2" class=" flex justify-center gap-6 px-3 rounded-lg">
                    <img src="{{ asset('img/ad3.png') }}"
                        class="rounded-lg  transform transition duration-500 hover-scale-102" alt=""
                        srcset="">
                </a>

                <a href="/SubProduct/العناية/بشرة%20الطفل/49" class=" flex justify-center gap-6 px-3 rounded-lg">
                    <img src="{{ asset('img/ad4.png') }}"
                        class="rounded-lg  transform transition duration-500 hover-scale-102" alt=""
                        srcset="">
                </a>

                <a href="/SubProduct/العناية/العناية%20بالطفل/48" class="flex justify-center gap-6 px-3 rounded-lg">
                    <img src="{{ asset('img/ad5.png') }}"
                        class="rounded-lg  transform transition duration-500 hover-scale-102" alt=""
                        srcset="">
                </a>
            </div>

            {{-- افضل منتجات العناية بالبشرة --}}

            <div class="brands text-center flex flex-col gap-10">
                <div class="flex justify-between w-full px-5 mt-4">
                <h1 class="text-xl font-bold max-sm:w-3/4 line-clamp-1 text-start">{{ $firstCategory->name }}</h1>
                {{-- You can use the category name dynamically here --}}
                    <a href="/Product/{{ $firstCategory->name }}/{{ $firstCategory->id }}" class="max-sm:w-1/4"
                        style="display: inline-block; border-bottom: 1px solid;">عرض الكل</a>
                </div>
                <div class="swiper-container-ProductsContent mx-4">
                    <div class="swiper-wrapper">
                        <!-- Swiper Slide -->

                        @foreach ($firstCategory->products as $product)
                            <div class="swiper-slide swiper-product">
                                <div
                                    class="product relative bg-white p-6 flex flex-col justify-between h-full rounded-lg gap-5">
                                    <a class="flex flex-col gap-5"
                                        href="/ProductDetails/{{ $product->title }}/{{ $product->id }}">


                                        <div class="w-full flex justify-center items-center h-56 w-60 relative">
                                            <div class="loader"></div>
                                            @if (strpos($product->image, 'https://') !== false)
                                                <img src="{{ $product->image }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @else
                                                <img src="{{ asset('Product_img/' . $product->image) }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @endif
                                        </div>


                                        <p class="line-clamp-1 text-lg">{{ $product->title }}</p>

                                        <div class="font-bold" dir="ltr">
                                            <!-- Assuming you have a discount_price field -->
                                          <span class="text-red-600 price"> {{ $product->price }} SAR</span>


                                        </div>

                                        {{-- add to cart --}}

                                    </a>
                                    <button
                                        class="addToCartButton w-full border border-black rounded-full py-2 px-4 font-bold hover:bg-[#862d42] hover:text-white hover:border-white"
                                        data-product-id="{{ $product->id }}">
                                        أضف للسلة
                                        <span class="customSpinner hidden"></span>
                                    </button>


                                    <span class="hidden" class="quantity-input" data-value="1"></span>

                                </div>

                            </div>
                        @endforeach

                    </div>
                    <!-- Optional: Add Swiper Pagination and Navigation -->
                    <div class="swiper-pagination-ProductsContent pt-5"></div>
                    <div class="swiper-button-next-ProductsContent"></div>
                    <div class="swiper-button-prev-ProductsContent"></div>
                </div>
            </div>



            {{-- third ads section --}}

            <div class="ads_2 text-center flex gap-10 mt-4">

                <a href="/SubProduct/المكياج/مجموعات%20مكياج/102" class=" flex justify-center gap-6 px-3 rounded-lg w-full">
                    <img src="{{ asset('img/ad6.png') }}"
                        class="rounded-lg w-full  transform transition duration-500 hover-scale-102" alt=""
                        srcset="">
                </a>
            </div>

            {{-- افضل منتجات العناية بالشعر --}}

            <div class="brands text-center flex flex-col gap-10">
                <div class="flex justify-between w-full px-5 mt-4">
                    <h1 class="text-xl font-bold max-sm:w-3/4 line-clamp-1 text-start">{{ $SecoundCategory->name }}
                    </h1>
                    {{-- You can use the category name dynamically here --}}
                    <a href="/Product/{{ $SecoundCategory->name }}/{{ $SecoundCategory->id }}" class="max-sm:w-1/4"
                        style="display: inline-block; border-bottom: 1px solid;">عرض الكل</a>
                </div>
                <div class="swiper-container-ProductsContent mx-4">
                    <div class="swiper-wrapper">
                        <!-- Swiper Slide -->

                        @foreach ($SecoundCategory->products as $product)
                            <div class="swiper-slide swiper-product">
                                <div
                                    class="product relative bg-white p-6 flex flex-col justify-between h-full rounded-lg gap-5">
                                    <a class="flex flex-col gap-5"
                                        href="/ProductDetails/{{ $product->title }}/{{ $product->id }}">


                                        <div class="w-full flex justify-center items-center h-56 w-60 relative">
                                            <div class="loader"></div>
                                            @if (strpos($product->image, 'https://') !== false)
                                                <img src="{{ $product->image }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @else
                                                <img src="{{ asset('Product_img/' . $product->image) }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @endif
                                        </div>


                                        <p class="line-clamp-1 text-lg">{{ $product->title }}</p>

                                        <div class="font-bold" dir="ltr">
                                            <!-- Assuming you have a discount_price field -->
                                          <span class="text-red-600 price"> {{ $product->price }} SAR</span>

                                            
                                        </div>

                                        {{-- add to cart --}}

                                    </a>
                                    <button
                                        class="addToCartButton w-full border border-black rounded-full py-2 px-4 font-bold hover:bg-[#862d42] hover:text-white hover:border-white"
                                        data-product-id="{{ $product->id }}">
                                        أضف للسلة
                                        <span class="customSpinner hidden"></span>
                                    </button>


                                    <span class="hidden" class="quantity-input" data-value="1"></span>

                                </div>

                            </div>
                        @endforeach

                    </div>
                    <!-- Optional: Add Swiper Pagination and Navigation -->
                    <div class="swiper-pagination-ProductsContent pt-5"></div>
                    <div class="swiper-button-next-ProductsContent"></div>
                    <div class="swiper-button-prev-ProductsContent"></div>
                </div>
            </div>
            {{-- fourth ads section --}}

            <div class="ads_2 text-center flex gap-10 mt-4">

              <a href="/Product/العناية%20بالبشرة/8" class=" flex justify-center gap-6 px-3 rounded-lg w-full">
                    <img src="{{ asset('img/ad7.png') }}"
                        class="rounded-lg w-full  transform transition duration-500 hover-scale-102" alt=""
                        srcset="">
                </a>
            </div>

            {{-- فيتامينات ومكملات غذائية --}}

            <div class="brands text-center flex flex-col gap-10">
                <div class="flex justify-between w-full px-5 mt-4">
                    <h1 class="text-xl font-bold max-sm:w-3/4 line-clamp-1 text-start">{{ $ThirdCategory->name }}</h1>
                    {{-- You can use the category name dynamically here --}}
                    <a href="/Product/{{ $ThirdCategory->name }}/{{ $ThirdCategory->id }}" class="max-sm:w-1/4"
                        style="display: inline-block; border-bottom: 1px solid;">عرض الكل</a>
                </div>
                <div class="swiper-container-ProductsContent mx-4">
                    <div class="swiper-wrapper">
                        <!-- Swiper Slide -->

                        @foreach ($ThirdCategory->products as $product)
                            <div class="swiper-slide swiper-product">
                                <div
                                    class="product relative bg-white p-6 flex flex-col justify-between h-full rounded-lg gap-5">
                                    <a class="flex flex-col gap-5"
                                        href="/ProductDetails/{{ $product->title }}/{{ $product->id }}">


                                        <div class="w-full flex justify-center items-center h-56 w-60 relative">
                                            <div class="loader"></div>
                                            @if (strpos($product->image, 'https://') !== false)
                                                <img src="{{ $product->image }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @else
                                                <img src="{{ asset('Product_img/' . $product->image) }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @endif

                                        </div>


                                        <p class="line-clamp-1 text-lg">{{ $product->title }}</p>

                                        <div class="font-bold" dir="ltr">
                                            <!-- Assuming you have a discount_price field -->
                                          <span class="text-red-600 price"> {{ $product->price }} SAR</span>


                                        </div>

                                        {{-- add to cart --}}

                                    </a>
                                    <button
                                        class="addToCartButton w-full border border-black rounded-full py-2 px-4 font-bold hover:bg-[#862d42] hover:text-white hover:border-white"
                                        data-product-id="{{ $product->id }}">
                                        أضف للسلة
                                        <span class="customSpinner hidden"></span>
                                    </button>


                                    <span class="hidden" class="quantity-input" data-value="1"></span>

                                </div>

                            </div>
                        @endforeach

                    </div>
                    <!-- Optional: Add Swiper Pagination and Navigation -->
                    <div class="swiper-pagination-ProductsContent pt-5"></div>
                    <div class="swiper-button-next-ProductsContent"></div>
                    <div class="swiper-button-prev-ProductsContent"></div>
                </div>
            </div>


            {{-- fifth ads sction --}}

            <div class="ads_1 brands text-center flex lg:flex-row flex-col gap-10 mt-4">

                <a href="/Product/العناية%20بالشعر/7" class="ad1 flex justify-center gap-6 px-3 rounded-lg">
                    <img src="{{ asset('img/ad8.png') }}"
                        class="rounded-lg  transform transition duration-500 hover-scale-102" alt=""
                        srcset="">
                </a>

                <a href="/SubProduct/العناية%20بالصحة/الصحة%20الغذائية/105" class="ad1 flex justify-center gap-6 px-3 rounded-lg">
                    <img src="{{ asset('img/ad9.png') }}"
                        class="rounded-lg  transform transition duration-500 hover-scale-102" alt=""
                        srcset="">
                </a>
            </div>

            {{-- افضل منتجات العناية بالمرأه --}}

            <div class="brands text-center flex flex-col gap-10 ">
                <div class="flex justify-between w-full px-5 mt-4">
                    <h1 class="text-xl font-bold max-sm:w-3/4 line-clamp-1 text-start">{{ $FourthCategory->name }}
                    </h1>
                    {{-- You can use the category name dynamically here --}}
                    <a href="/Product/{{ $FourthCategory->name }}/{{ $FourthCategory->id }}" class="max-sm:w-1/4"
                        style="display: inline-block; border-bottom: 1px solid;">عرض الكل</a>
                </div>
                <div class="swiper-container-ProductsContent mx-4">
                    <div class="swiper-wrapper">
                        <!-- Swiper Slide -->

                        @foreach ($FourthCategory->products as $product)
                            <div class="swiper-slide swiper-product">
                                <div
                                    class="product relative bg-white p-6 flex flex-col justify-between h-full rounded-lg gap-5">
                                    <a class="flex flex-col gap-5"
                                        href="/ProductDetails/{{ $product->title }}/{{ $product->id }}">


                                        <div class="w-full flex justify-center items-center h-56 w-60 relative">
                                            <div class="loader"></div>
                                           @if (strpos($product->image, 'https://') !== false)
                                                <img src="{{ $product->image }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @else
                                                <img src="{{ asset('Product_img/' . $product->image) }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @endif

                                        </div>


                                        <p class="line-clamp-1 text-lg">{{ $product->title }}</p>

                                        <div class="font-bold" dir="ltr">
                                            <!-- Assuming you have a discount_price field -->
                                          <span class="text-red-600 price"> {{ $product->price }} SAR</span>

                                        </div>

                                        {{-- add to cart --}}

                                    </a>
                                    <button
                                        class="addToCartButton w-full border border-black rounded-full py-2 px-4 font-bold hover:bg-[#862d42] hover:text-white hover:border-white"
                                        data-product-id="{{ $product->id }}">
                                        أضف للسلة
                                        <span class="customSpinner hidden"></span>
                                    </button>


                                    <span class="hidden" class="quantity-input" data-value="1"></span>

                                </div>

                            </div>
                        @endforeach

                    </div>
                    <!-- Optional: Add Swiper Pagination and Navigation -->
                    <div class="swiper-pagination-ProductsContent pt-5"></div>
                    <div class="swiper-button-next-ProductsContent"></div>
                    <div class="swiper-button-prev-ProductsContent"></div>
                </div>
            </div>

            {{-- افضل منتجات العناية بالطفل --}}

            <div class="brands text-center flex flex-col gap-10">
                <div class="flex justify-between w-full px-5 mt-4">
                    <h1 class="text-xl font-bold max-sm:w-3/4 line-clamp-1 text-start">{{ $FifthCategory->name }}</h1>
                    {{-- You can use the category name dynamically here --}}
                    <a href="/Product/{{ $FifthCategory->name }}/{{ $FifthCategory->id }}" class="max-sm:w-1/4"
                        style="display: inline-block; border-bottom: 1px solid;">عرض الكل</a>
                </div>
                <div class="swiper-container-ProductsContent mx-4">
                    <div class="swiper-wrapper">
                        <!-- Swiper Slide -->

                        @foreach ($FifthCategory->products as $product)
                            <div class="swiper-slide swiper-product">
                                <div
                                    class="product relative bg-white p-6 flex flex-col justify-between h-full rounded-lg gap-5">
                                    <a class="flex flex-col gap-5"
                                        href="/ProductDetails/{{ $product->title }}/{{ $product->id }}">


                                        <div class="w-full flex justify-center items-center h-56 w-60 relative">
                                            <div class="loader"></div>
                                           @if (strpos($product->image, 'https://') !== false)
                                                <img src="{{ $product->image }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @else
                                                <img src="{{ asset('Product_img/' . $product->image) }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @endif

                                        </div>


                                        <p class="line-clamp-1 text-lg">{{ $product->title }}</p>

                                        <div class="font-bold" dir="ltr">
                                            <!-- Assuming you have a discount_price field -->
                                          <span class="text-red-600 price"> {{ $product->price }} SAR</span>


                                        </div>

                                        {{-- add to cart --}}

                                    </a>
                                    <button
                                        class="addToCartButton w-full border border-black rounded-full py-2 px-4 font-bold hover:bg-[#862d42] hover:text-white hover:border-white"
                                        data-product-id="{{ $product->id }}">
                                        أضف للسلة
                                        <span class="customSpinner hidden"></span>
                                    </button>


                                    <span class="hidden" class="quantity-input" data-value="1"></span>

                                </div>

                            </div>
                        @endforeach

                    </div>
                    <!-- Optional: Add Swiper Pagination and Navigation -->
                    <div class="swiper-pagination-ProductsContent pt-5"></div>
                    <div class="swiper-button-next-ProductsContent"></div>
                    <div class="swiper-button-prev-ProductsContent"></div>
                </div>
            </div>

            {{-- sixth ads section --}}

            <div class="ads_2 text-center flex lg:flex-row flex-col gap-10 mt-4">

                <a href="/SubProduct/العناية%20بالبشرة/مقشر%20الوجه/243" class=" flex justify-center gap-6 px-3 rounded-lg">
                    <img src="{{ asset('img/ad10.png') }}"
                        class="rounded-lg  transform transition duration-500 hover-scale-102" alt=""
                        srcset="">
                </a>

                <a href="/SubProduct/العناية%20بالصحة/الصحة%20الجنسية/104" class=" flex justify-center gap-6 px-3 rounded-lg">
                    <img src="{{ asset('img/ad11.png') }}"
                        class="rounded-lg  transform transition duration-500 hover-scale-102" alt=""
                        srcset="">
                </a>

                <a href="/SubProduct/المكياج/كونسيلر/72" class="flex justify-center gap-6 px-3 rounded-lg">
                    <img src="{{ asset('img/ad12.png') }}"
                        class="rounded-lg  transform transition duration-500 hover-scale-102" alt=""
                        srcset="">
                </a>
            </div>

            {{-- افضل منتجات العناية بالرجل --}}

            <div class="brands text-center flex flex-col gap-10">
                <div class="flex justify-between w-full px-5 mt-4">
                    <h1 class="text-xl font-bold max-sm:w-3/4 line-clamp-1 text-start">{{ $SixthCategory->name }}</h1>
                    {{-- You can use the category name dynamically here --}}
                    <a href="/Product/{{ $SixthCategory->name }}/{{ $SixthCategory->id }}" class="max-sm:w-1/4"
                        style="display: inline-block; border-bottom: 1px solid;">عرض الكل</a>
                </div>
                <div class="swiper-container-ProductsContent mx-4">
                    <div class="swiper-wrapper">
                        <!-- Swiper Slide -->

                        @foreach ($SixthCategory->products as $product)
                            <div class="swiper-slide swiper-product">
                                <div
                                    class="product relative bg-white p-6 flex flex-col justify-between h-full rounded-lg gap-5">
                                    <a class="flex flex-col gap-5"
                                        href="/ProductDetails/{{ $product->title }}/{{ $product->id }}">


                                        <div class="w-full flex justify-center items-center h-56 w-60 relative">
                                            <div class="loader"></div>
                                           @if (strpos($product->image, 'https://') !== false)
                                                <img src="{{ $product->image }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @else
                                                <img src="{{ asset('Product_img/' . $product->image) }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @endif

                                        </div>


                                        <p class="line-clamp-1 text-lg">{{ $product->title }}</p>

                                        <div class="font-bold" dir="ltr">
                                            <!-- Assuming you have a discount_price field -->
                                          <span class="text-red-600 price"> {{ $product->price }} SAR</span>


                                        </div>

                                        {{-- add to cart --}}

                                    </a>
                                    <button
                                        class="addToCartButton w-full border border-black rounded-full py-2 px-4 font-bold hover:bg-[#862d42] hover:text-white hover:border-white"
                                        data-product-id="{{ $product->id }}">
                                        أضف للسلة
                                        <span class="customSpinner hidden"></span>
                                    </button>


                                    <span class="hidden" class="quantity-input" data-value="1"></span>

                                </div>

                            </div>
                        @endforeach

                    </div>
                    <!-- Optional: Add Swiper Pagination and Navigation -->
                    <div class="swiper-pagination-ProductsContent pt-5"></div>
                    <div class="swiper-button-next-ProductsContent"></div>
                    <div class="swiper-button-prev-ProductsContent"></div>
                </div>
            </div>

            {{-- seventh ads section --}}

            <div class="ads_2 text-center flex gap-10 mt-4">
                <a href="/Product/العناية%20بالطفل%20و%20الأم/10" class="flex justify-center gap-6 px-3 rounded-lg w-full overflow-hidden">
                    <img src="{{ asset('img/ad13.png') }}"
                        class="rounded-lg w-full transform transition duration-500 hover-scale-102" alt="">
                </a>
            </div>



            {{-- افضل منتجات العطور --}}

            <div class="brands text-center flex flex-col gap-10 pb-10 ">
                <div class="flex justify-between w-full px-5 mt-4">
                    <h1 class="text-xl font-bold max-sm:w-3/4 line-clamp-1 text-start">{{ $SeventhCategory->name }}
                    </h1>
                    {{-- You can use the category name dynamically here --}}
                    <a href="/Product/{{ $SeventhCategory->name }}/{{ $SeventhCategory->id }}"
                        class="max-sm:w-1/4" style="display: inline-block; border-bottom: 1px solid;">عرض الكل</a>
                </div>
                <div class="swiper-container-ProductsContent mx-4">
                    <div class="swiper-wrapper">
                        <!-- Swiper Slide -->

                        @foreach ($SeventhCategory->products as $product)
                            <div class="swiper-slide swiper-product">
                                <div
                                    class="product relative bg-white p-6 flex flex-col justify-between h-full rounded-lg gap-5">
                                    <a class="flex flex-col gap-5"
                                        href="/ProductDetails/{{ $product->title }}/{{ $product->id }}">

                                        <div class="w-full flex justify-center items-center h-56 w-60 relative">
                                            <div class="loader"></div>
                                           @if (strpos($product->image, 'https://') !== false)
                                                <img src="{{ $product->image }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @else
                                                <img src="{{ asset('Product_img/' . $product->image) }}?{{ time() }}"
                                                    class="max-w-40 max-h-52 block opacity-0" alt="{{ $product->name }}"
                                                    loading="lazy" onload="imageLoaded(this)">
                                            @endif
                                        </div>


                                        <p class="line-clamp-1 text-lg">{{ $product->title }}</p>

                                        <div class="font-bold" dir="ltr">
                                            <!-- Assuming you have a discount_price field -->
                                          <span class="text-red-600 price"> {{ $product->price }} SAR</span>
                                        </div>

                                        {{-- add to cart --}}

                                    </a>
                                    <button
                                        class="addToCartButton w-full border border-black rounded-full py-2 px-4 font-bold hover:bg-[#862d42] hover:text-white hover:border-white"
                                        data-product-id="{{ $product->id }}">
                                        أضف للسلة
                                        <span class="customSpinner hidden"></span>
                                    </button>


                                    <span class="hidden" class="quantity-input" data-value="1"></span>

                                </div>

                            </div>
                        @endforeach

                    </div>
                    <!-- Optional: Add Swiper Pagination and Navigation -->
                    <div class="swiper-pagination-ProductsContent pt-5"></div>
                    <div class="swiper-button-next-ProductsContent"></div>
                    <div class="swiper-button-prev-ProductsContent"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- footer --}}

    @include('include.footer')


</body>

</html>

<script>
    function imageLoaded(imgElement) {
        const loader = imgElement.previousElementSibling;
        if (loader && loader.classList.contains('loader')) {
            loader.classList.add('hidden');
            imgElement.classList.remove('opacity-0');
        }
    }
</script>
