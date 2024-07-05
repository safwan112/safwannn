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

   





    <div class="page-width page-width--narrow">
	<div class="container">
	  <h1 class="main-page-title page-header">
	    سياسة الاستبدال والاسترجاع
	  </h1>
	  <div class="rte">
	    <p>إن أولويتنا الأولى في صيدلية . كوم &nbsp;أن تشعر بالراحة أثناء طلبك المنتجات التي ترغب فعلاً بشرائها. &nbsp;إذا كنت ترغب بإلغاء طلبيتك، فعليك إخبارنا بذلك في أسرع وقت...</p>
<p>&nbsp;<strong><u>فترة الارجاع</u></strong><strong><u> :&nbsp;</u></strong></p>
<ul>
<li>إذا كنت تعتقد أنك تلقيت سلعة تحتوي على خطاْ تصنيغي يرجى التواصل معنا عن طريق وسائل الاتصال الخاصه وسوف نقوم بتقييم الموقف والتحقق من صحة جميع السلع . إذا لم نتمكن من العثور على السبب المذكور للإرجاع أو إذا كانت السلعة غير مؤهلة للإرجاع مقابل مبلغ مسترد على النحو المذكور أعلاه، سوف نرسل هذه السلعة إليك مرة أخرى دون منح المبلغ المسترد.</li>
<li>في حال إلغاء الطلب او ارجاع منتج معين وفقاَ للشروط والأحكام المذكروة اعلاه فإنه لا يمكننا ارجاع المبلغ الا بعد استلام المنتجات المرتجعه من خلال شركة الشحن وبمدة اقصاها 10 أيام عمل.</li>
<li>في حال وجود مشكله بمنتج كتسريب مثلا فإننا نقوم باستبدال المنتج بمنتج اخر من نفس النوع</li>
<li>يمكنك إرجاع السلع المستلمة إذا كانت تالفة أو متضررة أو غير مناسبة للاستخدام أو لا تطابق الوصف على الموقع الإلكتروني إلينا في غضون 7 ايام من توصيلها.</li>
</ul>
<p>إذا كنت غير راضٍ عن السلعة أو إذا قمت بتغيير رأيك بعد توصيل السلعة، يمكنك إرجاعها إلينا واسترداد أموالك في غضون 7 ايام من توصيلها فإنه يتم خصم رسوم الاسترجاع وهي 35&nbsp;ريال&nbsp;ويستثنى من ذلك :</p>
<ul>
<li>سلع التخفيضات او المستخدم لها كود خصم اوالمذكور بوضوح أنها غير قابلة للإرجاع بوصف المنتج او اي علامة جانبية للمنتج.</li>
<li><span>طلبات الجملة او الاكثر من 10&nbsp;حبة .</span></li>
<li>الادوية بجميع انواعها والمكملات الغذائيه واغذية وحفائظ الاطفال والمواد الغذائية وكذلك منتجات المكياج والعدسات والعطور ومستحضرات&nbsp;التجميل وحفائظ بكل انواعها حتى ولو كانت بحالتها الاصليه وذلك لحساسيتها ولضمان سلامتكم .</li>
<li>السلع التي تم فتح أو فقدان صناديق التعبئة والتغليف الخاصة بها أو أختامها وأي ملصقات أو علامات كانت مرفقة</li>
<li>الملابس الخاصة والمستلزامات الشخصية لانستطيع تبديلها او ترجيعها بعد استلامها حفاظا على سلامتكم الشخصية</li>
</ul>
<p>&nbsp;<strong><u>الغاء الطلبات</u></strong><strong><u> :</u></strong></p>
<ul>
<li>بإمكان صيدلية.كوم إلغاء بعض المنتجات من الطلب إذا كان تاريخ انتهاء صلاحيتها أقل من 6 أشهر، الا في حالة موافقة العميل.</li>
<li>في حال الرغبة في إرجاع اي منتج خلال الفترة المحددة ووفقاَ للشروط والأحكام المذكورة فإنه لا يتم استرجاع قيمة الطلب إلا بعد استلام المنتجات المرتجعة من قبل شركة الشحن</li>
<li>في حال إلغاء طلب تم شحنة وقبل استلامه من قبل العميل لاي سبب&nbsp; فإنه لا يتم استرجاع قيمة الطلب إلا بعد إرجاع الطلب من قبل شركة الشحن وإستلامه من قبل فريقنا وسوف يتم خصم قيمة الشحن من قيمة الطلب</li>

</ul>
	  </div>
  	</div>
</div>
</div>





</section>
                </main>





    {{-- footer --}}

    @include('include/footer')

</body>

</html>


