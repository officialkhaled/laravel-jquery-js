<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Laravel X jQuery</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        .opacity-25 {
            opacity: 25%;
        }

        .opacity-50 {
            opacity: 50%;
        }

        .opacity-75 {
            opacity: 75%;
        }

        .btn {
            font-weight: bold;
        }

        .btn-primary, .btn-warning, .btn-info, .btn-danger, .btn-secondary, .btn-success {
            color: #fff !important;
        }

        .btn-primary:hover {
            background-color: #025197 !important;
        }

        .waves-effect {
            position: relative;
            cursor: pointer;
            display: inline-block;
            overflow: hidden;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
        }

        .bg-gradient {
            background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.192), rgba(255, 255, 255, 0)) !important;
        }

        .btn-success {
            background-color: #5CB85C !important;
            border-color: #5CB85C !important;
        }

        .btn-success:hover {
            background-color: #367c36 !important;
            border-color: #367c36 !important;
        }

        .btn-warning {
            background-color: #F0AD54 !important;
            border-color: #F0AD54 !important;
        }

        .btn-warning:hover {
            background-color: #d38012 !important;
            border-color: #d38012 !important;
        }

        .btn-danger {
            background-color: #D9534F !important;
            border-color: #D9534F !important;
        }

        .btn-danger:hover {
            background-color: #a72925 !important;
            border-color: #a72925 !important;
        }

        .btn-info {
            background-color: #61BDE5 !important;
            border-color: #61BDE5 !important;
        }

        .btn-info:hover {
            background-color: #2094c5 !important;
            border-color: #2094c5 !important;
        }

        .btn-pdf {
            background-color: #C14643 !important;
            border-color: #C14643 !important;
        }

        .btn-pdf:hover {
            background-color: #862e2d !important;
            border-color: #862e2d !important;
        }

        .btn-excel {
            background-color: #5CB85C !important;
            border-color: #5CB85C !important;
        }

        .btn-excel:hover {
            background-color: #367c36 !important;
            border-color: #367c36 !important;
        }

        .btn-primary {
            background-color: #0275D8 !important;
            border-color: #0275D8 !important;
        }

        .btn-primary:hover {
            background-color: #01447e !important;
            border-color: #01447e !important;
        }

        .btn-refresh {
            background-color: #F0AD4E !important;
            border-color: #F0AD4E !important;
        }

        .btn-refresh:hover {
            background-color: #d38312 !important;
            border-color: #d38312 !important;
        }
    </style>

    @yield('styles')
</head>
<body>

<div class="mt-2">
    @include('skeleton.header')
</div>

<div class="container">
    @yield('content')
</div>

<div>
    @include('skeleton.footer')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": false
    };

    function previewAvatar(event) {
        const input = event.target;
        const preview = document.getElementById('avatar_preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function pageRefresh() {
        window.location.reload();
    }
</script>

@yield('scripts')

</body>
</html>
