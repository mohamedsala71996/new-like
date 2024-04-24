<!-- start Header -->

<nav class="navbar navbar-expand-lg shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ route('webSite.index') }}">
            <span style="color: blue">like</span>
            <span style="color: red">4like</span>
        </a>
        {{-- <a class="navbar-brand fs-1" href="{{ route('webSite.index') }}"><span style="color: blue">like</span><span
        style="color: red">4like</span></a> --}}
        <button class="navbar-toggler navbar-dark bg-dark" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class= "nav-item navbar-nav ms-auto" style=" margin-right:20px">
                @php
                    $user = auth('customer')->user();
                    $subscriptions = $user->subscriptions()->where('status', 'active')->get();
                    $hasActiveSubscription = $subscriptions->isNotEmpty();

                @endphp


                @if (!$hasActiveSubscription)
                    <!-- إذا كان العميل ليس لديه اشتراك نشط -->
                    <a class="nav-link active fs-5 {{ request()->is('subscription') ? 'active' : '' }}" aria-current="page"
                       href="{{ route('subscription') }}">الاشتراك في الباقه</a>
                @endif

                @if ($hasActiveSubscription)
                    <!-- إذا كان العميل لديه اشتراك نشط -->
                    <a class="nav-link active fs-5 {{ request()->is('work*') ? 'active' : '' }}" aria-current="page"
                       href="{{ route('webSite.work.index') }}">بيان العمل</a>
                    <a class="nav-link active fs-5 {{ request()->is('withdrawal*') ? 'active' : '' }}" aria-current="page"
                       href="{{ route('withdrawal.index') }}">السحب</a>
                    <a class="nav-link active fs-5 {{ request()->is('profit*') ? 'active' : '' }}" aria-current="page"
                       href="{{ route('profit.index') }}">الارباح</a>
                @endif
                <li class="nav-item d-lg-block d-none">
                    <a class="nav-link active fs-5 ms-2 me-2"
                       style="color: rgb(209, 209, 209); cursor: auto; margin-left: -1.5rem !important;"
                       aria-current="page" href="#"></a>
                </li>
                 <li class="nav-item d-lg-block d-none">
            <a class="nav-link active fs-5 ms-2 me-2" style="color: rgb(209, 209, 209); cursor: auto"
              aria-current="page" href="#">|</a>
          </li>
                <li class="nav-item">
                    <a class="nav-link active fs-5" aria-current="page" href="{{ route('help.index') }}">المساعده</a>
                </li>
                <li class="nav-item d-lg-block d-none">
                    <a class="nav-link active fs-5 ms-2 me-2"
                       style="color: rgb(209, 209, 209); cursor: auto; margin-left: -1.5rem !important;"
                       aria-current="page" href="#"></a>
                </li>
                 <li class="nav-item d-lg-block d-none">
            <a class="nav-link active fs-5 ms-2 me-2" style="color: rgb(209, 209, 209); cursor: auto"
              aria-current="page" href="#">|</a>
          </li>
                <li class="nav-item">
                    <a class="nav-link active fs-5" aria-current="page" href="{{ route('profit.index') }}">الارباح</a>
                </li>
                <li class="nav-item d-lg-block d-none">
                    <a class="nav-link active fs-5 ms-2 me-2"
                       style="color: rgb(209, 209, 209); cursor: auto; margin-left: -1.5rem !important;"
                       aria-current="page" href="#"></a>
                </li>
                 <li class="nav-item d-lg-block d-none">
            <a class="nav-link active fs-5 ms-2 me-2" style="color: rgb(209, 209, 209); cursor: auto"
              aria-current="page" href="#">|</a>
          </li>
                <li class="nav-item">
                    <a class="nav-link active fs-5" aria-current="page"
                       href="{{ route('invite.index', Auth::guard('customer')->user()->id) }}">رابط
                        الدعوة</a>
                </li>
                <li class="nav-item d-lg-block d-none">
                    <a class="nav-link active fs-5 ms-2 me-2"
                       style="color: rgb(209, 209, 209); cursor: auto; margin-left: -1.5rem !important;"
                       aria-current="page" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="action text-center my-5" href="https://play.google.com/store/apps?hl=ar&gl=US"
                       target="_blank">
                        <button
                            style="background-color: red;padding: 11px 11px;outline: none;border: none;color: white;border-radius: 6px; margin-right:5px">
                            حمل التطبيق الأن
                        </button>
                    </a>
                </li>

            </ul>
               

           
                         

            <div class="part-img">
                <img src="{{ asset('website/assets/user3.jpg') }}"
                     style="width: 36px; height: 36px; border-radius: 50%" alt="" />
            </div>
           <!--  <form method="POST" action="{{ route('logout.customer') }}">
                @csrf-->
                <a href="{{ route('logout.customer')}}" style="color:blue;margin: 20px;">
                    تسجيل الخروج
                    </a>
         <!--   </form>-->
               
        </div>
    </div>
</nav>
<!-- End Header -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        navLinks.forEach(function(navLink) {
            navLink.addEventListener('click', function() {
                navLinks.forEach(function(link) {
                    link.classList.remove('active');
                });
                link.classList.remove('active');
                this.classList.add('active');
            });
        });
    });
</script>
