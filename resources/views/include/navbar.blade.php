<meta name="user-status" content="{{ Auth::check() ? 'logged-in' : 'logged-out' }}">


<nav id="mainNav" class="bg-white text-black lg:p-4 p-0">
    <div class="xl:container mx-auto flex justify-between gap-5 items-center">

        <div class="lg:hidden inline flex lg:gap-10 gap-1">
            {{-- humburger list in lg-screen --}}
            <button id="mobileMenuButton" class="p-{0.1rem}">
                <i id='' class="fa-solid fa-bars text-xl px-3 py-2"></i>
            </button>
            {{-- search bar in lg-screen --}}
            <i id="searchButton"
                class="openSrachBarBTNs fa-solid fa-magnifying-glass text-xl self-center px-3 py-2 cursor-pointer"></i>
        </div>


        <!-- Logo -->
        <a href="/Home" class="text-xl font-bold">
            <img class="desktop-logo w-24" src="{{ asset('/img/logo.png') }}" alt="logo">
            <!-- Desktop logo -->
            <img class="mobile-logo w-10" src="{{ asset('/img/log.png') }}" alt="logo"> <!-- Mobile logo -->
        </a>


        <!-- Search Bar -->
        <div id="searchInput"
            class="openSrachBarBTNs w-[40rem] lg:flex justify-between hidden rounded-[2rem] shadow-lg border py-2 px-3 xl:w-[40rem] w-[30rem] cursor-pointer ">
            <span type="text" class=" text-[#777] w-full">
                ابحت عن منتج في متجرنا
            </span>
            <button class="flex items-center justify-center ">
                <i class="fa-solid fa-magnifying-glass"></i>                     
            </button>
        </div>

        <!-- Icons for Login, Register, Chat -->

        <div class="flex items-center lg:gap-10 gap-1  text-center py-1">
            
            @if (Auth::check())
                <a href="#" id="AccountMenuButton" class="px-3 py-2 rounded">
                    <i class="fa-solid fa-user text-xl transform transition-transform hover:scale-125"></i>
                    <p class="text-gray-400 lg:block hidden">حسابي</p>
                </a>
            @else
                <a href="#" id="loginButton" class="px-3 py-2 rounded">
                    <i class="fa-solid fa-user-plus text-xl transform transition-transform hover:scale-125"></i>
                    <p class="text-gray-400 lg:block hidden">الدخول</p>
                </a>
            @endif

            <a href="#" class="px-3 py-1 rounded relative" id="cartMenuButton">
                <i class="fa-solid pt-3 fa-cart-shopping text-xl transform transition-transform hover:scale-125"></i>
                <p class="text-gray-400 lg:block hidden">السلة</p>
                <span id="cartCount"
                    class="custom-color absolute text-white w-5 h-5 flex items-center justify-center rounded-full text-[13px] top-2 md:right-2 right-1">0</span>
            </a>
        </div>
    </div>
</nav>

