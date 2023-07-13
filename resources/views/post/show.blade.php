@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
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