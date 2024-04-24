@extends('layouts.dashboard.app')
@section('content')

    <div class="container">
        <h1>تفاصيل الدعوات</h1>
       

    <table class="table table-bordered">
        <tr>
            <th>#</th> 
            <th>الاسم</th>
            <th>رقم الموبايل</th>
            <th>تمت الدعوة بواسطة</th>
        </tr>
        @php $i = 0; @endphp
        @foreach ($customers as $customer)
       
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone_number }}</td>
                <td>{{\App\Models\Customer::where('id',$customer->invited_id)->first()->name}}</td>
                
                              
            </tr>
        @endforeach
    </table>

    </div>
@endsection
