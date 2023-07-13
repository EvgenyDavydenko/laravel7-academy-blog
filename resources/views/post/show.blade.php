@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $post['title'] }}</h2>
                </div>
                <div class="card-body">
                    {{ $post['content'] }}
                </div>
                <div class="card-footer">
                    Автор: {{ $post['name'] }}
                    | Создан: {{ $post['post_created_at'] }}
                </div>
            </div>
        </div>
    </div>
@endsection