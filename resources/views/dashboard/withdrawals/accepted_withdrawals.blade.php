@extends('layouts.dashboard.app')

@section('content') 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0 text-center">العمليات المنفذة</h3>
                    </div>
                    <div class="card-body">
                        @if($withdrawals->count() > 0)
                            <div class="row row-cols-1 row-cols-md-2 g-4">
                                @foreach($withdrawals as $withdrawal)
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                <h5 class="mb-0"> {{ optional($withdrawal->customer)->name }}</h5>
                                            </div>
                                            <div class="card-body" style="direction: rtl;">
                                                <h5 class="mb-3" style="margin-top: 0; text-align: right;">رقم الهاتف: <span style="font-weight: bold; font-size: 16px; color: blue;">{{ $withdrawal->phone_number }}</span></h5>
                                                <p class="mb-3" style="text-align: right; font-weight: bold;">الطريقة: <span style="font-weight: bold; color: red;">{{ $withdrawal->methoud }}</span></p> 
                                                <hr>
                                                <h5 class="mb-3" style="margin-bottom: 10px; text-align: right;">المبلغ المطلوب: <span style="font-weight: bold; font-size: 18px; color: green;">{{ $withdrawal->withdrawal_amount }} جنيه</span></h5>
                                                <div class="alert alert-success text-center" role="alert">
                                                    <h4>عمليه ناحه </h4>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center">لا يوجد حتى الآن</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('.confirm-withdrawal-btn, .reject-withdrawal-btn').on('click', function () {
        var withdrawalId = $(this).data('withdrawal-id');
        var status = '';

        if ($(this).hasClass('confirm-withdrawal-btn')) {
            status = 'confirm';
        } else if ($(this).hasClass('reject-withdrawal-btn')) {
            status = 'reject';
        } 

        updateWithdrawalStatus(withdrawalId, status);
    });

    function updateWithdrawalStatus(withdrawalId, status) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            method: 'POST',
            url: '/withdrawals/' + withdrawalId + '/' + status,
            dataType: 'json',
            data: {
                _token: csrfToken
            },
            success: function (response) {
                console.log(response.message);

                $('#success-toast').toast('show');

                location.reload();
            },
            error: function (error) {
                console.error('Error updating withdrawal status: ', error);
            }
        });
    }
</script>

@endsection
