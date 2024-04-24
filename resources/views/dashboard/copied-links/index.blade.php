@extends('layouts.dashboard.app')
@section('content')

    <div class="container">
        <h1>روابط الدعوة</h1>
       

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>رقم الموبايل</th>
            <th>عدد الدعوات</th>
        </tr>
        @php $i = 0; @endphp
        @foreach ($customers as $customer)
        @php
        $count = \App\Models\Customer::where('invited_id',$customer->id)->count();
        @endphp
            <tr>

                <td>{{ ++$i }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone_number }}</td>
                <td>
                    @if($count > 0)
                    <a href="{{route('invited.show',$customer->id)}}">{{ $count}}</a>
                        @else
                        0
                        @endif
                    </a></td>
                              
            </tr>
        @endforeach
    </table>
 {{$customers->links()}}
    </div>
@endsection
