<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{asset('admin-assets/vendor/fontawesome-free/css/all.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="{{ asset('admin-assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <title>Galeria arte Enmanuel-Admin</title>
</head>
<body>

    @yield('content')

    <script src="{{asset('js/logins.js')}}"></script>
<!-- Bootstrap JavaScript-->
<script src="{{asset('admin-assets/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin-assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('admin-assets/js/sb-admin-2.min.js')}}"></script>
</body>
</html>
