@extends('layouts.dashboard.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 text-center">اضافة سليدر جديد</h3>
                </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sliders.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="photo" class="form-label text-primary">الصورة</label>
                                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo">
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label text-primary">نوع السلايدر</label>
                                <select name="type" class="form-control @error('type') is-invalid @enderror" id="type">
                                    <option disabled selected> اختر النوع</option>
                                    <option value="1">اسلايدر اعلى</option>
                                    <option value="2">اسلايدر وسطى</option>
                                    <option value="3">اسلايدر سفلى</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">اضف سليدر </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
