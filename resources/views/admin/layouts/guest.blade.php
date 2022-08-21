<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Angry Commerce - admin login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard_assets/') }}./images/favicon.png">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    @vite(['public/dashboard_assets/css/style.css'])
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            @yield('content')
        </div>
    </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('dashboard_assets') }}/vendor/global/global.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('dashboard_assets') }}/js/deznav-init.js"></script>
    <script src="{{ asset('dashboard_assets') }}/js/custom.min.js"></script>
</body>

</html>
