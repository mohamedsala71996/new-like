@extends('layouts.dashboard.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">اضافه مشرف جديد</h3>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label text-primary">الاسم</label>
                                    {!! Form::text('name', null, ['placeholder' => 'الاسم', 'class' => 'form-control']) !!}
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="email" class="form-label text-primary">البريد الاكتروني</label>
                                    {!! Form::text('email', null, ['placeholder' => 'البريد الاكتروني', 'class' => 'form-control']) !!}
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="password" class="form-label text-primary">الرقم السري</label>
                                    {!! Form::password('password', ['placeholder' => 'الرقم السري', 'class' => 'form-control']) !!}
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="photo" class="form-label text-primary">الصوره</label>
                                    <input type="file" name="photo"
                                        class="form-control @error('photo') is-invalid @enderror">
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="roles" class="form-label text-primary">الصلاحيات</label>
                                    {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-success">اضافه</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
