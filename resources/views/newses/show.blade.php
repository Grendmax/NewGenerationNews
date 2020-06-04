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
    <div class="mb-3"></div>

    <h3>Комментарии</h3>

    @forelse($comments as $com)

            <div class="mb-4"></div>

            <div class="lead card card-body">

                <div class="font-weight-bold">
                    {{ $com->user->name }}
                </div>
                <div class="text-muted">
                    {{ $com->updated_at->diffForHumans()}}
                    @can('delete', $com->user_id==auth()->id() ? $com : '')
                    <form class="ml-auto" action="{{ route('comments.destroy', $com) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-danger">Удалить</button>
                        </div>
                    </form>
                    @endcan
                </div>
                <p class="lead">{{ $com->body }}</p>
            </div>

        <hr class="my-4">

    @empty
        <div class="alert alert-secondary">
            Комментариев нет
        </div>
    @endforelse
    @include('comments.index')

@endsection

