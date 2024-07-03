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
           <div class="m-10">
            <form action="{{ route('admin.scrape') }}" method="POST">
                @csrf
                <h3 class="mb-6">From www.asrar-co.com</h3>
                <button type="submit" class="btn btn-primary">Start Scraping</button>
            </form>
           </div>
           <div class="m-10">
            <form action="{{ route('admin.scrape-products') }}" method="POST">
                @csrf
                <h3 class="mb-6">From unitedpharmacy.sa</h3>
                <button type="submit" class="btn btn-primary">Scrape Products</button>
            </form>
           </div>

        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    @include('AdminDashboard/include/js')

</body>


</html>
