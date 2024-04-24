@extends('layouts.dashboard.app')
@section('content') 
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 text-center">اضافه عمل جديد</h3>
                </div>
                    <div class="card-body">
                    @if(session('success'))
                        <script>
                            toastr.success('{{ session('success') }}');
                        </script>
                    @endif
                        <form method="POST" action="{{ route('works.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="description" class="form-label text-primary">الوصف</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="ادخل الوصف" rows="4" required>من فضلك اتبع تعليمات الموقع وحافظ نظام العمل لكي لا تعرض نفسك للحذف</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <label for="link" class="form-label text-primary">الرابط</label>
                                    <div class="input-group ">
                                        <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" id="link" placeholder="ادخل الرابط" value="{{ old('link') }}" required>
                                    </div>
                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="type" class="form-label text-primary">النوع</label>
                                    <select name="type" class="form-select @error('type') is-invalid @enderror" id="type" required>
                                        <option value="">اختر النوع</option>
                                        <option value="facebook" {{ old('type') == 'facebook' ? 'selected' : '' }}>Facebook</option>
                                        <option value="youtube" {{ old('type') == 'youtube' ? 'selected' : '' }}>YouTube</option>
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">اضف عمل </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
