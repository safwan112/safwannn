<title>Ghoyom Dash</title>

<link rel="stylesheet" href="{{ asset('AdminDash/vendors/feather/feather.css') }}">
<link rel="stylesheet" href="{{ asset('AdminDash/vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('AdminDash/vendors/css/vendor.bundle.base.css') }}">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset('AdminDash/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('AdminDash/vendors/ti-icons/css/themify-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('AdminDash/js/select.dataTables.min.css') }}">
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="{{ asset('AdminDash/css/vertical-layout-light/style.css') }}">
<!-- endinject -->
<link rel="shortcut icon" href="{{ asset('img/log.png') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.tailwindcss.com"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>


<style>
    .colored-toast.swal2-icon-success {
        background-color: #a5dc86 !important;
    }

    .colored-toast.swal2-icon-error {
        background-color: #f27474 !important;
    }

    .colored-toast.swal2-icon-warning {
        background-color: #f8bb86 !important;
    }

    .colored-toast.swal2-icon-info {
        background-color: #3fc3ee !important;
    }

    .colored-toast.swal2-icon-question {
        background-color: #87adbd !important;
    }

    .colored-toast .swal2-title {
        color: white;
    }

    .colored-toast .swal2-close {
        color: white;
    }

    .colored-toast .swal2-html-container {
        color: white;
    }

    /* The Custom Modal (background) */
    .custom-modal {

        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 2;
        /* Sit on top */
        left: 8%;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Custom Modal Content */
    .custom-modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        /* 15% from the top and centered */
        padding: 20px;
        position: relative;
        border: 1px solid #888;
        width: 60%;
        /* Could be more or less, depending on screen size */
        border-radius: 20px;
        /* Example of adding border-radius */
    }

    /* The Custom Close Button */
    .custom-close-button {
        color: #aaa;
        float: left;
        font-size: 28px;
        font-weight: bold;
    }

    .custom-close-button:hover,
    .custom-close-button:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .body-no-scroll {
        overflow: hidden;
    }

    .loader {
        display: none;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        position: absolute;
        top: 35%;
        left: 45%;
        transform: translate(-50%, -50%);
        z-index: 2;
        /* Ensures it's above other content in the modal */
        -webkit-animation: spin 2s linear infinite;
        /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
    .blur-content {
    filter: blur(8px);
}
.content-wrapper
{
    padding: 10px;
    background-color: white;
}
.custom-shadow
{
    box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;
}
.custom-modal {
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
}

.custom-modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 25rem;
  
}

.close-button {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close-button:hover,
.close-button:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

</style>
