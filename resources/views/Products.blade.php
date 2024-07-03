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

    {{-- product --}}

    <div class="bg-[#ededed] pb-12">
        {{-- For Sort pass id  --}}
        <input type="hidden" id="category_id" value="{{ $category_id }}"> <!-- Example of category ID input -->

        <input type="hidden" id="subcategory_id" value="{{ $subcategory_id }}"> <!-- Example of category ID input -->

        {{-- page title and filer by --}}

        <div class="flex lg:flex-row flex-col gap-3 justify-between p-4 py-6">

            <div class="flex gap-2 flex-wrap items-center text-sm text-gray-400">

                <a href="/Home"
                    class=" w-[fit-content] px-1 hover:text-gray-800 text-right hover:underline text-center cursor-pointer cursor-pointer lg:h-auto h-full">
                    الصفحة الرئيسية
                </a>
                <span>></span>

                <a href="#"
                    class="hover:text-gray-800 text-gray-800 cursor-pointer text-right text-center line-clamp-1 max-sm:w-1/2">
                    {{ $title }}
                </a>

            </div>

            <div class="lg:flex  justify-between items-center ml-[1rem]">

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
    </div>
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

            {{-- page title and filer by for small screens --}}

            
        </div>

        {{-- product and filters --}}

        <div class="flex lg:flex-row flex-col gap-10 lg:justify-start justify-center mx-4 lg:mt-6 mt-0">

            {{-- تصنيفات فرعية أخرى : --}}

            <div class="flex flex-col gap-10 max-sm:hidden">




                <div class="lg:w-[350px] w-full bg-white flex flex-col gap-[0.2rem] p-4 rounded-xl">

                    <span class="block  font-bold lg:text-[20px] text-md">
                        تصنيفات أخرى :
                    </span>


                    @foreach ($categories as $category)
                        <div class="flex items-center justify-between">
                            {{-- <i class="openSubCategoryBTN fa-solid fa-minus"></i> --}}

                            <a href="/Product/{{ $category->name }}/{{ $category->id }}"
                                class="block px-2 py-2 hover:bg-gray-200 flex">
                                <span class="border-b border-transparent hover:border-current">
                                    {{ $category->name }}
                                </span>
                            </a>

                            <i class="toggleSubCategory fa-solid fa-plus cursor-pointer"
                                data-target-id="subcategory-{{ $category->id }}"></i>
                        </div>
                        @if ($category->subcategories->count())
                            <ul class="subCategoryList list-disc flex flex-col gap-1 pr-6"
                                data-target-id="subcategory-{{ $category->id }}">
                                @foreach ($category->subcategories as $subcategory)
                                    <a href="/SubProduct/{{ $category->name }}/{{ $subcategory->name }}/{{ $subcategory->id }}"
                                        class="block px-4 py-2 hover:bg-gray-200">
                                        <li>{{ $subcategory->name }}</li>
                                    </a>
                                @endforeach
                            </ul>
                        @endif
                        <hr>
                    @endforeach
                    {{--
                    <span class="block  font-bold lg:text-[20px] text-md">
                        تصنيفات فرعية لهذا التصنيف :
                    </span>

                    <h2 class="">
                        @foreach ($randomSubCategories as $subCategory)
                            <a href="/SubProduct/{{ $subCategory->name }}/{{ $subCategory->name }}/{{ $subCategory->id }}"
                                class="hover:underline lg:text-md text-sm">
                                <li>
                                    {{ $subCategory->name }}
                                </li>
                            </a>
                        @endforeach

                    </h2> --}}



                    {{-- <div class="flex justify-between items-center lg:m-0 mb-8">
                        <h1 class="font-bold text-[22px]">فرز حسب</h1>

                        <i class="fa-solid fa-filter"></i>

                    </div>

                    <hr> --}}


                    {{-- السعر --}}

                    <div class="text-sm">
                        


                        <div class="filterDiv flex flex-col gap-2">
                            

                            <div class="flex flex-col gap-2">
                                
                                
                                
                               
                            </div>
                        </div>


                    </div>
                    
                    <div class="text-sm">
                        


                        <div class="filterDiv flex flex-col gap-2">
                            

                            <div class="flex flex-col gap-2">
                                
                                
                            </div>
                        </div>


                    </div>

                </div>
            </div>


            {{-- product Filter for small screens --}}

            <div id="productFilter"
                class="lg:hidden flex bg-[#00000083] lg:static fixed bottom-0 left-0 lg:z-0 z-50  lg:w-[320px] w-full h-full transition:transform duration-200">

                <div class="flex flex-col  gap-5 bg-white p-4 rounded h-full w-[320px] overflow-y-auto">

                    

                    

                    <div class="lg:text-lg text-sm">
                        


                        <div class="filterDiv flex flex-col gap-2">
                            <hr class="my-1">

                            <div class="flex flex-col gap-2">
                                
                                
                            </div>
                        </div>


                    </div>

                </div>

            </div>


            {{-- product Sort for small screens --}}

            


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


    </div>

    {{-- footer --}}

    @include('include.footer')
</body>

</html>
<script>
    $(document).ready(function() {
        $('#sort_by').change(function() {
            var sortKey = $(this).val();
            var categoryId = $(this).data('category-id'); // Get the category ID from the data attribute
            $.ajax({
                url: '{{ route('products.sort') }}',
                type: 'GET',
                data: {
                    sort_by: sortKey,
                    category_id: categoryId,
                },
                success: function(response) {
                    // Assuming your products list is wrapped in a div with the id 'products-list'
                    $('#products-list').html(response.html);
                }
            });
        });
    });
</script>
