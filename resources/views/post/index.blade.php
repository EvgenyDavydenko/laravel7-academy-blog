@extends('layout.main')

@section('content')
    <div class="row">
        @foreach($posts as $post)
        <div class="col-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('posts.show', ['id' => $post['post_id']]) }}">{{ $post['title'] }}</a>
                </div>
                <div class="card-body">
                    {{ $post['anons'] }}
                </div>
                <div class="card-footer">
                    {{ $post['name'] }}
                    {{ $post['post_created_at'] }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $posts->links() }}
@endsection