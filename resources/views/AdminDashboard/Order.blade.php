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
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                            aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                            aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('AdminDashboard/include/nav')

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-12 grid-margin stretch-card text-right" dir="rtl">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">جميع الطلبات </h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th> الاسم كامل</th>
                                                <th>العنوان</th>
                                                <th>المدينة</th>
                                                <th>الرقم البريدي</th>
                                                <th> الهاتف</th>
                                                <th> المنتجات</th>
                                                <th> مبلغ الطلبية</th>
                                                <th> الحالة</th>
                                                <th> تاريخ الطلب </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ordersWithProducts as $order)
                                                <tr>
                                                    <td>{{ $order->firstname }} {{ $order->secoundname }}</td>
                                                    <td>{{ $order->adress }}</td>
                                                    <td>{{ $order->city }}</td>
                                                    <td>{{ $order->postalcode }}</td>
                                                    <td>{{ $order->phone }}</td>
                                                    <td>
                                                        <!-- Trigger/Open Modal Button -->
                                                        <button class="modal-open"
                                                            data-modal-target="#custom-modal-{{ $order->id }}">
                                                            <label class="badge badge-success cursor-pointer">
                                                                مشاهدة
                                                            </label>
                                                        </button>
                                                    </td>
                                                    <td>{{ $order->price }} SAR</td>
                                                    <td></td>
                                                    <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>

                                                </tr>
                                                <!-- The Modal -->
                                                <div id="custom-modal-{{ $order->id }}"
                                                    class="custom-modal hidden p-4" dir="rtl">
                                                    <div class="custom-modal-content">
                                                        <div class="content-wrapper">
                                                            <span class="custom-close-button">&times;</span>

                                                            <!-- Swiper Slide -->
                                                            @foreach ($order->products as $product)
                                                                <div class="flex items-center gap-x-2 mb-6 mx-2 mt-2">
                                                                    <img src="{{ asset('Product_img/' . $product->image) }}"
                                                                        class="max-w-20 max-h-16 block"
                                                                        alt="">
                                                                    <span>{{ $product->title }}</span>
                                                                    <span>
                                                                        <span class="text-[#C70039]">
                                                                            السعر :
                                                                        </span>
                                                                        {{ $product->price }}
                                                                    </span>
                                                                    <span>
                                                                        <span class="text-[#C70039]">
                                                                            الكمية :
                                                                        </span>
                                                                        {{ $product->quantity }}
                                                                    </span>
                                                                </div>
                                                                <hr>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="mt-4">
                                        {{-- {{ $categories->links() }} --}}
                                    </div>

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

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.modal-open').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var modalId = this.getAttribute('data-modal-target');
                var modal = document.querySelector(modalId);
                if (modal) {
                    console.log('Opening modal:', modalId);
                    modal.style.display = "block";
                    document.body.style.overflow = 'hidden'; // Disable scrolling
                } else {
                    console.error('Modal not found:', modalId);
                }
            });
        });

        document.querySelectorAll('.custom-close-button').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var modal = this.closest('.custom-modal');
                if (modal) {
                    modal.style.display = "none";
                    document.body.style.overflow = ''; // Enable scrolling
                }
            });
        });

        window.addEventListener('click', function(event) {
            if (event.target.classList.contains('custom-modal')) {
                event.target.style.display = "none";
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Document loaded.');

        document.querySelectorAll('.saveButton').forEach(button => {
            console.log('Attaching event listener to button:', button);
            button.addEventListener('click', function() {

                console.log('Save button clicked.');
                const categoryId = this.getAttribute('data-category-id');
                console.log('Category ID:', categoryId);

                const modal = document.querySelector('#custom-modal-' + categoryId);
                const modalContent = modal.querySelector(
                    '.content-wrapper'); // Adjust selector as needed
                modalContent.classList.add('blur-content');
                const loader = modal.querySelector('.loader');
                loader.style.display = 'block';

                const input = document.querySelector('#newName-' + categoryId);
                console.log('Input value:', input.value);

                const formData = new FormData();
                formData.append('name', input.value);
                formData.append('_token',
                    '{{ csrf_token() }}'); // Ensure CSRF token is correct

                console.log('Attempting to send data to server...');

                // Adjust the URL to match your actual update route
                fetch('CategoryUpdate/' + categoryId, {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                iconColor: 'white',
                                customClass: {
                                    popup: 'colored-toast',
                                },
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                            });

                            Toast.fire({
                                icon: 'success',
                                title: 'تم التحديت بنجاح !' // or use data.message if your API returns a specific message
                            }).then((result) => {
                                // This function runs after the toast disappears
                                window.location.reload(); // Refresh the page
                            });
                        }
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                        alert('حدت خطأ مفاجئ !');
                    });
            });
        });
    });
</script>
