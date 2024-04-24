@extends('layouts.dashboard.app')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form method="POST" action="{{ route('dashboard.uploadVideo') }}" enctype="multipart/form-data" >
{{ csrf_field() }}
<div >
<label>رفع فيديو</label>
<input type="file"  name="video" class="form-control">
</div>
<hr>
<button type="submit"  class="btn btn-primary">حفظ</button>
</form>
@endsection 