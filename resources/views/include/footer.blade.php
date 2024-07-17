<footer class="bg-white gap-3">

    <div class="flex lg:flex-row px-10 py-8 flex-col lg:gap-20 gap-7">
        {{-- التصنيفات --}}

        {{-- <div class="categories flex flex-col gap-5 lg:w-1/3 w-full ">
            <h2 class="font-bold text-lg">التصنيفات</h2>
            <hr class="lg:hidden block h-[3px] bg-[#a8a7a7]">
            <div class="flex gap-5 flex-wrap">
                @foreach ($categories as $category)
                    <a href=""
                        class="hover:underline">
                        <span class="">
                            {{ $category->name }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div> --}}

        {{-- الصفحات --}}

        <div class="flex flex-col gap-3">
            <h2 class="font-bold text-lg">الصفحات</h2>
            <hr class="lg:hidden block h-[3px] bg-[#a8a7a7]">
            <ul class="flex flex-wrap gap-3 max-width-container">
            <li><a href="/privacy-policy" class="hover:underline">سياسة الخصوصية</a></li>
            <li><a href="/terms-of-use" class="hover:underline">شروط الاستخدام</a></li>
            <li><a href="https://maps.app.goo.gl/LF2qN1dgFYUmy6hF7" class="hover:underline" target="_blank">موقع الصيدليه</a></li>
            <li><a href="/Contact-us" class="hover:underline" >اتصل بنا</a></li>
            <li><a href="/exchange-and-return-policy" class="hover:underline">سياسة الاستبدال والاسترجاع</a></li>
        </ul>
        </div>

        {{-- السوشيال --}}

        <div class="flex flex-col gap-3">
            <h2 class="font-bold text-lg">السوشيال</h2>

            <div class="flex gap-3">
                
                <a href="https://www.instagram.com/gheom.shop?igsh=MTBzenQ3dWZmMWJpZA%3D%3D&utm_source=qr" class="bg-[#ededed] p-2 rounded-full w-10 h-10 flex justify-center items-center">
                    <i class="fa-brands fa-square-instagram"></i>
                </a>
                <a href="https://www.tiktok.com/@gheom.shop?_t=8n8YLKL6iYx&_r=1" class="bg-[#ededed] p-2 rounded-full w-10 h-10 flex justify-center items-center">
                    <i class="fa-brands fa-tiktok"></i>
                </a>
                <a href="https://snapchat.com/t/K69g4x2p" class="bg-[#ededed] p-2 rounded-full w-10 h-10 flex justify-center items-center">
                    <i class="fa-brands fa-square-snapchat"></i>
                </a>
                
                <a href="https://x.com/gheomshop?s=11&t=se9DcC0SLeVua_N3BArH-Q" class="bg-[#ededed] p-2 rounded-full w-10 h-10 flex justify-center items-center">
                    <i class="fa-brands fa-twitter"></i>
                </a>
            </div>

        </div>


        {{-- تطبيقات الموبايل --}}

   <!--      <div class="flex flex-col gap-3">
            <h2 class="font-bold text-lg">تطبيقات الموبايل</h2>
            <div class="flex  gap-3">
                <a href="https://play.google.com/store/apps/details?id=co.median.android.obrjar">
                    <img src="{{ asset('img/android.png') }}" class="w-36" alt="" srcset="">
                </a>
               <a href="#">
                    <img src="{{ asset('img/ios.png') }}" class="w-36" alt="" srcset="">
                </a>
                <a href="#">
                    <img src="{{ asset('img/huawei.png') }}" class="w-36" alt="" srcset="">
                </a>   -->
            </div>
        </div>

    </div>





    <div class="flex lg:flex-row px-10 py-8 flex-col flex-col-reverse lg:gap-3 gap-10 lg:mt-0 mt-6 items-center justify-between">

        {{-- copyright --}}

        <p>جميع الحقوق محفوظة &copy; <span id="copyrightDate"></span> gheom.shop</p>


        {{--  --}}

        <div class="flex gap-6">
        <a target="_blank" href="https://drive.google.com/file/d/1GEneSLhBBi5gsLC4tghOLNBDbL7aHJLL/view?usp=sharing">
            <img src="{{ asset('img/footericon.png') }}"  alt="" srcset="" class="w-14">
           </a>
            <a target="_blank" href="https://maroof.sa/343421">
            <img src="{{ asset('img/footericon1.png') }}" alt="" srcset=""  class="w-14">
            </a>
        </div>

        {{-- payments method --}}

        <div class="flex justify-center items-center gap-10 lg:mt-0 mt-6">
            <a href="">
                <img src="{{ asset('img/payment_methods/1.png') }}" alt="" srcset="" >
            </a>
         <!--   <a href="">
                <img src="{{ asset('img/payment_methods/masterCard.png') }}" alt="" srcset=""
                    class="w-12">
            </a>
            <a href="">
                <img src="{{ asset('img/payment_methods/apple_pay.png') }}" alt="" srcset=""
                    class="w-12">
            </a>
            <a href="">
                <img src="{{ asset('img/payment_methods/paypal.png') }}" alt="" srcset=""
                    class="w-12">
            </a>
            <a href="">
                <img src="{{ asset('img/payment_methods/google_pay.png') }}" alt="" srcset=""
                    class="w-12">
            </a>
        </div> -->
    </div>
</footer>
