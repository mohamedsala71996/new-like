    <!--Start Footer-->
    <footer style="background: #263238;color: white; padding: 30px; margin-top: 30px;">
        <div class="row justify-content-center w-100">
            <section style="margin-bottom:30px ;" class="col-md-4 col-12 align-self-center">
                <h1 class="navbar-brand fs-1" href="#"><span
                        style="color: blue; font-weight: bold;">like</span><span
                        style="color: red;font-weight: bold;">4like</span></h1>
                <h4>تابعنا</h4>
                <div class="font-asm d-flex" style="margin-top: 40px">
                    <ul class="list-inline">
                        @foreach (\App\Models\Social::get() as $link)
                        <li class="list-inline-item"><a href="{{ $link->link }}"><i class="fa-brands fa-{{$link->site_name }}" ></i></a></li>
                        @endforeach
                    </ul>
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
  <script src="js/popper.min.js"></script>
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/index.js"></script>
  <!--End Footer-->
