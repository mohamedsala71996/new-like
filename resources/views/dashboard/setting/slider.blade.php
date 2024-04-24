@extends('layouts.dashboard.app')
@section('content')
<div class="container">
    <h1>جميع السلايدر</h1>
    @can('انشاء السلايدر')
    <div class="row">
        <div class="col-md-6 mb-3">
            <a href="{{ route('sliders.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة سلايدر </a>
        </div>
    </div>
    @endcan

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الصورة</th>
                        <th scope="col">النوع</th>
                        <th scope="col">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $slider)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img style="width: 266px; height: 220px;" src="{{asset('images/dashboard/sliders/'.$slider->photo)}}" alt="Slider Image"></td>
                        <td>
                            @if($slider->type == 1)
                                الاعلى
                            @elseif($slider->type == 2)
                                الوسط
                            @elseif($slider->type == 3)
                                الاسفل
                            @else
                                غير محدد
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @can('تعديل السلايدر')
                                <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-outline-primary">تعديل</a>
                                @endcan
                                @can('حذف السلايدر')
                                <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">حذف</button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
