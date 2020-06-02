@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center mb-3">
        <a href="{{ route('newses.create') }}" class="ml-auto btn btn-success">
            Добавить новость
        </a>
    </div>

    @forelse($news as $newse)
        <div class="d-flex flex-row bd-highlight mb-3">
            <div class="p-2 bd-highlight"><img class="img-fluid" style="max-height: 200px" src="{{ $newse->imageURL}}" alt=""></div>
            <div class="p-2 bd-highlight">
                <blockquote class="blockquote">
                    <a class="mb-0" href="{{ route('newses.show', $newse) }}" class="d-block p-2 w-100">
                        {{$newse->title}}
                    </a>
                    <footer class="blockquote-footer">Кто-то знаменитый в <cite title="Название источника">Source Title</cite></footer>
                </blockquote>
                <div class="text-muted">
                    {{ $newse->created_at->format("Y-m-d H:i") }}
                </div>
            </div>
            <form class="ml-auto" action="{{ route('newses.destroy', $newse) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="btn-group btn-group-sm">
                    <a class="btn btn-info" href="{{ route('newses.edit', $newse) }}">Редактировать</a>
                    <button class="btn btn-danger">Удалить</button>
                </div>
            </form>
        </div>
        <hr class="my-4">


    @empty
        <div class="alert alert-secondary">
            Ничего нет:(
        </div>
    @endforelse


@endsection
