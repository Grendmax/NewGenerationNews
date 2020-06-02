@extends('layouts.app')

@section('content')

    <div class="text-muted">
        {{ $newse->created_at->format("Y-m-d H:i") }}
    </div>



    <div class="d-flex align-items-center flex-wrap">
        <h1>
            {{ $newse->title }}
        </h1>
        <div class="p-2 bd-highlight"><img class="img-fluid" src="{{ $newse->imageURL}}" alt=""></div>

    </div>



    <div class="mb-3"></div>

    <div class="lead card card-body">
        <p class="lead">{{ $newse->description }}</p>
    </div>
@endsection
