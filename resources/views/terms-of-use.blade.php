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
 .main-page-title{
font-size: x-large;
 } 

.page-width{
    background: #f8f8f8;
    padding: 0 20px 80px;
    line-height: 32px;
}
@media (max-width: 551px) {
    .page-header {
        padding: 10px 0 15px;
    }
}

    </style>

</head>

<body dir="rtl" class="font-tajawal" data-cart-contents-url="{{ route('CartContents') }}">
    {{-- offerBar --}}

    @include('include/offerBar')

    {{-- navBar --}}

    @include('include/navbar')

    {{-- product details --}}

   


    <main id="MainContent" class="wrapper-body content-for-layout focus-none" role="main" tabindex="-1">
                    <section id="shopify-section-template--22842041467158__main" class="shopify-section spaced-section" style="visibility: visible;"><link rel="stylesheet" href="//Gheom.shop/cdn/shop/t/19/assets/component-rte.css?v=131583500676987604941717558376" media="all" onload="this.media='all'">
<noscript><link href="//Gheom.shop/cdn/shop/t/19/assets/component-rte.css?v=131583500676987604941717558376" rel="stylesheet" type="text/css" media="all" /></noscript>


<div class="page-width page-width--narrow">
	<div class="container">
	  <h1 class="main-page-title page-header">
	    شروط الاستخدام
	  </h1>
	  <div class="rte">
	    <p>تخضع عملية البيع في &nbsp;Gheom.shop واستخدامك له وتخضع عمليات شرائك واستخدامك للمنتجات المتوفرة في هذا الموقع إلى أحكام وشروط الاستخدام والخدمة :</p>
<p>1- الاسعار المعروضه غير شاملة لضريبة القيمة المضافة و تضاف ضريبة القيمة المضافة على المنتجات حال تمت اضافتها الى سلة المشتريات.</p>
<p>2- يجوز لـ Gheom.shop، أن تختار قبول أو عدم قبول أو إلغاء طلبيتك في بعض الحالات و على سبيل المثال ان كان المنتج الذي ترغب بشرائه غير متوفر أو في حال تم تسعير المنتج بطريقة خاطئة أو في حال تبين ان الطلبية احتيالية أو &nbsp;لاي سبب خارج عن الارادة. سوف يقوم موقع Gheom.shop بإعادة ماقمت بدفعه للطلبيات التي لم يتم قبولها أو التي يتم إلغاؤها في حال قمت بالدفع&nbsp;<br>3- جميع المحتويات على موقع صيدلية.كم &nbsp;(بما في ذلك على سبيل المثال لا الحصر الكتابات والتصاميم والرسومات والشعارات والأيقونات والصور والمقاطع الصوتية والتحميلات والواجهات والرموز والبرامج بالإضافة إلى كيفية اختيارها وترتيبها) ملكية حصرية يملكها موقع Gheom.shop وتكون هذه الملكية خاضعة لحماية حقوق النشر والعلامة التجارية.<br>4-عند الشراء او ارسال بريد الإلكتروني إلى Gheom.shop أنت توافق على استلام &nbsp;أي ايميلات من صيدلية.كم<br>5- يحتفظ موقع صيدلية.كم لنفسه بالحق بأن يجري أية تعديلات أو تغييرات على موقعه وعلى السياسات والاتفاقيات المرتبطة به بما في ذلك سياسة الخصوصية وكذلك الوثيقة لأحكام وشروط الخدمة.<br><strong>- سياسة الموافقة على الطلبات :&nbsp;</strong><br>نظراً لحرص Gheom.shop &nbsp;على تقديم منتجات بجودة عالية وبظروف مناسبة ، &nbsp;فإن :<br>1- &nbsp;الطلبات المدفوعة مسبقا ً : &nbsp;يعتبر الطلب موافق عليه و ينتقل لمرحلة الشحن &nbsp;مباشرة بعد مراجعته من قبل Gheom.shop و يعتبر ذلك موافقه على شحن الطلب &nbsp;&nbsp;</p>
<p><strong>سياسة اكواد الخصم :</strong></p>
<p>يستنى من اكواد الخصم عروض الجملة وكذلك عروض الشهر بانواعها كما لايشمل الادوية وحليب الاطفال وحفائظ الأطفال وبعض المنتجات الخاصة&nbsp;</p>
	  </div>
  	</div>
</div>





</section>
                </main>





    {{-- footer --}}

    @include('include/footer')

</body>

</html>


