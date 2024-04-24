<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome Page</title>
    <link rel="stylesheet" href="{{ url('/') }}/website/assets/css/normalize.css" />
    <link rel="stylesheet" href="{{ url('/') }}/website/assets/css/all.css" />
    <link rel="stylesheet" href="{{ url('/') }}/website/assets/css/all.min.css" />
    <link rel="stylesheet" href="{{ url('/') }}/website/assets/css/bootstrap.css">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;1,400&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ url('/') }}/website/assets/css/main.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <!-- start Header -->
    <nav class="navbar navbar-expand-lg  navbar-light bg-white  w-100 top-0 shadow">
        <div class="container  d-flex justify-content-between">
            <a class="navbar-brand fs-1" href="#"><span style="color: blue">like</span><span
                    style="color: red">4like</span>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a href="{{ route('Signin.customer') }}">
                <button type="button" class="btn btn-primary">
                    تسجيل الدخول
                </button></a>
        </div>
        </div>
    </nav>
    <!-- End Header -->

    <!-- start Profits-->
    <div class="landing-parent px-4">
        <div class="landing-img"></div>
    </div>
    <!-- End Landing Page -->
    <!-- start Profits-->
    <div class="profits container py-3">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="parent" style="height: 500px">
                    <img src="{{ asset('website/assets/profits.jpg') }}" style="width: 100%; height: 100%"
                        alt="" />
                </div>
            </div>
            <div class="col-md-6 col-sm-12 ps-md-5">
                <div class="parent-text d-flex justify-content-center">
                    <div class="text mt-5" style="max-width: 350px">
                        <h1 style="font-size: 55px; font-weight: bold">
                            <span style="color: blue">like</span><span style="color: red">4like</span> لتحقيق الأرباح
                        </h1>
                        <ul style="font-size: 24px; margin-top: 40px">
                            <li>لنبدأ في كسب المال</li>
                            <li>جعل العمل أسهل</li>
                        </ul>
                        <a class="action text-center my-5" href="{{ route('Signup.customer') }}">
                            <button
                                style="background-color: red;padding: 7px 55px;outline: none;border: none;color: white;border-radius: 6px;font-size: 24px;">
                                انضم الينا
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Profits-->
    <!--Start Footer-->
    <footer style="background: #263238;color: white; padding: 30px; margin-top: 30px;">
        <div class="row justify-content-center w-100">
            <section style="margin-bottom:30px ;" class="col-md-4 col-12 align-self-center">
                <h1 class="navbar-brand fs-1" href="#"><span
                        style="color: blue; font-weight: bold;">like</span><span
                        style="color: red;font-weight: bold;">4like</span></h1>
                <h4>تابعنا</h4>
                <div class="font-asm d-flex" style="margin-top: 40px">
                    @foreach (\App\Models\Social::get() as $link)
                        <a href="{{ $link->link }}" target="_blank" class="social-link">
                            <i style="padding: 10px;" class="fab fa-{{ strtolower($link->site_name) }} fa-lg"></i>

                        </a>
                    @endforeach
                </div>
            </section>
            <section class="col-md-4 col-12 align-self-center">
                <h1
                    style="font-family: Poppins;
        font-size: 24px;
        font-weight: 600;
        line-height: 36px;
        letter-spacing: 0em;
        text-align: left;
        ">
                    جهات الاتصال</h1>
                <p
                    style="font-family: Poppins;
        font-size: 15px;
        font-weight: 400;
        line-height: 23px;
        letter-spacing: 0em;
        text-align: left;
        ">
                    العنوان: 4-5 الطريق الرئيسي، دلهي</p>
                <p
                    style="font-family: Poppins;
        font-size: 15px;
        font-weight: 400;
        line-height: 23px;
        letter-spacing: 0em;
        text-align: left;
        ">
                    البريد الالكتروني : educare@gmail.com</p>
                <p
                    style="font-family: Poppins;
        font-size: 15px;
        font-weight: 400;
        line-height: 23px;
        letter-spacing: 0em;
        text-align: left;
        ">
                    رقم الموبيل : +٩١٤٥٣٣٤٣٣٢٦٥</p>
            </section>
        </div>
    </footer>
    <!--End Footer-->
    <!--js files-->
    <script src="{{ url('/') }}/website/assets/js/popper.min.js"></script>
    <script src="{{ url('/') }}/website/assets/js/jquery-3.7.1.min.js"></script>
    <script src="{{ url('/') }}/website/assets/js/bootstrap.js"></script>
    <script src="{{ url('/') }}/website/assets/js/index.js"></script>
</body>

</html>
