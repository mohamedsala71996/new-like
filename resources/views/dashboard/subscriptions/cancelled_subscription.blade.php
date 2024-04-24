@extends('layouts.dashboard.app')

@section('content') 
    <div class="container-fluid">
        <!-- Search Form -->
        <div class="row mb-3">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('subscriptions.search') }}" method="GET" class="ml-auto">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="ابحث عن اسم العميل...">
                        <button type="submit" class="btn btn-primary">بحث</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0 text-center">الاشتراكات </h3>
                    </div>
                    <div class="card-body">
                        <!-- Subscription Cards -->
                        @if($subscriptions->count() > 0)
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @foreach($subscriptions as $subscription)
                                    <div class="col">
                                        <div class="card h-100 border-primary bg-light">
                                            <div class="card-header bg-primary text-white text-center">
                                                <h5>اشتراك ملغي</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><strong class="text-primary">اسم العميل :</strong> {{ optional($subscription->customer)->name }}</li>
                                                    <li class="list-group-item"><strong class="text-info">رقم الهاتف :</strong> {{ $subscription->phone_number }}</li>
                                                    <li class="list-group-item"><strong class="text-success">تاريخ الاشتراك :</strong> {{ $subscription->created_at }}</li>
                                                    <li class="list-group-item"><strong class="text-danger">تاريخ انتهاء الاشتراك :</strong> {{ $subscription->Subscription_End_Date }}</li>
                                                    <li class="list-group-item"><strong class="text-success">صورة التحقق :</strong> <img  style="width: 266px; height: 220px;" src="{{asset('images/dashboard/subscriptions/'.$subscription->photo)}}"></li> 
                                                </ul>
                                            </div>
                                            <!-- Add your update form or any other actions here -->
                                            @can('اعادة تفعيل الاشتراك')
                                            <div class="card-footer bg-light text-center"> <!-- توسيط العناصر بالمنتصف -->
                                                <form action="{{ route('subscriptions.reactive', $subscription->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-lg confirm-subscription-btn">رد الاشتراك</button>
                                                </form>
                                            </div>
                                            
                                            @endcan
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center">لا يوجد حتى الآن</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
