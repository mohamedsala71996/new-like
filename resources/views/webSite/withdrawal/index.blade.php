@extends('layouts.site.app')
@section('content')
<!-- start submit-->
<div class="container  py-4">
    <div class="row my-4 py-3">
        <h1 class="b-4">طلب سحب </h1>
        <form action="{{ route('store') }}" method="POST" class="mb-3" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="text" name="phone_number" class="form-control w-50 " value="{{ old('phone_number') }}"
                    placeholder="رقم التحويل" />
                @error('phone_number')
                <div class="w-50 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" name="withdrawal_amount" class="form-control w-50 "
                    value="{{ old('withdrawal_amount') }}" placeholder="المبلغ : اقل مبلغ للسحب 20ج " />
                @error('withdrawal_amount')
                <div class="w-50 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <p class="h6 my-3">طريقة الدفع :</p><span></span>
                <select name="methoud" id="payment_method" class="form-select w-50">
                    <option value="">اختر طريقة الدفع</option>
                    <option value="cach" {{ old('methoud') === 'cach' ? 'selected' : '' }}>فودافون كاش</option>
                    <option value="insta" {{ old('methoud') === 'insta' ? 'selected' : '' }}>انستا باي</option>
                </select>
                @error('methoud')
                <div class="w-50 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-start">
                <button type="submit" class="btn btn-danger">
                    سحب
                </button>
            </div>
        </form>
    </div>
</div>
<!-- End submit-->
@endsection
@section('scripts')
@if (session('success'))
    <script>
        alert()->success('Success Title', '{{ session('success') }}');
    </script>
@endif
@endsection
