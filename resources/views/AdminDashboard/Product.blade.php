<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">

    <!-- plugins:css -->
    @include('AdminDashboard/include/link')


</head>


<body style="  font-family: 'Tajawal', sans-serif;">

    @if (session()->has('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3500,
                timerProgressBar: true,
            })

            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}',
            })
        </script>
    @endif

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
                    <div class="col-md-12 grid-margin stretch-card ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Product</h4>
                                <form class="forms-sample" action="StoreProduct" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Titel :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name='title'
                                                        placeholder="Titel">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Price :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="price" class="form-control"
                                                        placeholder="Price">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Category :</label>
                                                <div class="col-sm-9">
                                                    <select style="color: black" class="form-control"
                                                        id="categorySelect" name="category_id"
                                                        onchange="loadSubcategories()" dir="rtl">
                                                        <!-- Categories will be loaded here -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Sub-Category :</label>
                                                <div class="col-sm-9">
                                                    <select style="color: black" class="form-control"
                                                        name="subcategory_id" id="subcategorySelect" dir="rtl">
                                                        <!-- Subcategories will be dynamically loaded here based on the category selection -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Description :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="description" class="form-control"
                                                        placeholder="Description">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Quantity :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="quantity" class="form-control"
                                                        placeholder="Quantity">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Image</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2 text-[#3b3a88]">Submit</button>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 grid-margin stretch-card text-right" dir="rtl">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">جميع المتجات</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>صورة</th>
                                                <th>اسم</th>
                                                <th>السعر</th>
                                                <th>الفئة</th>
                                                <th>الفئة الفرعية</th>
                                                <th>الكمية</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>
                                                        @if (strpos($product->image, 'https://') !== false)
                                                            <img src="{{ $product->image }}?{{ time() }}" alt="Product Image" style="width: 80px; height: 80px;">
                                                        @else
                                                            <img src="{{ asset('Product_img/' . $product->image) }}?{{ time() }}" alt="Product Image" style="width: 80px; height: 80px;">
                                                        @endif
                                                    </td>

                                                    <td>{{ $product->title }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->category->name ?? 'No Category' }}</td>
                                                    <td>{{ $product->subcategory->name ?? 'No Subcategory' }}</td>
                                                    <!-- Assuming there's a 'subcategory' relationship -->
                                                    <td>{{ $product->quantity }}</td>
                                                    <td>
                                                        <button>
                                                            <label class="badge badge-danger">حذف</label>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <!-- The Modal -->
                                                <div id="custom-modal-{{ $product->id }}"
                                                    class="custom-modal hidden p-4 top-0 bottom-0" dir="rtl">
                                                    <div class="custom-modal-content top-[-230px]">
                                                        <div class="content-wrapper ">
                                                            <span class="custom-close-button">&times;</span>
                                                            <form class="updateCategoryForm mt-5"
                                                                data-product-id="{{ $product->id }}">
                                                                @csrf
                                                                <h2 class="text-xl font-bold mb-4">تعديل الفئات الفرعية
                                                                    :</h2>
                                                                <div class="flex items-center mb-4">
                                                                    <label for="newName-{{ $product->id }}"
                                                                        class="font-bold mr-2">الاسم الجديد :</label>
                                                                    <input type="text"
                                                                        id="newName-{{ $product->id }}"
                                                                        name="name"
                                                                        class="form-input rounded border-2 border-gray-300 flex-1 mr-4 p-2 focus:border-[#862d42]"
                                                                        value="{{ $product->title }}">
                                                                </div>
                                                                <div class="flex items-center mb-4">
                                                                    <label for="newDesc-{{ $product->id }}"
                                                                        class="font-bold mr-2">الوصف الجديد :</label>
                                                                    <input type="text"
                                                                        id="newDesc-{{ $product->id }}"
                                                                        name="desc"
                                                                        class="form-input rounded border-2 border-gray-300 flex-1 mr-4 p-2 focus:border-[#862d42]"
                                                                        value="{{ $product->description }}">
                                                                </div>
                                                                <div class="flex items-center mb-4">
                                                                    <label for="newPrice-{{ $product->id }}"
                                                                        class="font-bold mr-2">المبلغ الجديد :</label>
                                                                    <input type="text"
                                                                        id="newPrice-{{ $product->id }}"
                                                                        name="price"
                                                                        class="form-input rounded border-2 border-gray-300 flex-1 mr-4 p-2 focus:border-[#862d42]"
                                                                        value="{{ $product->price }}">
                                                                </div>
                                                                <div class="flex items-center mb-4">
                                                                    <label for="newQt-{{ $product->id }}"
                                                                        class="font-bold mr-2">الكمية الجديدة :</label>
                                                                    <input type="text"
                                                                        id="newQt-{{ $product->id }}"
                                                                        name="quantity"
                                                                        class="form-input rounded border-2 border-gray-300 flex-1 mr-4 p-2 focus:border-[#862d42]"
                                                                        value="{{ $product->quantity }}">
                                                                </div>
                                                                <div class="flex items-center mb-4">
                                                                    <label for="category-{{ $product->id }}"
                                                                        class="font-bold mr-2">الفئة الجديدة :</label>
                                                                    <select
                                                                        class="form-select rounded border-2 border-gray-300 flex-1 mr-4 p-2 category-select"
                                                                        id="category-{{ $product->id }}"
                                                                        data-product-id="{{ $product->id }}"
                                                                        name="category_id">
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}"
                                                                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                                                {{ $category->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="flex items-center mb-4">
                                                                    <label for="subcategory-{{ $product->id }}"
                                                                        class="font-bold mr-2">الفئة الفرعية الجديدة
                                                                        :</label>
                                                                    <select
                                                                        class="form-select rounded border-2 border-gray-300 flex-1 mr-4 p-2 subcategory-select"
                                                                        id="subcategory-{{ $product->id }}"
                                                                        name="subcategory_id"
                                                                        data-selected-subcategory="{{ $product->subcategory_id }}">
                                                                        <!-- Subcategory options will be dynamically loaded here -->
                                                                    </select>
                                                                </div>

                                                                <div class="flex items-center mb-4">
                                                                    <label for="img-{{ $product->id }}"
                                                                        class="font-bold mr-2 ml-4">الصورة الجديدة :
                                                                    </label>
                                                                    <div
                                                                        class="border-2 border-black-800 p-2  rounded ">
                                                                        <input type="file" name="image"
                                                                            id="img-{{ $product->id }}">
                                                                    </div>

                                                                </div>
                                                                <p class="tesxt-sm font-bold text-red-600">
                                                                    ملاحضة ادا اردت فقط تغيير عنصر واحد اترك الاخانات
                                                                    الاخرى كما هي .
                                                                </p>

                                                                <button data-product-id="{{ $product->id }}"
                                                                    type="button"
                                                                    class="saveButton bg-[#862d42] w-[15rem] text-white rounded-3xl h-10 px-5 border border-transparent hover:bg-white hover:text-[#862d42] hover:border-[#862d42] transition duration-500 ease-in-out mt-4">
                                                                    حفظ
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="loader"></div>
                                                    </div>
                                                </div>
                                            @endforeach
                                    </table>
                                    <div class="mt-4">
                                        {{ $products->links() }}
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
    function loadSubcategories() {
        const categoryId = document.getElementById('categorySelect').value;
        // Update the URL to include the correct path if your API is prefixed
        fetch(`/Admin/api/categories/${categoryId}/subcategories`)
            .then(response => response.json())
            .then(subcategories => {
                const subcategorySelect = document.getElementById('subcategorySelect');
                subcategorySelect.innerHTML = ''; // Clear existing options
                subcategories.forEach(subcategory => {
                    const option = new Option(subcategory.name, subcategory.id);
                    subcategorySelect.add(option);
                });
            })
            .catch(error => console.error('Error loading subcategories:', error));
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Update the URL to include the correct path if your API is prefixed
        fetch('/Admin/api/categories')
            .then(response => response.json())
            .then(categories => {
                const categorySelect = document.getElementById('categorySelect');
                categories.forEach(category => {
                    const option = new Option(category.name, category.id);
                    categorySelect.add(option);
                });
                loadSubcategories(); // Load initial subcategories for the first category
            })
            .catch(error => console.error('Error loading categories:', error));
    });
</script>

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
        document.querySelectorAll('.saveButton').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                const productId = this.getAttribute('data-product-id');
                const modal = document.querySelector('#custom-modal-' + productId);
                if (!modal) {
                    console.error('Modal not found for product:', productId);
                    return;
                }
                const modalContent = modal.querySelector('.content-wrapper');
                modalContent.classList.add('blur-content');
                const loader = modal.querySelector('.loader');
                loader.style.display = 'block';

                const nameInput = document.querySelector('#newName-' + productId);
                const descInput = document.querySelector('#newDesc-' + productId);
                const priceInput = document.querySelector('#newPrice-' + productId);
                const quantityInput = document.querySelector('#newQt-' + productId);
                const categorySelect = document.querySelector('#category-' + productId);
                const subcategorySelect = document.querySelector('#subcategory-' + productId);
                console.log('Image Input Selector:', '#img-' + productId);
                const imageInput = document.querySelector('#img-' + productId);
                console.log(imageInput);
                const formData = new FormData();
                formData.append('name', nameInput.value);
                formData.append('desc', descInput.value);
                formData.append('price', priceInput.value);
                formData.append('quantity', quantityInput.value);
                formData.append('category_id', categorySelect.value);
                formData.append('subcategory_id', subcategorySelect.value);

                if (imageInput && imageInput.files.length > 0) {
                    console.log('Appending image:', imageInput.files[0].name);
                    formData.append('image', imageInput.files[0]);
                } else {
                    console.log('No image file selected or input not found');
                }

                // Log for debugging
                console.log('Form Data Prepared:', formData);

                formData.append('_token', document.querySelector('meta[name="csrf-token"]')
                    .getAttribute('content'));

                fetch('ProductUpdate/' + productId, {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Response Data:', data); // Log for debugging

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
                                title: 'تم التحديت بنجاح !'
                            }).then((result) => {
                                window.location.reload();
                            });
                        } else {
                            // Keep the original Toast for error
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                iconColor: 'white',
                                customClass: {
                                    popup: 'colored-toast',
                                },
                                showConfirmButton: false,
                                timer: 3500,
                                timerProgressBar: true,
                            });

                            Toast.fire({
                                icon: 'error',
                                title: 'حدت خطأ حاول مجددا !',
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error); // Log for debugging
                        loader.style.display = 'none';
                        // Keep the original Toast for catch
                        Swal.fire({
                            icon: 'error',
                            title: 'An error occurred.',
                        });
                    });
            });
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.category-select').forEach(categorySelect => {
            const productId = categorySelect.dataset.productId;
            const subcategorySelect = document.querySelector(`#subcategory-${productId}`);

            // Function to load subcategories
            function loadSubcategories() {
                const categoryId = categorySelect.value;
                fetch(
                        `subcategories-for-category/${categoryId}`
                    ) // Make sure this URL and method are correctly set up in your routes/web.php
                    .then(response => response.json())
                    .then(data => {
                        subcategorySelect.innerHTML = ''; // Clear existing options
                        data.forEach(subcategory => {
                            // Determine if this subcategory should be selected
                            const isSelected = subcategory.id == subcategorySelect
                                .getAttribute('data-selected-subcategory');
                            let option = new Option(subcategory.name, subcategory.id,
                                isSelected, isSelected);
                            subcategorySelect.add(option);
                        });
                    });
            }

            // Load subcategories on category select change
            categorySelect.addEventListener('change', loadSubcategories);

            // Initial load of subcategories
            loadSubcategories();
        });
    });
</script>
