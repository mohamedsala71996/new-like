@extends('layouts.dashboard.app')
@section('content')
    @can('تعديل الاعلانات')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0 text-center">تعديل الإعلان - {{$addlink->name}}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('adds.update', $addlink->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label text-primary">اسم الإعلان</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="ادخل الاسم" value="{{ old('name', $addlink->name) }}" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="company_name" class="form-label text-primary">اسم الشركة</label>
                                <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="company_name" placeholder="ادخل اسم الشركة" value="{{ old('company_name', $addlink->company_name) }}" required>
                                @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label text-primary">الرابط</label>
                                <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="url" placeholder="ادخل الرابط" value="{{ old('url', $addlink->url) }}" required>
                                @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="second" class="form-label text-primary">الثواني </label>
                                <input type="number" name="second" class="form-control @error('second') is-invalid @enderror" id="second" placeholder="ادخل  الثواني" value="{{ old('second',$addlink->second) }}" required>
                                @error('second')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="color" class="form-label text-primary">اللون </label>
                                <input type="color" name="color" class="form-control @error('color') is-invalid @enderror" id="color" placeholder="ادخل  اللون" value="{{ old('color',$addlink->color) }}" required>
                                @error('color')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label text-primary">النوع</label>
                                <select name="place" class="form-select @error('type') is-invalid @enderror" id="type" required>
                                    <option value="">اختر النوع</option>
                                    <option value="1" {{ old('place', $addlink->place) == '1' ? 'selected' : '' }}>اول سليدر</option>
                                    <option value="2" {{ old('place', $addlink->place) == '2' ? 'selected' : '' }}>تاني سليدر</option>
                                    <option value="3" {{ old('place', $addlink->place) == '3' ? 'selected' : '' }}>الايقونات</option>
                                          <option value="3" {{ old('place', $addlink->place) == '4' ? 'selected' : '' }}>ثالث سليدر</option>
                                </select>
                                @error('place')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label text-primary">الحالة</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" id="status" required>
                                    <option value="">اختر الحالة</option>
                                    <option value="1" {{ old('status', $addlink->status) == '1' ? 'selected' : '' }}>مفعل</option>
                                    <option value="0" {{ old('status', $addlink->status) == '0' ? 'selected' : '' }}>معطل</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label text-primary">الصوره</label>
                                <input type="file" name="attachment" class="form-control @error('attachment') is-invalid @enderror">
                                @error('attachment')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">حفظ التعديلات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcan
@endsection
