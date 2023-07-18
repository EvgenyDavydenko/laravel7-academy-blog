@extends('layout.main', ['title'=>'Редактирование поста'])

@section('content')
    <form action="{{ route('posts.update', ['id'=>$post['id']]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <button class="btn btn-outline-success my-2 my-sm-0 float-right" type="submit">Редактировать пост</button>
        <h3>Редактирование поста</h3>
        @include('post._form')
    </form>
@endsection