@extends('layouts.dashboard.app')
@section('content') 
<div class="container">
    <h1>المشرفين</h1>
    
    <table class="table">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم الموقع</th>
                    <th>الرابط</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            <tbody>
                @foreach($socials as $social)
                <tr>
                    <td>{{ $social->id }}</td>
                    <td>{{ $social->site_name }}</td>
                    <td>{{ $social->link }}</td>
                    <td>
                        @can('تعديل السوشيال')
                        <a href="{{ route('socials.edit', $social->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        @endcan
                        @can('حذف السوشيال')
                        <form action="{{ route('socials.destroy', $social->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @can('انشاء السوشيال')
        <div class="col-md-6" style="margin-bottom: 25px;">        
            <a href="{{ route('socials.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة موقع </a>
        </div>
        @endcan
</div>
@endsection
