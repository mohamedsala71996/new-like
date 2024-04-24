@extends('layouts.dashboard.app')

@section('content') 

<div class="container">
    <div class="row">

        @foreach($screenshots as $screenshot)
            <div class="col-md-4 mb-3">
                <div class="card border-primary"> 
                    <div class="card-header bg-primary text-white"> 
                        <p style="font-size:30px;">{{ $screenshot->customer->name }}</p>
                    </div>
                    <div class="card-body">
                        <img class="card-img-top" src="{{ asset('images/website/screenshots/'.$screenshot->photo) }}" alt="Screenshot">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
