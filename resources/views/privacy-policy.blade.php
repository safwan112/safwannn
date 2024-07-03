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
	    سياسة الخصوصية
	  </h1>
	  <div class="rte">
	    تعتبر الخصوصية والأمن أقصى الأولويات في Gheom.shop حيث ان Gheom.shop لم تقم على الإطلاق بمشاركة أو طباعة أو بيع معلومات أي زبون لأي طرف آخر – ولن تفعل أبدًا.<br>عند قيامك بتقديم المعلومات الشخصية على موقعنا سنعمل على حماية كلًا من معلوماتك على الإنترنت وخارجه.<br><br>نقوم باستخدام مجموعة متنوعة من تقنيات وإجراءات الأمان للمساعدة على حماية معلوماتك الشخصية من الوصول أو الاستخدام أو الكشف غير المصرح به حالما نقوم باستلامها. على سبيل المثال، نحن نقوم بتخزين معلوماتك الشخصية على أنظمة كمبيوتر ذات وصول محدود ومؤمَّن. ويتم تدريب موظفين Gheom.shop وإبقائهم مطلعين على آخر المستجدات التي تتعلق بالإجراءات الأمنية لدينا.<br><br>تقوم Gheom.shop باتخاذ خطواتٍ منطقية ومناسبة لحماية معلوماتك الشخصية من أي دخول أو كشف غير مصرح به. ومع ذلك، لا يمكن توفير 100% من الحماية للبيانات المرسلة عبر الإنترنت أو المخزنة على الخوادم. ولهذا، بينما نبذل قصارى جهدنا لحماية معلوماتك الشخصية والخصوصية، فلا يمكننا أن نضمن لك أمن أي معلومات يتم نقلها أو كشفها لنا عبر الإنترنت. نحن غير مسؤولين عن الكشف أو انتهاك أو سرقة معلوماتك الشخصية.<br><br>إذا اخترت التسجيل معنا، وقمت بتعيين كلمة مرور لحسابك، ففي هذه الحالة ستكون معلوماتك الشخصية عبر الإنترنت محميةً بكلمة المرور التي قمت بتعيينها. ونقترح ألا تقوم بمشاركة أو كشف كلمة المرور الخاصة بك لأي أحد. أنت مسؤولٌ عن سرية الحساب وكلمة المرور الخاصة بك، ومسؤولٌ بالكامل عن جميع الأنشطة التي تتم عبر حسابك وكلمة المرور التي قمت بتعيينها. نقترح عليك تعيين كلمات مرور صعبة كتلك التي تضم تركيبة من الحروف والأرقام.<br><br> <br><br>- طلب آمن<br><br>عند قيامك بتقديم المعلومات الشخصية على موقعنا، فستكون معلوماتك محمية سواءً على الإنترنت أو غير ذلك. يمكننا فقط الدخول إلى بطاقتك الائتمانية (ولكن ليس معلومات بطاقتك الائتمانية الفعلية) للتأكد من الرصيد وليس للقيام بالخصم. يمكنك السماح بالخصم فقط عند قيامك بالطلب عبر حسابك المحمي بكلمة المرور.<br><br>عندما تكون على صفحةٍ آمنة، كنموذج الطلب لدينا والذي يتم استضافته على قاعدة بيانات مؤمنة، فإن رمز القفل في متصفح الويب لديك سيصبح مغلقًا. وهذا يدل على أن الاتصال بين متصفح الويب لديك وخادم الويب لدينا قد أصبح مؤمنًا. وعندما تكون على صفحةٍ مؤمنة، فإن Gheom.shop على متصفحك سيصبح https://Gheom.shop<br><br>عند تقديمك معلومات حساسة (كرقم بطاقة الائتمان)، فإن تلك المعلومات يتم تشفيرها وحمايتها عبر أنظمة التشفير، التي تلبي أو تتجاوز المعايير المعتمدة - (بروتوكول طبقة المنافذ الآمنة). وعندما تكون على صفحةٍ آمنة، مثل نموذج الطلب لدينا والذي يتم استضافته على قاعدة بيانات آمنة، فإن رمز القفل على الجزء السفلي من متصفحات الويب مثل فايرفوكس وجوجل كروم ومايكروسوفت إنترنت إكسبلورر يصبح مغلقًا، وذلك خلافًا لما يكون عليه القفل أثناء "التصفح" العادي، حيث يكون مفتوحًا أو غير مغلقًا.<br><br> Gheom.shopوالأطراف الثلاث<br><br>كما هو الحال لدى معظم تجار التجزئة، فعند زيارتك مواقعنا، فإننا نقوم بجمع المعلومات حول زيارتك. حيث نجمع تلك المعلومات لتحسين عملية توصيل المعلومات والخدمات لكم. ولجمع هذه المعلومات، فإننا نستفيد من تكنولوجيا شركات الطرف الثالث مثل جوجل. وعلى سبيل المثال فإننا نستفيد من خدمة Google Analytics والتي تساعدنا على إجراء قياسات الموقع. ويستخدم هذا البرنامج في التقييم - العشوائي وفي معرفة كيفية استخدام العدد الإجمالي من الأشخاص لمجموعة مواقع Gheom.shop<br><br>يوفر هذا البرنامج معلومات عن جهازك (مثل الكمبيوتر والجهاز اللوحي والهاتف الذكي)، نوع المتصفح (مثل جوجل كروم وسفاري وفايرفوكس) ونظام التشغيل (مثل ويندوز وماكنتوش وأندرويد وIOS). نقوم بجمع هذه المعلومات لضمان تحسين المواقع إلى أكبر مدى ممكن بناءً على التكنولوجيا التي يستخدمها معظم الناس للوصول إلى مواقع الويب لدينا.<br><br>يستخدم جزء من هذه التكنولوجيا ملفات الإنترنت "cookies". يتم تخزين ملفات الكوكيز "cookies" على القرص الصلب لديك على هيئة ملفات نصية. وتعتبر معظم ملفات الكوكيز عبارة عن "ملفات كوكيز مؤقتة" وهذا يعني أنه يتم حذفها تلقائيًا عند إغلاق متصفحك. ويطلق على ملفات الكوكيز الأخرى "ملفات الكوكيز الدائمة" لأنها لا تنتهي صلاحيتها. وعادة ما تسمح لنا ملفات الكوكيز بتوفير المعلومات المستهدفة حول المنتجات والتسعير. على الرغم أن بإمكانك إزالتهم بسهولة من خلال اتباع الإرشادات الموجودة على ملف المساعدة في متصفح الويب لديك.<br><br>بينما يتم جمع هذه البيانات الإحصائية، فمن الهام الملاحظة أن Gheom.shop لاتقوم ببيع أو تأجير أو خرق أيٍ من معلوماتك الشخصية. وبالرغم من ذلك، إذا كانت تلك المعلومات مطلوبةً بموجب القانون، فسنقوم بالكشف عن معلوماتك الشخصية في حال وجود مذكرة تفتيش، استدعاء، أمر من المحكمة، إلخ.<br><br>للتواصل معنا : <br><br>إذا كان لديك أي أسئلة حول بيان الخصوصية أو الممارسات على الموقع أو تعاملك على موقعنا، فيمكنك التواصل معنا على العنوان التالي: ph.gheom@gheom.shop
	  </div>
  	</div>
</div>





</section>
                </main>





    {{-- footer --}}

    @include('include/footer')

</body>

</html>


