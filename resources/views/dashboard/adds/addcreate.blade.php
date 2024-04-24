@extends('layouts.dashboard.app')
@section('content')
    @can('انشاء الاعلانات')
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0 text-center">اضافه اعلان جديد</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('adds.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label text-primary">اسم الاعلان</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                        placeholder="ادخل الاسم" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label text-primary">اسم الشركه</label>
                                    <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                        id="name" name="company_name" placeholder="ادخل الاسم"
                                        value="{{ old('company_name') }}" required>
                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="url" class="form-label text-primary">الرابط </label>
                                    <input type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                                        id="url" name="url" placeholder="ادخل  الرابط" value="{{ old('url') }}"
                                        required>
                                    @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="second" class="form-label text-primary">الثواني </label>
                                    <input type="number" name="second"
                                        class="form-control @error('second') is-invalid @enderror" id="second"
                                        placeholder="ادخل  الثواني" value="{{ old('second') }}" required>
                                    @error('second')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="color" class="form-label text-primary">اللون </label>
                                    <input type="color" name="color"
                                        class="form-control @error('color') is-invalid @enderror" id="color"
                                        placeholder="ادخل  اللون" value="{{ old('color') }}" required>
                                    @error('color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="type" class="form-label text-primary">النوع</label>
                                    <select name="place" class="form-select @error('place') is-invalid @enderror"
                                        id="type" required>
                                        <option value="">اختر النوع</option>
                                        <option value="1" {{ old('place') == '1' ? 'selected' : '' }}>اول سليدر</option>
                                        <option value="2" {{ old('place') == '2' ? 'selected' : '' }}>تاني سليدر</option>
                                        <option value="3" {{ old('place') == '3' ? 'selected' : '' }}>الايكونات </option>
                                        <option value="3" {{ old('place') == '4' ? 'selected' : '' }}>ثالث سليدر </option>

                                    </select>
                                    @error('place')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="type" class="form-label text-primary">النوع</label>
                                    <select name="status" class="form-select @error('status') is-invalid @enderror"
                                        id="type" required>
                                        <option value="">اختر النوع</option>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>مفعل</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>معطل</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="photo" class="form-label text-primary">الصوره</label>
                                    <input type="file" name="attachment"
                                        class="form-control @error('attachment') is-invalid @enderror">
                                    @error('attachment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">اضف اعلان </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection
