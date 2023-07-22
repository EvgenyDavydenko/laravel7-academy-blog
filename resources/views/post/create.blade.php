@extends('layouts.main', ['title'=>'Создание поста'])

@section('content')
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <button class="btn btn-outline-success my-2 my-sm-0 float-right" type="submit">Создать пост</button>
        <h3>Создание поста</h3>
        @include('post._form')
    </form>
@endsection