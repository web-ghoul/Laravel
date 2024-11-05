@extends('templates.posts')

@section('title', 'Post')

@section('content')
    <div class="p-5 d-flex flex-column container">
        <div class="card">
            <h5 class="card-header">{{ $post['description'] }}</h5>
            <div class="card-body">
                <h5 class="card-title">{{ $post['title'] }}</h5>
                <p class="card-text">{{ $post->user->name }}</p>
                <p class="card-text">{{ $post['created_at']->format("y-m-d") }}</p>
                <p class="card-text">{{ $post['updated_at']->format("Y-M-D") }}</p>
            </div>
        </div>
    </div>
@endsection
