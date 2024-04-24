<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App ui kit.">
<meta name="keyword" content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">
<link rel="icon" href="{{ asset('/images/dashboard/like4like.png') }}" type="image/x-icon">
<title>دخول الادمن</title>

<link rel="stylesheet" href="{{asset('/dashboard/assets/css/luno-style.css')}}">

<script src="{{asset('/dashboard/assets/js/plugins.js')}}"></script>
</head>
<body id="layout-1" data-luno="theme-blue">

<div class="wrapper">


<div class="page-body auth px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
<div class="container-fluid">
<div class="row g-0">
<div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center">
<div style="max-width: 25rem;">
<div class="mb-4">

<img src="{{ asset('images/dashboard/like4like.png') }}" alt="Like 4 Like" width="205px" height="250px">
</div>
<div class="mb-5">
<h2 class="color-900">تسجيل دخول المشرف</h2>
</div>
<ul class="list-unstyled mb-5">
<li class="mb-4">
<span class="color-600">Like4Like مرحبًا بك في صفحة تسجيل الدخول الخاصة بشركة </span>
</li>
<li>
<span class="d-block mb-1 fs-4 fw-light">إضافة بسهوله &amp; إدارة خدماتك</span>
<span class="color-600"> Like4Like مرحبًا بك في صفحة تسجيل الدخول الخاصة بشركة </span>
</li>
</ul>
</div>
</div>
<div class="col-lg-6 d-flex justify-content-center align-items-center">
<div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 32rem;">

<form method="POST" action="{{ route('login') }}">
    @csrf
<div class="col-12 text-center mb-5">
<h1>تسجيل دخول</h1>
<span class="text-muted">حرية الوصول إلى لوحة القيادة </span>
</div>

<div class="col-12">
<div class="mb-2">
<label class="form-label">البريد الاكتروني</label>
<input type="email" name="email" class="form-control form-control-lg" placeholder="name@example.com">
</div>
</div>
</br>
<div class="col-12">
<div class="mb-2">
<div class="form-label">
</span>
</div>
<input id="password" name="password" class="form-control form-control-lg" type="password" maxlength="10" placeholder="Enter the password">
</div>
</div>

<div class="col-12 text-center mt-4">
<button  class="btn btn-lg btn-block btn-dark lift text-uppercase" type="submit" title=""> دخول</button >
</div>
</form>

</div>
</div>
</div>
</div>
</div>
<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
<script>
      $(function() {
        $('#password').password()
      })
    </script>
</div>


<script src="{{asset('/dashboard/assets/js/theme.js')}}"></script>


</body>
</html>
