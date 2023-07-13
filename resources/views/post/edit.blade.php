@extends('layout.main')

@section('content')
    <form action="{{ route('posts.update', ['id'=>$post['id']]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Редактирование поста</h3>
        @include('post._form')
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Редактировать пост</button>
    </form>
@endsection