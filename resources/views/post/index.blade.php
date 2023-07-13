@extends('layout.main')

@section('content')
    <div class="row">
        @if($posts->count())
            @foreach($posts as $post)
            <div class="col-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="cart-title">{{ $post['title'] }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="cart-text">{{ $post['anons'] }}</p>
                        <a href="{{ route('posts.show', ['id' => $post['post_id']]) }}">
                            <img src="{{ $post['img'] ?? asset('img/default.jpg') }}" class="img-fluid" alt="изображение">
                        </a>                        
                    </div>
                    <div class="card-footer">
                        <span class="text-muted">Автор: {{ $post['name'] }} | Опубликовано: {{ $post['post_created_at'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <h2>По запросу <strong><?=$_GET['search']?></strong> ничего не найдено...</h2>
        @endif
    </div>
    {{ $posts->appends(['search'=>request()->search])->links() }}
@endsection