<div class="custom-color h-10 lg:flex hidden items-center gap-10 text-white">
    <div class="relative men z-20">
        <div class="group cursor-pointer py-4">
            <p class="py-3 transform transition-transform hover:scale-110">
                <i class="fa-solid fa-bars"></i>
                التصنيفات
            </p>
            <div class="absolute hidden group-hover:block text-black bg-white shadow-lg w-60">
                @foreach ($categories as $category)
                    <!-- Menu item for each category -->
                    <div class="menu-item relative">
                        <a href="/Product/{{ $category->name }}/{{ $category->id }}"
                            class="block px-4 py-2 hover:bg-gray-200 flex justify-between items-center">
                            <span class="border-b border-transparent hover:border-current">
                                {{ $category->name }}                                                 <span></span>>
                            </span>
                        </a>
                        @if ($category->subcategories->count())
                            @if ($category->subcategories->count() > 7)
                                <div class="submenu absolute w-[1100px] h-[500px]" style="overflow-y: auto;">
                                    <div class="grid grid-cols-12">
                                        <!-- Submenu items for subcategories -->
                                        @foreach ($category->subcategories as $subcategory)
                                            <a href="/SubProduct/{{ $category->name }}/{{ $subcategory->name }}/{{ $subcategory->id }}"
                                                class="block px-4 py-2 hover:bg-gray-200">{{ $subcategory->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="submenu absolute w-60 ">
                                    <!-- Submenu items for subcategories -->
                                    @foreach ($category->subcategories as $subcategory)
                                        <a href="/SubProduct/{{ $category->name }}/{{ $subcategory->name }}/{{ $subcategory->id }}"
                                           class="block px-4 py-2 hover:bg-gray-200">{{ $subcategory->name }}</a>
                                    @endforeach
                                </div>
                            @endif
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    <a href="/Home" class="border-b border-transparent hover:border-current">الرئيسية</a>
  <!--   <p class="border-b border-transparent hover:border-current">العروض</p> -->
     <a href="/brands" class="border-b border-transparent hover:border-current">الماركات</a> 
    <a href="https://radar-al-dawaa.com/" class="border-b border-transparent hover:border-current">رادار الادويه </a>
</div>


<!-- Mobile Menu -->
<div id="mobileMenu"
    class="bg-[#00000036] fixed top-0 right-0 h-full w-full shadow-md transform translate-x-100 transition-transform duration-300 ease-in-out z-50">
    <div class="h-full md:w-64 w-72 bg-white shadow-md overflow-y-auto">
        <!-- Close Button -->

        <div class="flex justify-between items-center p-3">
            <img class=" w-20" src="{{ asset('/img/logo.png') }}" alt="logo">

            <button id="closeMenuButton" class="flex items-center">
                <i class="fa fa-times text-2xl"></i>
            </button>
        </div>

        <div class="navGategory flex flex-col gap-1 lg:text-md text-sm  p-3 pb-10">
            @foreach ($categories as $category)
                <div class="flex items-center justify-between">
                    {{-- <i class="openSubCategoryBTN fa-solid fa-minus"></i> --}}

                    <a href="/Product/{{ $category->name }}/{{ $category->id }}"
                        class="block px-4 py-2 hover:bg-gray-200 font-bold flex">
                        <span class="border-b border-transparent hover:border-current">
                            {{ $category->name }}
                        </span>
                    </a>

                    <i class="OandC_S_Category fa-solid fa-plus cursor-pointer"></i>
                </div>
                @if ($category->subcategories->count())
                    <ul class="navSubCategory list-disc flex flex-col gap-2 pr-6">
                        @foreach ($category->subcategories as $subcategory)
                            <a href="/SubProduct/{{ $category->name }}/{{ $subcategory->name }}/{{ $subcategory->id }}"
                                class="block px-4 py-2 hover:bg-gray-200">
                                <li>{{ $subcategory->name }}</li>
                            </a>
                        @endforeach
                    </ul>
                @endif
                <hr class="my-1">
            @endforeach
        </div>
    </div>
</div>


{{-- search menu --}}
<div id="searchMenu"
    class="bg-[#00000036] fixed top-0 right-0 h-full w-full shadow-md transform translate-x-100 transition-transform duration-300 ease-in-out z-50">

    <div class="md:w-1/3 bg-white p-4 overflow-y-auto h-full">
        <div class="flex justify-between items-center mb-4">
            <h1 class="font-bold text-xl">البحث</h1>

            {{-- website logo --}}

            <img class=" md:w-14 w-10" src="{{ asset('/img/log.png') }}" alt="logo">
            <!-- Close Button -->
            <button id="closeSearchButton" class="">
                <i class="fa fa-times text-2xl"></i>
            </button>

        </div>

        <div class="flex flex flex-col gap-8">
            <div class="relative">
                <input id="searchInputMobile" class="w-full border border-[#777] py-2 px-4 pl-8 rounded-full outline-none" placeholder="البحث عن المنتجات ..." type="text" onkeyup="searchProduct()">
                <i class="absolute top-[13px] left-[13px] fa-solid fa-search"></i>
            </div>
        </div>

        {{-- الأكثر بحثا --}}

        <div id="searchResult" class="flex flex-col gap-3 pt-4">
            <div class="flex flex-col gap-4">
                {{-- result matched --}}

                <div class="flex flex-col gap-10">

                    <div class="flex flex-col gap-4">

                        <h1 class="text-[#999] text-center text-éxl mt-32">أحصل على ما تريد بسهولة</h1>

                        <div class="flex flex-col gap-10">

                            <text- class="fa-regular fa-face-smile-wink text-[#862d42] text-6xl mt-4 text-center"></i>

                        </div>
                    </div>

                </div>

                {{-- no product found --}}

                {{-- <div class="flex flex-col gap-10 justify-center items-center w-full md:h-[350px] h-[60vh] text-center">
                    <i class="fa-regular fa-face-frown text-[#999] text-8xl"></i>
                    <p class="text-[#999] text-2xl">عذرا لا يوجد لدينا هذا المنتوج. إبحث من جديد ...</p>
                </div> --}}

            </div>
        </div>
    </div>
</div>

{{-- cart shopping --}}


<div id="cartMenu"
    class="bg-[#00000036] fixed top-0 left-0 h-full w-full shadow-md transform translate-x-100 transition-transform duration-300 ease-in-out z-50">

    <div id='divcartcontent'
        class="relative flex flex-col gap-4 lg:w-[25rem] lg:text-md text-sm bg-white md:p-4 p-2 overflow-y-auto w-[18rem] h-full">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-xl">السلة</h1>

            {{-- website logo --}}

            <div class="md:w-16 w-14 md:h-16 h-14 flex justify-center items-center">
                <img class=" md:max-w-14 max-w-10 md:max-h-14 max-h-10" src="{{ asset('/img/log.png') }}"
                    alt="logo">
            </div>

            <!-- Close Button -->
            <button id="closeCartButton" class="">
                <i class="fa fa-times text-2xl"></i>
            </button>

        </div>

        {{-- cart products --}}

        <div class="flex flex-col gap-6 pt-4 flex-grow" style="overflow-y-auto; margin-bottom: 100px;">
            <!-- Adjust margin-bottom as needed -->

            {{-- cart has products --}}

            <div class="flex flex-col gap-6">

                <div class="flex flex-col gap-2 " id="contentToBlur">
                    <div class="flex justify-between items-center py-2 sm:ml-0 ml-2">
                        <h1 class="text-[#999]">سلة منتجاتك</h1>
                        <span class="text-red-600 font-bold underline cursor-pointer" id="clearCart">حذف الكل</span>
                    </div>
                    <hr class="mb-4">

                    <!-- Add an id to the container -->
                    <div class="flex flex-col gap-2" id="cartProductsContainer"
                        style="max-height: 60vh; overflow-y-auto;">

                         <div
                            class="flex flex-col gap-10 justify-center items-center w-full md:h-[350px] h-[70vh] text-center">
                            <i class="fa-solid fa-cart-shopping text-[#999] text-8xl"></i>
                            <p class="text-[#999] text-2xl">سلة المشتريات الخاصة بك فارغة</p>
                            <p class="text-[#999] text-xl"> قم بتسجيل الدخول لمتابعة الشراء</p>
                        </div>

                    </div>

                </div>

                <div id="spinner-overlay"
                    class="absolute inset-0 flex justify-center items-center bg-white bg-opacity-75 z-10 hidden">
                    <div class="customSpinner"></div>
                </div>

                <div class="fixed bottom-0 right-0 p-1 pt-0 bg-white z-10 w-[18rem] lg:w-[25rem]">
                    <hr class="my-2">
                    <div class="flex gap-3 items-center md:text-lg text-sm font-bold ">
                        <h1 class="text-[#999]">المجموع :</h1>
                        <div dir="ltr">
                            <span id="totalAmount">0 SAR</span>
                            <span>(<span id="cartCount">0</span>)</span>
                        </div>
                    </div>
                    <div id="Buttondisplay" class="justify-cente mt-4" style="display: none;">
                        <a href="/CheckOut">
                            <button
                                class="md:py-3 w-[15rem] lg:w-[20rem] py-2 md:px-5 px-3 text-sm text-center bg-[#862D42] hover:bg-transparent hover:text-black border hover:border-[#999] border-[#fff] text-white font-bold rounded-full transition-all duration-200">الدفع</button>
                        </a>
                    </div>
                </div>

            </div>

            {{-- empty cart --}}

            {{-- <div class="flex flex-col gap-10 justify-center items-center w-full md:h-[350px] h-[70vh] text-center">
                <i class="fa-solid fa-cart-shopping text-[#999] text-8xl"></i>
                <p class="text-[#999] text-2xl">سلة المشتريات الخاصة بك فارغة</p>
            </div> --}}

        </div>

    </div>
</div>


{{-- Login Menu --}}

<div id="loginMenu"
    class="bg-[#00000036] flex justify-end fixed top-0 right-0 h-full w-full shadow-md transform translate-x-[-100%] transition-transform duration-300 ease-in-out z-50">


    <div class="w-60 md:w-[20rem] h-full bg-white shadow-md">
        <!-- Content of your menu -->
        <div class="flex justify-between items-center mx-6 mt-4">
            <h2 class="font-bold">الدخول</h2>
            <button id="closeLoginMenuButton"><i class="fa fa-times text-2xl"></i></button>
        </div>
        <div class="mx-6 mt-8">
            <form action="/Login" method="post">
                @csrf
                <p class="my-2 mr-2">
                    البريد الالكتروني
                    <span class="text-red-700">*</span>
                </p>
                <input required type="text" name="email" placeholder="البريد الالكتروني"
                    class="custom-placeholder border border-slate-300 rounded-3xl w-{100%} md:w-[17rem] p-2">
                <p class="my-2 mr-2">
                    كلمة المرور
                    <span class="text-red-700">*</span>
                </p>
                <input required type="password" name="password" placeholder=" كلمة المرور "
                    class="custom-placeholder border border-slate-300 rounded-3xl w-{100%} md:w-[17rem] p-2">
                @if (session('loginError'))
                    <p class="text-xs mt-2 text-center text-red-800">{{ session('loginError') }}</p>
                @endif
                <button
                    class="custom-color text-white p-2 rounded transition duration-300 hover:bg-white rounded-3xl hover:text-black border border-[#fff] hover:border-slate-300 my-3 w-[11rem] md:w-[17rem]">
                    الدخول
                </button>
            </form>
            <a href="/ResetPassword">
                <p class="text-center underline text-sm">هل نسيت كلمة السر؟</p>
            </a>
            <a href="/Register">
                <button
                    class="custom-color text-white p-2 rounded transition duration-300 hover:bg-white rounded-3xl hover:text-black border border-[#fff] hover:border-slate-300 my-3 w-[11rem] md:w-[17rem]">
                    انشاء حساب
                </button>
            </a>

        </div>
        <!-- Add more content as needed -->
    </div>

</div>

<div id="AccountMenu"
    class="bg-[#00000036] flex justify-end fixed top-0 right-0 h-full w-full shadow-md transform translate-x-[-100%] transition-transform duration-300 ease-in-out z-50">
    <div class="w-60 md:w-[17rem] h-full bg-white shadow-md">
        <!-- Menu content goes here -->
        <div class="flex justify-between items-center mx-6 mt-4">
            <h2 class="font-bold">الحساب</h2>
            <button id="closeAccountMenuButton"><i class="fa fa-times text-2xl"></i></button>
        </div>
        @if (auth()->user() && auth()->user()->is_admin !== 1)
            <a href="/MyOrder">
                <p class="m-6">الطلبات</p>

            </a>
        @endif
        {{--
            <hr>
        <a href="">
            <p class="m-4">اعد ضبط كلمه السر</p>
        </a> --}}

        <hr>
        @if (auth()->user() && auth()->user()->is_admin == 1)
            <a href="/Admin/Dashboard">
                <p class="m-4">لوحة التحكم</p>
            </a>
        @endif
        <hr>
        <a href="/Logout">
            <p class="m-4">تسجيل الخروج</p>
        </a>
        <!-- Add the rest of your menu content here -->
    </div>
</div>


{{-- whatsapp icon --}}

<a href="https://wa.me/message/XUQU43VAPRGRK1" class="fixed bottom-3 left-3 w-14 z-[10]">
    <img src="{{ asset('img/WhatsApp.png') }}" class="" alt="whatsapp icon" srcset="">
</a>

<script type="text/javascript">
    var basePath = "{{ asset('Product_img/') }}";
</script>
