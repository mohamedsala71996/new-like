
@extends('layouts.dashboard.app')
@section('content') 
<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
<div class="container-fluid">
<div class="row g-3">
<div class="col-xxl-3 col-lg-4 col-md-4">
<div class="list-group list-group-custom sticky-top me-xl-4" style="top: 100px;">
<a class="list-group-item list-group-item-action" href="#list-item-1">Profile Details</a>
<a class="list-group-item list-group-item-action" href="#list-item-2">Change Password</a>
</div>
</div>
<div class="col-xxl-8 col-lg-8 col-md-8">
<div id="list-item-1" class="card fieldset border border-muted mt-0">

<span class="fieldset-tile text-muted bg-body">Profile Details:</span>
<div class="card">
<div class="card-body">
<form method="POST" action="{{ route('profile.update',Auth::user()->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row mb-3">
<label class="col-md-3 col-sm-4 col-form-label">Avatar</label>
<div class="col-md-9 col-sm-8">
<div class="image-input avatar xxl rounded-4" style="background-image: url({{url('/')}}/dashboard/assets/img/avatar.png)">
<div class="avatar-wrapper rounded-4" style="background-image: url({{asset('images/dashboard/admins/'.auth()->user()->photo)}})"></div>
<div class="file-input">
<input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="file-input">
@error('photo')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
<label for="file-input" class="fa fa-pencil shadow text-muted"></label>
</div>
</div>
</div>
</div>
<div class="row mb-3">
<label class="col-md-3 col-sm-4 col-form-label">Full Name</label>
<div class="col-md-9 col-sm-8">
<input type="text" name="name" class="form-control form-control-lg" value="{{auth()->user()->name}}">
@error('name')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
</div>
<div class="row mb-3">
<label class="col-md-3 col-sm-4 col-form-label">Email_Addres *</label>
<div class="col-md-9 col-sm-8">
<input type="email" name="email" class="form-control form-control-lg" value="{{auth()->user()->email}}">
@error('email')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
</div>
<div class="card-footer text-end">
<button class="btn btn-lg btn-light me-2" type="reset">Discard</button>
<button class="btn btn-lg btn-primary" type="submit">Save Changes</button>
</div>
</form>
</div>

</div>
</div>
<div id="list-item-2" class="card fieldset border border-muted mt-5">

<span class="fieldset-tile text-muted bg-body">Change Password</span>
<div class="card">
<div class="card-body">
<div class="row g-3">
<div class="col-12">
<h6 class="border-top pt-2 mt-2 mb-3">Change Password</h6>
<div class="mb-3">
<input type="password" class="form-control form-control-lg" placeholder="Current Password">
</div>
<div class="mb-1">
<input type="password" class="form-control form-control-lg" placeholder="New Password">
</div>
<div>
<input type="password" class="form-control form-control-lg" placeholder="Confirm New Password">
<span class="text-muted small">Minimum 8 characters</span>
</div>
</div>
</div>
</div>
<div class="card-footer text-end">
<button class="btn btn-lg btn-light me-2" type="reset">Discard</button>
<button class="btn btn-lg btn-primary" type="submit">Save Changes</button>
</div>
</div>
</div>
</div>
</div>
@endsection
