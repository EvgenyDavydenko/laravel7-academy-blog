@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p class="float-right">              
                        <a href="{{ route('posts.edit', ['id'=>$post['post_id']]) }}" class="btn btn-outline-primary my-2 my-sm-0">Редактировать</a>
                        <a href="{{ route('posts.destroy') }}" class="btn btn-outline-danger my-2 my-sm-0">Удалить</a>
                    </p>
                    <h2 class="cart-title">{{ $post['title'] }}</h2>
                </div>
                <div class="card-body">
                    <p class="cart-text">{{ $post['content'] }}</p>
                    <img src="{{ $post['img'] ?? 'https://dummyimage.com/1200x300' }}" class="img-fluid" alt="изображение">
                </div>
                <div class="card-footer">
                    <span class="text-muted">Автор: {{ $post['name'] }} | Опубликовано: {{ $post['post_created_at'] }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection