<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- plugins:css -->
    @include('AdminDashboard/include/link')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>


<body style="  font-family: 'Tajawal', sans-serif;">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div
                class="text-left navbar-brand-wrapper d-flex align-items-center justify-content-center font-bold text-2xl">
                <a href="/Home">
                    <p>
                    Gheom.shop || غيوم.شوب
                    </p>
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">

                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">

                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{ asset('img/log.png') }}" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href='/Logout'>
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('AdminDashboard/include/nav')
            <!-- partial -->
            <div class="main-panel" >
                <div dir="rtl" style="text-align: right">
                    <h2 class="font-bold m-4">
                        يمكنك تغير اي صورة عبر الضغط عليها و اختيار الصورة الجديدة
                    </h2>
                </div>
                <div class="swiper mySwiper mySwiperLarge w-[80%] mt-6" id="swiperLarge">
                        <p class="text-right my-2" dir="rtl">
                            الصورة الرئيسية للشاشات الكبيرة يجب ان تكون تتفور على مقاس
                            1600 px
                            على
                            580 px
                            (
                            ممكن ان يكون فرق 10 px
                            )
                        </p>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{ asset('img/slide1.png') }}" alt="Image 1" class="w-full lg:block hidden">
                            <img src="{{ asset('img/sliderPicLgScreen1.png') }}" alt="Image 1" class=" w-full lg:hidden block">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('img/slide2.png') }}" alt="Image 2" class="w-full lg:block hidden">
                            <img src="{{ asset('img/sliderPicLgScreen2.png') }}" alt="Image 2"
                                class=" w-full lg:hidden block">
                        </div>
                        <!-- ... additional slides ... -->
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-scrollbar"></div>
                </div>
                <div class="swiper mySwiper mt-6 mySwiperPhone " id="swiperPhone">
                    <p class="text-right my-2" dir="rtl">
                        الصورة الرئيسية لشاشات الهواتف يجب ان تكون تتفور على مقاس
                        1100 px
                        على
                        735 px
                        (
                        ممكن ان يكون فرق 10 px
                        )
                    </p>
                    <div class="swiper-wrapper w-96">
                        <div class="swiper-slide">
                            <img src="{{ asset('img/sliderPicLgScreen1.png') }}" alt="Image 1" class="w-full h-96 ">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('img/sliderPicLgScreen2.png') }}" alt="Image 2"
                                class=" w-full h-96">
                        </div>
                        <!-- ... additional slides ... -->
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-scrollbar"></div>
                </div>
                <div class="content-wrapper">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <div class="brands text-center flex flex-col gap-10">
                                    <h1 class="" dir="rtl">
                                         اهم العلامات التجارية  يجب ان تكون تتفور على مقاس
                                         (150 - 350)
                                        px
                                         على
                                         (80 - 320)
                                        px


                                    </h1>
                                    <div class="sectionsSlider flex justify-center md:gap-6 gap-3 px-3 lg:flex-nowrap flex-wrap">

                                        @for ($i = 1; $i <= 9; $i++)
                                            <span style='box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;' href="#" class="bg-white p-4 rounded-lg md:w-[128px] md:h-[128px] w-[110px] h-[110px] flex items-center">
                                                <img src="{{ asset('img/brands/top' . $i . '.jpg') }}" class="w-32 brand-img" data-type="brand" alt="">
                                            </span>
                                        @endfor


                                    </div>
                                </div>

                                <div class="ads_1 brands text-center gap-10 flex lg:flex-row flex-col mt-8">
                                    <p href="#" class="ad1 flex justify-center gap-6 px-3 rounded-lg overflow-hidden">
                                        <img src="{{ asset('img/ad1.png') }}"
                                            class="rounded-lg transform transition duration-500 hover-scale-102" alt="">
                                    </p>

                                    <p href="#" class="ad1 flex justify-center gap-6 px-3 rounded-lg overflow-hidden">
                                        <img src="{{ asset('img/ad2.png') }}"
                                            class="rounded-lg transform transition duration-500 hover-scale-102" alt="">
                                    </p>
                                </div>

                                <div class="ads_2 text-center lg:gap-3 gap-6 flex lg:flex-row flex-col gap-10 mt-4">

                                    <p href="#" class=" flex justify-center gap-6 px-3 rounded-lg">
                                        <img src="{{ asset('img/ad3.png') }}"
                                            class="rounded-lg  transform transition duration-500 hover-scale-102" alt=""
                                            srcset="">
                                    </p>

                                    <p href="#" class=" flex justify-center gap-6 px-3 rounded-lg">
                                        <img src="{{ asset('img/ad4.png') }}"
                                            class="rounded-lg  transform transition duration-500 hover-scale-102" alt=""
                                            srcset="">
                                    </p>

                                    <p href="#" class="flex justify-center gap-6 px-3 rounded-lg">
                                        <img src="{{ asset('img/ad5.png') }}"
                                            class="rounded-lg  transform transition duration-500 hover-scale-102" alt=""
                                            srcset="">
                                    </p>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    @include('AdminDashboard/include/js')

