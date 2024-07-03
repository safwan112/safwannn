<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">

    <!-- plugins:css -->
    @include('AdminDashboard/include/link')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>


<body style="  font-family: 'Tajawal', sans-serif; text-align:right !important" >
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
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
                            <img src="{{asset('img/log.png')}}" alt="profile" />
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

            @include('AdminDashboard/include/nav')

            <!-- partial -->
            <div class="main-panel" dir="rtl">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold mt-4 mr-4">
                                        مرحبا بك ايها المدير في متجرك
                                    </h3>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12 grid-margin transparent">
                            <div class="row">
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card custom-shadow">
                                        <div style="display: flex; align-items: center; justify-content: space-between;">
                                            <div style="width: 20%; display:flex;justify-content:center" class="mr-2 bg-blue-300 py-[0.9rem] rounded">
                                                <i class="fa-solid fa-cart-shopping text-blue-800" style="font-size: 24px;"></i>
                                            </div>
                                            <div class="card-body mr-2" style="text-align: right; width:80%">
                                                <p class="mb-4">عدد الطلبيات</p>
                                                <p class="fs-30 mb-2 font-bold">{{$ordersThisMonthCount}}</p>
                                                <p>
                                                    نتائج
                                                    (30 يوم)
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card custom-shadow">
                                        <div style="display: flex; align-items: center; justify-content: space-between;">
                                            <div style="width: 20%; display:flex;justify-content:center" class="mr-2 bg-green-300 py-[0.9rem] rounded">
                                                <i class="fa-solid fa-money-bill-trend-up text-green-800" style="font-size: 24px;"></i>
                                            </div>
                                            <div class="card-body mr-2" style="text-align: right; width:80%">
                                                <p class="mb-4">اجمالي الارباح</p>
                                                <p class="fs-30 mb-2 font-bold">{{$sumOfPricesThisMonth}} ريال</p>
                                                <p>
                                                    نتائج
                                                    (30 يوم)
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card custom-shadow">
                                        <div style="display: flex; align-items: center; justify-content: space-between;">
                                            <div style="width: 20%; display:flex;justify-content:center" class="mr-2 bg-yellow-300 py-[0.9rem] rounded">
                                                <i class="fa-solid fa-bag-shopping text-yellow-700" style="font-size: 24px;"></i>
                                            </div>
                                            <div class="card-body mr-2" style="text-align: right; width:80%">
                                                <p class="mb-4">عدد المنتجات</p>
                                                <p class="fs-30 mb-2 font-bold">{{$totalProductsCount}}</p>
                                                <p>
                                                    نتائج
                                                    حالية
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card custom-shadow">
                                        <div style="display: flex; align-items: center; justify-content: space-between;">
                                            <div style="width: 20%; display:flex;justify-content:center" class="mr-2 bg-red-300 py-[0.9rem] rounded">
                                                <i class="fa-solid fa-user text-red-800" style="font-size: 24px;"></i>
                                            </div>
                                            <div class="card-body mr-2" style="text-align: right; width:80%">
                                                <p class="mb-4">عدد العملاء</p>
                                                <p class="fs-30 mb-2 font-bold">{{$totalUserCount}}</p>
                                                <p>
                                                    نتائج
                                                    حالية
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">مبيان لمبلغ المبيعات اسبوعيا</p>

                                    <canvas id="weeklySalesChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title">مبيان لعدد الطلبات اسبوعيا</p>
                                    </div>
                                    <canvas id="weeklyOrdersChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title mb-0">اكتر المنتجات مبيعا</p>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>صورة المنتج</th>
                                                    <th>عنوان المنتج</th>
                                                    <th>سعر المنتج</th>
                                                    <th class="flex justify-center items-center">عدد المبيعات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($topSellingProducts as $product)
                                                <tr>
                                                    <td>
                                                        @if (strpos($product->image, 'https://') !== false)
                                                            <img src="{{ $product->image }}?{{ time() }}" alt="Product Image" style="width: 80px; height: 80px;">
                                                        @else
                                                            <img src="{{ asset('Product_img/' . $product->image) }}?{{ time() }}" alt="Product Image" style="width: 80px; height: 80px;">
                                                        @endif
                                                    </td>
                                                    <td class="font-semibold">{{ $product->title }}</td>
                                                    <td class="font-semibold">{{ $product->price }} ريال</td>
                                                    <td class="flex justify-center items-center h-full mt-2">
                                                        <span class="inline-flex items-center py-1.5 px-3 rounded-full text-md bg-teal-500 text-white font-semibold">{{ $product->sales }}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    @include('AdminDashboard/include/js')

</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('weeklySalesChart').getContext('2d');
        var weeklySalesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($salesData['days']),
                datasets: [{
                    label: 'مبلغ المبيعات اليومية',
                    data: @json($salesData['sales']),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y', // This will make the chart horizontal
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('weeklyOrdersChart').getContext('2d');
            var weeklyOrdersChart = new Chart(ctx, {
                type: 'bar', // This time we're using a vertical bar chart
                data: {
                    labels: @json($orderData['days']),
                    datasets: [{
                        label: 'Daily Orders',
                        data: @json($orderData['orders']),
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
        </script>
