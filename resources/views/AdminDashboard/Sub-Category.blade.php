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
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Sub-Category</h4>
                                <form class="forms-sample ml-6" action="StoreSubCategory" method="post">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Name
                                            :</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="exampleInputUsername2"
                                                placeholder="Name" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Category
                                            :</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="exampleSelectGender" name="category">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
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
                                <h4 class="card-title">جميع الفئات الفرعية</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>الاسم</th>
                                                <th>الفئة</th>
                                                <th>عدد المنتجات</th>
                                                <th>تاريخ الإنشاء</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subcategories as $subcategory)
                                            <tr>
                                                <td>{{ $subcategory->name }}</td>
                                                <td>{{ $subcategory->category->name ?? 'Category not found' }}</td>
                                                <td>{{ $subcategory->products_count }}</td>
                                                <td>{{ $subcategory->created_at->format('H:i:s Y-m-d') }}</td>
                                                <td>
                                                    <button class="modal-open" data-modal-target="#custom-modal-{{ $subcategory->id }}">
                                                        <label class="badge badge-warning cursor-pointer">تعديل</label>
                                                    </button>
                                                    <button>
                                                        <label class="badge badge-danger">حذف</label>
                                                    </button>
                                                </td>
                                            </tr>
                                            <!-- The Modal -->
                                            <div id="custom-modal-{{ $subcategory->id }}" class="custom-modal hidden p-4" dir="rtl">
                                                <div class="custom-modal-content">
                                                    <div class="content-wrapper">
                                                        <span class="custom-close-button">&times;</span>
                                                        <form class="updateCategoryForm mt-5" data-subcategory-id="{{ $subcategory->id }}">
                                                            @csrf
                                                            <h2 class="text-xl font-bold mb-4">تعديل الفئات الفرعية :</h2>
                                                            <div class="flex items-center mb-4">
                                                                <label for="newName-{{ $subcategory->id }}" class="font-bold mr-2">الاسم الجديد :</label>
                                                                <input type="text" id="newName-{{ $subcategory->id }}" name="name" class="form-input rounded border-2 border-gray-300 flex-1 mr-4 p-2 focus:border-[#862d42]" value="{{ $subcategory->name }}">
                                                            </div>
                                                            <div class="flex items-center mb-4">
                                                                <label for="newcategory-{{ $subcategory->id }}" class="font-bold mr-2">الفئة الجديدة :</label>
                                                                <select class="form-select rounded border-2 border-gray-300 flex-1 mr-4 p-2" id="newcategory-{{ $subcategory->id }}" name="category">
                                                                    @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}" {{ $subcategory->categoryId == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <button data-subcategory-id="{{ $subcategory->id }}" type="button" class="saveButton bg-[#862d42] w-[15rem] text-white rounded-3xl h-10 px-5 border border-transparent hover:bg-white hover:text-[#862d42] hover:border-[#862d42] transition duration-500 ease-in-out mt-4">
                                                                حفظ
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="loader"></div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="mt-4">
                                        {{ $subcategories->links() }}
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
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent form submission for debugging

                console.log('Save button clicked.');
                const subcategoryId = this.getAttribute('data-subcategory-id');
                console.log('Subcategory ID:', subcategoryId);

                const modal = document.querySelector('#custom-modal-' + subcategoryId);
                if (!modal) {
                    console.error('Modal not found for subcategory:', subcategoryId);
                    return;
                }
                const modalContent = modal.querySelector('.content-wrapper');
                modalContent.classList.add('blur-content');
                const loader = modal.querySelector('.loader');
                loader.style.display = 'block';

                const nameInput = document.querySelector('#newName-' + subcategoryId);
                const categorySelect = document.querySelector('#newcategory-' + subcategoryId);
                console.log('Input values:', nameInput.value, categorySelect.value);

                const formData = new FormData();
                formData.append('name', nameInput.value);
                formData.append('category', categorySelect.value);
                formData.append('_token', '{{ csrf_token() }}');

                fetch('SubCategoryUpdate/' + subcategoryId, {
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
                    // Handle errors
                });
            });
        });
    });
    </script>
