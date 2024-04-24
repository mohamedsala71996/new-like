@extends('layouts.dashboard.app')

@section('content') 
<div class="container">
    <h1 class="mt-4 mb-3">الاعدادات العامة للموقع</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-3">اعدادات الاتصال</h3>
                    <form action="{{route('settings.update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="address">العنوان</label>
                            <input type="text" name="address" class="form-control" value="{{ isset($settings->address) ? $settings->address : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control" value="{{ isset($settings->email) ? $settings->email : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">رقم الهاتف</label>
                            <input type="text" name="phone" class="form-control" value="{{ isset($settings->phone) ? $settings->phone : '' }}">
                        </div>
                        @can('تعديل الاعدادات')
                        <button type="submit" class="btn btn-primary m-3">حفظ</button>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-3">اعدادات وسائل التواصل الاجتماعي</h3>
                    <form action="{{route('settings.update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="facebook">رابط فيس بوك</label>
                            <input type="text" name="facebook" class="form-control" value="{{ isset($settings->facebook) ? $settings->facebook : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="twitter">رابط يوتيوب</label>
                            <input type="text" name="twitter" class="form-control" value="{{ isset($settings->twitter) ? $settings->twitter : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="telegram">رابط تليجرام</label>
                            <input type="text" name="telegram" class="form-control" value="{{ isset($settings->telegram) ? $settings->telegram : '' }}">
                        </div>
                        @can('تعديل الاعدادات')
                        <button type="submit" class="btn btn-primary m-3">حفظ</button>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-3">من نحن</h3>
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="about_us">نبذة عنا</label>
                            <textarea name="about_us" class="form-control" rows="5">{{ isset($settings->about_us) ? $settings->about_us : '' }}</textarea>
                        </div>
                        @can('تعديل الاعدادات')
                        <button type="submit" class="btn btn-primary m-3">حفظ</button>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-3">تفاصيل الايداع</h3>
                    <form action="{{route('settings.update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="deposit_phone">رقم هاتف الإيداع</label>
                            <input type="text" name="deposit_phone" class="form-control" value="{{ isset($settings->deposit_phone) ? $settings->deposit_phone : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="subscription_fee">قيمة الاشتراك</label>
                            <input type="text" name="subscription_fee" class="form-control" value="{{ isset($settings->subscription_fee) ? $settings->subscription_fee : '' }}">
                        </div>
                        @can('تعديل الاعدادات')
                        <button type="submit" class="btn btn-primary m-3">حفظ</button>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
