@extends('layouts.site.app')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font Awesome CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Your custom style -->
    <link rel="stylesheet" href="{{asset('css/thestyle.css')}}">
    <!-- تضمين مكتبة jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- تضمين مكتبة Bootstrap الأساسية -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
   
   
    <title>Home Page</title>
    </head>

    <body>
        <?php
     


        ?>
    <!-- start Header -->
    <!-- End Header -->
        <div class="row no-gutters">
        <div id="firstCarousel" class="carousel slide ">
            <div>
                @foreach($p1 as $slider)
                    @if ($slider->status == 1)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-interval="{{$slider->second * 1000}}">
                            <a href="{{ $slider->url }}" target="_blank">
                                <img class="d-block mx-auto w-100" src="{{ asset('images/dashboard/adds/'.$slider->attachment) }}" alt="Slider Image">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#firstCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#firstCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div id="secondCarousel" class="carousel slide ">
            <div>
                @foreach($p2 as $slide)
                    @if (  $slide->status == 1)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-interval="{{$slide->second * 1000}}">
                            <a href="{{ $slide->url }}" target="_blank">
                                <img class="d-block mx-auto w-100" src="{{ asset('images/dashboard/adds/'.$slide->attachment) }}" alt="Slider Image">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#secondCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#secondCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
          

                </div>

       <div class="row no-gutters">

                @foreach($p3 as $slid)
                    @if ( $slid->status == 1)
                 <div class="col-6 no-gutters">
                        <div class="btn1" style=" margin-inline-end:-24px ;">
                            <a  href="{{$slider->url}}" style="background-color: {{$slid->color}}; display: flex;"> 
                            <span > <img style="width: 100%; height: 20px;"  src="{{ asset('images/dashboard/adds/'.$slid->attachment) }}"  alt="{{$slid->company_name}}">                                </span>
                                {{$slid->company_name}}
                            </a>
                        </div>
                    </div>
                    @endif
                @endforeach
 </div>
    </div>


        <div class="row no-gutters">

    <div id="carouselExampleControls3" class="carousel slide container" data-ride="carousel" >
    <div class="carousel-inner">
        @foreach($p4 as $sli)
            @if (  $sli->status ==1 )
                <div class="carousel-item @if ($loop->first) active @endif" data-interval="{{$sli->second * 1000}}">
                    <a href="{{ $sli->url }}"><img class="d-block mx-auto w-100" src="{{ asset('images/dashboard/adds/'.$sli->attachment) }}" alt="Slider Image"></a>
                </div>
            @endif
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{{asset('js/bootstrap.js')}}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Font Awesome JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
@endsection
