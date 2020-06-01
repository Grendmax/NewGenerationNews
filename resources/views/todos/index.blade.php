@extends('layouts.app')

@section('content')

    <div class="d-flex align-items-center mb-3">
        <h1>{{ $user->name }}</h1>

        <a href="{{ route('todos.create') }}" class="ml-auto btn btn-success">
            Добавить задачу
        </a>
    </div>



@endsection
