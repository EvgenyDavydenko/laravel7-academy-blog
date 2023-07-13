@extends('layout.main')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Создать пост</h3>
        <div class="form-group">
            <label>Заголовок:</label>
            <input class="form-control mr-sm-2" name="title" type="text" placeholder="Введите заголовок поста..." required>            
        </div>
        <div class="form-group">
            <label>Содержание:</label>
            <textarea class="form-control mr-sm-2" rows="10" name="content" type="text" placeholder="Введите содержание поста..." required></textarea>
        </div>
        <div class="form-group">
            <label>Изображение:</label>
            <input class="form-control-file mr-sm-2" name="img" type="file">
        </div>

        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Создать пост</button>
    </form>
@endsection