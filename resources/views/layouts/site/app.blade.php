<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{asset('')}}/website/assets/css/normalize.css" /> --}}
    <link rel="stylesheet" href="{{asset('website/assets/css/normalize.css')}}"/>
    <link rel="stylesheet" href="{{asset('website/assets/css/all.css')}}"/>
    <link rel="stylesheet"href="{{asset('website/assets/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('website/assets/css/normalize.css')}}" />
    <link rel="stylesheet" href="{{asset('website/assets/css/all.css')}}"/>
    <link rel="stylesheet" href="{{asset('website/assets/css/all.min.css')}}"/>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;1,400&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('path/to/dropify.min.css') }}">
    <link rel="stylesheet" href="{{asset('website/assets/css/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('website/assets/css/slidevideo.css')}}"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>   
    {{-- <style>
        .navbar-nav .nav-link {
            color: black !important;
            font-weight: 400
        }

        .navbar-nav .nav-link:hover {
            color: red !important;
        }

        .navbar-nav .nav-link.active {
            color: rgb(195, 30, 9) !important;
            border-bottom: 3px solid red;
        }

    </style> --}}
   
    <script src="{{ asset('path/to/dropify.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>الرئيسية</title>
</head>

<body>


    @include('webSite.include.header')

    @yield('content')

    @include('webSite.include.footer')
    <!--js files-->
    <script src="{{ asset('website/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('website/assets/js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{ asset('website/assets/js/bootstrap.js')}}"></script>
    <script src="{{ asset('website/assets/js/index.js')}}"></script>
    <script src="{{ asset('website/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('website/assets/js/all.min.js')}}"></script>
     @stack('scripts')
</body>

</html>
