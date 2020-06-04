@can('viewAny',App\News::class)
<form action="{{ route('comments.store',$newse) }}" method="POST">
    @csrf


    <div class="form-group">
        <label for="description">Комментарии</label>
        <textarea class="form-control" name="body" id="body" placeholder="Комментарии..."></textarea>
    </div>

    <button class="btn btn-success">Добавить</button>
</form>
@endcan
