@extends('layout.main')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Создать пост</h3>
        @include('post._form')
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Создать пост</button>
    </form>
@endsection