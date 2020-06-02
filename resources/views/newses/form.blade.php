<?php
$update= isset($newse);
?>
@extends('layouts.app')

@section('content')

    <h2>{{ $update ? "Редактировать {$newse->title}" : 'Новая новость' }}</h2>

    <div class="card card-body">
        <form action="{{ $update ? route('newses.update', $newse) : route('newses.store') }}" method="POST">
            @csrf
            @if($update)
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="title">Заголовок <span class="text-danger">*</span></label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" placeholder="Заголовок..." autocomplete="off" value="{{ old('title') ?? ($newse->title ?? '') }}">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description" placeholder="Описание">{{ old('description') ?? ($newse->description ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="imageURL">URL картинки</label>
                <input class="form-control" type="url" name="imageURL" id="imageURL" placeholder="URL" value="{{ old('title') ?? ($newse->imageURL ?? '') }}">
            </div>

            <div class="form-group">
                <label for="category">Категория</label>
                <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                    @foreach(App\Category::list() as $key => $value)
                        <option @if(($newse->category ?? '')==$value || old('status')==$key) selected @endif value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @error('category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <button class="btn btn-success">{{ $update ? 'Обновить' : 'Добавить' }}</button>


        </form>
    </div>


@endsection
