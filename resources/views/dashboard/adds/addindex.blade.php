@extends('layouts.dashboard.app')
@section('content')
    <div class="container">
        <h1>جميع الاعلانات</h1>
        @can('انشاء الاعلانات')
        <div class="row">
            <div class="col-md-6 mb-3">
                <a href="{{ route('adds.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة اعلان </a>
            </div>
        </div>
        @endcan
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">اسم الشركه</th>
                            <th scope="col">الرابط</th>
                            <th scope="col">مكان العرض</th>
                            <th scope="col">الحاله</th>
                            <th scope="col">الصوره</th>
                            <th scope="col">العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($adds as $add)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $add->company_name }}</td>
                                <td>{{ $add->name }}</td>
                                <td><a href="{{ $add->url }}">{{ $add->url }}</a></td>
                                <td>
                                    @if($add->place == 1)
                                        اول سليدر
                                    @elseif($add->place == 2)
                                        ثاني سليدر
                                    @elseif($add->place == 4)
                                    ثالث اسليدر
                                    
                                                                        @elseif($add->place == 3)

                                        الايقونات
                                    @endif
                                </td>
                                <td>
                                    @if($add->status == 1)
                                        مفعل
                                    @elseif($add->status == 0)
                                        معطل
                                    @endif
                                </td>
                                <td > <img class="img-fluid" width="50px" height="50px" src="{{ asset('images/dashboard/adds/'.$add->attachment) }}"> </td>

                                <td class=" d-flex justify-between">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('تعديل الاعلانات')
                                        <a href="{{ route('adds.edit', $add->id) }}" class="btn btn-outline-primary">تعديل</a>
                                        @endcan

                                        @can('حذف الاعلانات')
                                        <form action="{{ route('adds.destory', $add->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger">حذف</button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <td>
                                no urls
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
