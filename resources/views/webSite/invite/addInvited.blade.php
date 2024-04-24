<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/') }}/website/assets/css/normalize.css" />
    <link rel="stylesheet" href="{{ url('/') }}/website/assets/css/all.css" />
    <link rel="stylesheet" href="{{ url('/') }}/website/assets/css/all.min.css" />
    <link rel="stylesheet" href="{{ url('/') }}/website/assets/css/bootstrap.css">
    <title>Signup Page</title>
</head>
<body>
    <!-- start Header -->
    <nav class="navbar navbar-expand-lg  navbar-light bg-white  w-100 top-0 shadow">
        <div class="container d-flex justify-content-between">
            <div>
                <a class="navbar-brand fs-1" href="#"><span style="color: blue">like</span><span
                        style="color: red">4like</span></a>
            </div>
            <div class="navbar" id="navbarSupportedContent">
                <a href="{{ route('Signin.customer') }}">
                    <button type="button" class="btn btn-danger">
                        تسجيل الدخول
                    </button></a>
            </div>
        </div>
    </nav>
    <!-- End Header -->
    <!--Start Body-->
    <div class="w-100 d-flex justify-content-center align-items-center flex-column">
        <form method="POST" action="{{ route('invite.store', $id) }}" enctype="multipart/form-data"
            class="py-5 my-4 text-center  rounded shadow form w-50 ">
            @csrf
            <h1 class="h3 mb-4 "> انشاء حساب</h1>
            <input name="name" value="{{ old('name') }}" type="text" placeholder="الاسم "
                class="form-control my-2 w-75 mx-auto">
            @error('name')
                <div class="alert alert-danger  w-75 mx-auto">{{ $message }}</div>
            @enderror
            <input name="email" value="{{ old('email') }}" type="text" placeholder="البريد الالكتروني"
                class="form-control my-2 w-75 mx-auto">
            @error('email')
                <div class="alert alert-danger  w-75 mx-auto">{{ $message }}</div>
            @enderror
            <input name="phone_number" value="{{ old('phone_number') }}" type="text" placeholder="رقم الهاتف"
                class="form-control my-2 w-75 mx-auto">
            @error('phone_number')
                <div class="alert alert-danger  w-75 mx-auto">{{ $message }}</div>
            @enderror
            <input name="password" type="password" placeholder="الرقم السري" class="form-control my-2 w-75 mx-auto">
            @error('password')
                <div class="alert alert-danger  w-75 mx-auto">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-outline-danger my-2">انشاء حساب</button>
        </form>
    </div>
    <!--End Body-->
    <!--js files-->
    <script src="{{ url('/') }}/website/assets/js/popper.min.js"></script>
    <script src="{{ url('/') }}/website/assets/js/jquery-3.7.1.min.js"></script>
    <script src="{{ url('/') }}/website/assets/js/bootstrap.js"></script>
    <script src="{{ url('/') }}/website/assets/js/index.js"></script>
</body>
</html>
