@extends('layouts.site.app')
@section('content')
    <style>
        .contenr6 {
            padding-inline: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ff0000;
            /* اللون الأحمر */
        }
        th,
        td {
            padding: 10px;
            border: 1px solid #ff0000;
            /* اللون الأحمر */
        }
        th {
            background-color: #ffcccc;
            /* اللون الأحمر الفاتح */
        }
        tr:nth-child(even) {
            background-color: #ffe6e6;
            /* اللون الأحمر الفاتح للصفوف الزوجية */
        }
        tr:nth-child(odd) {
            background-color: #ffd9d9;
            /* اللون الأحمر الداكن للصفوف الفردية */
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 style="color: #ff0000">الارباح</h1>
            </div>
            <div class="row mb-5">
                <div class="col-6">
                    <!-- start today profits -->
                    <div class="today-profits p-3 mt-5 text-white"
                        style="background-image: linear-gradient(to right, #f05f22, #e53f52);">
                        <div class="to-pro d-flex justify-content-between p-3">
                            <p>أرباح اليوم</p>
                            <p>{{ $daily_profit_count }}</p>
                        </div>
                        <div class="to-pro d-flex justify-content-between p-3">
                            <p>عدد المهام اليوميه</p>
                            <p>{{ $daily_profit_count }}</p>
                        </div>
                        <div class="to-pro d-flex justify-content-between p-3">
                            <p>عدد المشتركين الذين تم دعوتهم</p>
                            <p>{{ $totelInvited }}</p>
                        </div>
                    </div>
                    <!-- End today profits-->
                </div>
                <div class="col-6">
                    <!-- start today profits -->
                    <div class="today-profits p-3 mt-5 text-white"
                        style="background-image: linear-gradient(to right, #f05f22, #e53f52);">
                        <div class="to-pro d-flex justify-content-between p-3">
                            <p>الرصيد الإجمالي</p>
                            <p>{{ $withdrawals->total_earning }}</p>
                        </div>
                        <div class="to-pro d-flex justify-content-between p-3">
                            <p>عدد المهام</p>
                            <p>{{ $withdrawals->like_count_youtube + $withdrawals->like_count_facebook }}</p>
                        </div>
                    </div>
                    <!-- End today profits-->
                </div>
            </div>
        </div>
    </div>
    <div class="contenr6">
        <table>
            <h1 style="color: #ff0000">عمليات السحب</h1>
            <thead>
                <tr>
                    <th>عملية السحب</th>
                    <th>الكمية المسحوبة</th>
                    <th>طريقة السحب</th>
                    <th>نجاح العملية</th>
                    <th>تاريخ السحب</th>
                </tr>
            </thead>
            <tbody>
                @forelse($withdrawal as $key => $withdrawal)
                    <tr>
                        <td>عملية {{ $loop->iteration }}</td>
                        <td>{{ $withdrawal->withdrawal_amount }}</td>
                        <td>{{ $withdrawal->methoud }}</td>
                        <td>{{ $withdrawal->status }}</td>
                        <td>{{ $withdrawal->created_at->diffForHumans() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">
                            لا يوجد عمليات سحب بعد ...
                        </td>
                    </tr>
                @endforelse
                <!-- يمكنك إضافة صفوف إضافية هنا حسب الحاجة -->
            </tbody>
        </table>
    </div>
@endsection
