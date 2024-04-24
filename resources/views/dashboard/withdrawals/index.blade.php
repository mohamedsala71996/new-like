@extends('layouts.dashboard.app')

@section('content') 
<div class="container-fluid">
    <div class="row justify-content-center">
        @foreach($withdrawals as $withdrawal)
            <div class="col-12 col-md-6">
                <div class="card mb-4" id="withdrawalCard{{$withdrawal->id}}">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">{{ optional($withdrawal->customer)->name }} _ الرصيد الكلي: {{ optional($withdrawal->customer)->total_earning }} جنيه</h5>
                    </div>
                    @if($withdrawal->withdrawal_amount > optional($withdrawal->customer)->total_earning )
                        <div class="alert alert-danger text-center font-weight-bold" role="alert">
                            <strong>تحذير:</strong> مبلغ السحب أكبر من إجمالي الأرباح!
                        </div>
                    @endif
                    <div class="card-body" style="direction: rtl;">
                        <h5 class="mb-3" style="margin-top: 0; text-align: right;">رقم الهاتف: <span style="font-weight: bold; font-size: 16px; color: blue;">{{ $withdrawal->phone_number }}</span></h5>
                        <p class="mb-3" style="text-align: right; font-weight: bold;">الطريقة: <span style="font-weight: bold; color: red;">{{ $withdrawal->methoud }}</span></p>
                        <hr>
                        <h5 class="mb-3" style="margin-bottom: 10px; text-align: right;">المبلغ المطلوب: <span style="font-weight: bold; font-size: 18px; color: green;">{{ $withdrawal->withdrawal_amount }} جنيه</span></h5>
                        <hr>

                        <div class="d-flex justify-content-between">
                            @can('الموافقة على السحب')
                            <form action="{{ route('withdrawals.accept', $withdrawal->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-lg">موافقة</button>
                            </form>
                            @endcan

                            @can('رفض السحب')
                            <form action="{{ route('withdrawals.reject', $withdrawal->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-lg">رفض</button>
                            </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
