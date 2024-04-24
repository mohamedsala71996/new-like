@extends('layouts.dashboard.app')
@section('content')
<div class="container">
    <h1> تعديل السلايدر </h1>
    <form method="POST" action="{{ route('sliders.update', $sliders->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="photo" class="form-label text-primary">الصورة القديمة</label><br>
            <img src="{{ asset('images/dashboard/sliders/'.$sliders->photo) }}" alt="Old Slider Image" style="width: 200px;">
        </div>
        <div class="mb-6">
            <label for="photo" class="form-label text-primary">الصورة الجديدة</label>
            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo" accept="image/*">
            @error('photo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label text-primary">النوع</label>
            <select name="type" class="form-control @error('type') is-invalid @enderror" id="type">
                <option value="1" {{ $sliders->type == 1 ? 'selected' : '' }}>اسلايدر اعلى</option>
                <option value="2" {{ $sliders->type == 2 ? 'selected' : '' }}>اسلايدر وسطى</option>
                <option value="3" {{ $sliders->type == 3 ? 'selected' : '' }}>اسلايدر سفلى</option>
            </select>
            @error('type')
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
@endsection
