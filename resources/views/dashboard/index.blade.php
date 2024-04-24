@extends('layouts.dashboard.app')

@section('content')

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0 text-center">عدد الإعلانات</h5>
                        </div>
                        <div class="card-body">
                            <h1 class="text-center"> {{ \App\Models\Addlink::count() }}</h1>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0 text-center">عدد المستخدمين</h5>
                        </div>
                        <div class="card-body">
                            <h1 class="text-center">{{ \App\Models\User::count() }}</h1>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0 text-center">عدد الطلبات</h5>
                        </div>
                        <div class="card-body">
                            <h1 class="text-center">{{ \App\Models\Subscription::count() }}</h1>
                        </div>
                    </div>
                </div>
                
            </div>  <br/>
            <div class="row justify-content-center">
                <br/>
                  <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0 text-center"> عدد نسخ الروابط الكلي</h5>
                        </div>
                        <div class="card-body">
                            <h1 class="text-center">{{ \App\Models\Customer::whereNotNull('invited_id')->count() }}</h1>
                        </div>
                    </div>
                </div>
                  <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0 text-center">عدد نسخ الروابط خلال شهر</h5>
                        </div>
                        <div class="card-body">
                            <h1 class="text-center">
                                @php $currentMonth = date('m'); @endphp
                                {{ \App\Models\Customer::whereNotNull('invited_id')->whereMonth('created_at', $currentMonth)->count() }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

