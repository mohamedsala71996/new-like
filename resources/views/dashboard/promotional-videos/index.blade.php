@extends('layouts.dashboard.app')
@section('content')
    <style>
        /* Define a class to set max height and max width */
        .max-height-width {
            max-height: 100px;
            /* Set maximum height */
            max-width: 150px;
            /* Set maximum width */

        }
    </style>
    <div class="container">
        <h1>كل الفيديوهات</h1>


        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>الفيديو</th>
                <th width="280px">التحكم</th>
            </tr>

            @foreach ($PromotionalVideos as $key => $PromotionalVideo)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td class="max-height-width"><video controls>
                            <source src="{{ 'https://newlike.labs1.online/public/' . $PromotionalVideo->video }}"
                                type="video/mp4">
                        </video></td>
                    <td>
                        @can('حذف فيديو')
                        <form action="{{ route('video.delete', $PromotionalVideo->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف الفيديو</button>
                        </form>
                        @endcan

                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection
