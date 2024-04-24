<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/normalize.css" />
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/all.css" />
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/all.min.css" />
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/bootstrap.css">
    <title>Login Page</title>
</head>

<body>

    <!-- start Header -->
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-white position-fixed w-100 top-0"
        style="z-index: 100;box-shadow: 0px 4px 8px 0px #ABBED166;">
        <div class="container">
            <a class="navbar-brand fs-1" href="#"><span style="color: blue">like</span><span
                    style="color: red">4like</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style=" padding-right: 75%; ">
              <a href="{{route('Signup.customer')}}"> <button type="button"  style="
              background-color: red;
              outline: none;
              color: white;
              border: none;
              padding: 5px 20px;">
                    انشاء حساب
                </button></a>
            </div>
        </div>
    </nav> --}}

    <nav class="navbar navbar-expand-lg  navbar-light bg-white  w-100 top-0 shadow"
        >
        <div class="container d-flex justify-content-between">
            <div>
                <a class="navbar-brand fs-1" href="#"><span style="color: blue">like</span><span
                    style="color: red">4like</span></a>
            </div>

            <div class="navbar" id="navbarSupportedContent" >
                <a href="{{route('Signup.customer')}}">
                <button type="button"  class="btn btn-primary">
                    انشاء حساب
                </button></a>
            </div>
        </div>
    </nav>
    <!-- End Header -->

    <!--Start Body-->
    <div class="w-100 d-flex justify-content-center align-items-center flex-column"
        >

        <form method="POST" action="{{route('Signin')}}"  class="py-5 my-4 text-center  rounded shadow form w-50 ">
            <h1 class="h3 mb-4 ">تسجيل دخول </h1>
            @csrf
            <input name="email" type="text" placeholder="البريد الالكتروني" class="form-control my-2 w-75 mx-auto">
            @error('email')
                <div class="alert alert-danger  w-75 mx-auto">{{ $message }}</div>
            @enderror
            <input name="password" type="password" placeholder="كلمة السر" class="form-control my-2 w-75 mx-auto">
            @error('password')
                <div class="alert alert-danger  w-75 mx-auto">{{ $message }}</div>
            @enderror
            <button type="submit"class="btn btn-outline-primary my-2">دخول</button>
            <br>
            <a href="{{route('forgetPassword')}}" class="btn btn-sm btn-block"> نسيت كلمه المرور </a>
        </form>
    </div>
    <!--End Body-->

    <!--js files-->
    <script src="{{url('/')}}/website/assets/js/popper.min.js"></script>
    <script src="{{url('/')}}/website/assets/js/jquery-3.7.1.min.js"></script>
    <script src="{{url('/')}}/website/assets/js/bootstrap.js"></script>
    <script src="{{url('/')}}/website/assets/js/index.js"></script>
</body>

</html>