</body>
<!-- Custom Modal for Image Change -->
<div id="imageChangeModal" class="custom-modal" style="display: none;">
    <div class="custom-modal-content">
      <span class="close-button">&times;</span>
      <div class="mt-8">
          <h2 class="font-bold">Change Image</h2>
          <form id="imageUploadForm">
              <input type="file" name="newImage" id="newImage" class="mt-4">
              <button type="button" id="saveImageChange" class="mt-4 p-2 border border-black rounded hover:border-lime-600">Save changes</button>
              <input type="hidden" id="swiperType" name="swiperType">
              <input type="hidden" id="slideIndex" name="slideIndex">
              <input type="hidden" id="imageName" name="imageName">
              <input type="hidden" id="swiperSource" name="swiperSource">
              <input type="hidden" id="imageType" name="imageType">

            </form>
        </div>
    </div>
  </div>

</html>
<script>
    // Vanilla JavaScript
document.addEventListener('DOMContentLoaded', function () {
    var mySwiper = new Swiper('.mySwiper', {
        // Swiper parameters
        loop: true,
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });
});


$(document).ready(function() {
    // Click event for swiper and brand images
    $('.swiper-slide img, .brand-img').on('click', function() {
        var imageSource = $(this).attr('src').split('/').pop();
        var imageType = $(this).data('type') || 'swiper'; // Default to 'swiper'
        var swiperType = $(this).closest('.swiper').attr('id'); // 'swiperPhone' or 'swiperLarge'

        $('#imageChangeModal').show();
        $('#imageName').val(imageSource);
        $('#imageType').val(imageType); // New input to distinguish the type (swiper or brand)
        $('#swiperType').val(swiperType); // New input to distinguish between 'swiperPhone' and 'swiperLarge'

        console.log('Image Name:', imageSource);
        console.log('Image Type:', imageType);
        console.log('Swiper Type:', swiperType);
    });

    // Assuming you have a close button for the modal
    $('.close-button').on('click', function() {
        $('#imageChangeModal').hide();
    });

    // Stop modal from closing when clicking inside
    $(".custom-modal-content").click(function(e) {
        e.stopPropagation();
    });

    // Close the modal when clicking outside of it
    $("#imageChangeModal").click(function() {
        $(this).hide();
    });

    // Setup CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Save image change
    $('#saveImageChange').on('click', function() {
    var formData = new FormData($('#imageUploadForm')[0]);
    formData.append('imageName', $('#imageName').val());
    formData.append('imageType', $('#imageType').val()); // Swiper or Brand
    formData.append('swiperType', $('#swiperType').val()); // Swiper Phone or Large

    $.ajax({
        url: '/Admin/upload-image',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            // Success Toast Configuration
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 1500, // Timer for success message
                timerProgressBar: true,
            });

            // Success response handling
            if (response.success) {
                Toast.fire({
                    icon: 'success',
                    title: response.success,
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        $('#imageChangeModal').hide(); // Close modal
                        location.reload(); // Refresh page
                    }
                });
            } else if (response.error) { // Error response handling
                Toast.fire({
                    icon: 'error',
                    title: response.error,
                    timer: 3500, // Longer timer for error message
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', xhr.responseText);
        }
    });
});
});



</script>
