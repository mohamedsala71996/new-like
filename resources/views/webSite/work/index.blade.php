@extends('layouts.site.app')

@section('content')
    <!-- تنبيه -->
    <div class="alert alert-info custom-alert show fade" role="alert">
        <strong>ملاحظة:</strong> تتم مراجعة لقطات الشاشة من قبل الإدارة، وفي حال اكتشاف لقطة شاشة غير صحيحة سيتم إلغاء
        الاشتراك مباشرة. تتم عملية المراجعة بمدة تصل إلى 72 ساعة.
    </div>
    <div class="container">
    @if($promotionalVideos->count() > 0)
        <div class="row my-5">
        <div class="video-slide-photo mt-3 mb-3">
          <div class="container">           
            <div class="row">
              <div class="col-lg-12">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    @php $count = 0;@endphp
                    @foreach($promotionalVideos as $promotionalVideo)
                    @php $count++;@endphp
                    @if($count == 1)
                    <div class="carousel-item active">
                      <video id="firstVideo"  src="{{'https://newlike.labs1.online/public/'.$promotionalVideo->video}}" class="w-100 d-block" autoplay muted  ></video>
                    </div>
                    @else
                    <div class="carousel-item">
                      <video src="{{'https://newlike.labs1.online/public/'.$promotionalVideo->video}}" class="w-100 d-block"  autoplay muted controls ></video>
                    </div>               
                    @endif
                    @endforeach
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        @endif       
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                <div class="w-50 p-2 mx-auto shadow" id="flink">                    
                    <a href="{{ route('facebook') }}"  class="">
                        <img src="{{ url('/') }}/website/assets/work/facebook.jfif" style="cursor: pointer"
                            class="w-100" alt="">
                    </a>                  
                               
                </div>
            </div>
            <div class="col-md-6">
                <div class="w-50 p-2 mx-auto shadow" id="ylink">
                    <a href="{{ route('youtube') }}"  class="">
                        <img src="{{ url('/') }}/website/assets/work/youtube.jfif" style="cursor: pointer"
                            class="w-100" alt="">
                    </a>
                </div>
            </div>
        </div>


    </div>
@endsection

<style>
    .custom-alert {
        background-color: #cce5ff;
        color: #004085;
        border-color: #b8daff;
        border-radius: 5px;
        padding: 15px;
        animation: slideInDown 0.5s ease-in-out;
    }

    @keyframes slideInDown {
        0% {
            transform: translateY(-100%);
            opacity: 0;
        }

        100% {
            transform: translateY(0%);
            opacity: 1;
        }
    }
</style>
@push('scripts')
@if($promotionalVideos->count() > 0)
<script> 
document.addEventListener('DOMContentLoaded', function() {   
    var faceLink = document.getElementById("flink");
    var youtubeLink = document.getElementById("ylink");
    faceLink.style.display = "none";
    youtubeLink.style.display = "none";
    // Enable the link after 60 seconds
    setTimeout(function() {
        faceLink.style.display = ""; // Remove the onclick handler to enable the link
        youtubeLink.style.display = "";
    }, 20000); // 60 seconds in milliseconds
});    
</script>
@endif
@endpush
