@extends('layouts.dashboard.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="row mt-3">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('roles.index') }}"> الرجوع</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class="form-label text-primary">الاسم:</label>
                    <p>{{ $role->name }}</p>
                </div>
                <div class="form-group">
                    <label for="permissions" class="form-label text-primary">الصلاحيات:</label>
                    @if (!empty($rolePermissions))
                        <ul class="list-group">
                            @foreach ($rolePermissions as $v)
                                <li class="list-group-item">{{ $v->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>لا توجد صلاحيات مرتبطة بهذا الدور.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
