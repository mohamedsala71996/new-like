@extends('layouts.site.app')
@section('content')
    <div class="MyContainer my-4 " style="width: 100%; margin: auto; margin-top: 10px;">
        <div class="mx-3  ">
            <form action="{{ route('storeSubscription') }}" method="POST" class="form-control shadow w-50 m-auto" enctype="multipart/form-data">
                @csrf
                <div class="subscription-info" style="text-align: center;margin-top: 30px;">
                    <h1 class="subscription-heading" style="color: red;font-size: 24px;font-weight: bold;margin-bottom: 10px;">للاشتراك في الباقة السنوية</h1>
                    <p class="subscription-text" style="font-size: 18px;">
                        يُرجى تحويل مبلغ <span class="amount" style="color: blue;font-weight: bold;">{{$settings->subscription_fee}}</span> على الرقم التالي: <span class="phone-number" style="color: blue;font-weight: bold;">{{$settings->deposit_phone}}</span>،
                    </p>
                </div>
                <div class="mx-3 py-3">
                    <select name="payment_method" id="payment_method" class="form-select w-75">
                        <option value="">اختر طريقة الدفع</option>
                        <option value="vcash">فودافون كاش</option>
                        <option value="ipa">انستا باي</option>
                    </select>
                    @error('payment_method')
                        <div class="alert alert-danger  w-75" id="error_phone_number">{{ $message }}</div>
                    @enderror
                    <br>
                    <div id="insta_link_group" style="display: none;">
                        <p style="display: none;" id="labeli">رابط انستا باي</p>
                        <p style="display: none;" id="labelv"> رقم الهاتف المحول منه</p>
                        <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="form-control  w-75" >
                        @error('phone_number')
                            <div class="alert w-75 alert-danger" id="error_phone_number" >{{ $message }}</div>
                        @enderror
                        <div id="image" class="my-3">
                            <p > صوره اثبات الدفع  </p>
                            <input type="file" class=""  value="{{ old('photo') }}" id="imageInput" name="photo" accept="image/*">
                            @error('photo')
                                <div class=" w-75 alert alert-danger" id="error_phone_number" >{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">اشتراك</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('payment_method').addEventListener('change', function() {
            var instaLinkGroup = document.getElementById('insta_link_group');
            var labelv = document.getElementById('labelv');
            var labeli = document.getElementById('labeli');
            if (this.value === 'ipa') {
                instaLinkGroup.style.display = 'block';
                labeli.style.display = 'block';
                labelv.style.display = 'none';
            } else if (this.value === 'vcash') {
                instaLinkGroup.style.display = 'block';
                labelv.style.display = 'block';
                labeli.style.display = 'none';
            } else {
                instaLinkGroup.style.display = 'none';
                labelv.style.display = 'none';
                labeli.style.display = 'none';
            }
        });
        document.getElementById('phone_number').addEventListener('input', function() {
        document.getElementById('error_phone_number').style.display = 'none';
    });
    </script>
@endsection
