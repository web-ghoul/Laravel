@extends('templates.posts')

@section('title', 'Edit Posts')

@section('content')
    <form action="{{ route('posts.update', 1) }}" method="POST" class="p-5 d-flex flex-column container">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="title" value="{{ $errors->any() ? old('title') : $post['title'] }}"
                class="form-control" id="exampleFormControlInput1" placeholder="Enter Title">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">
{{ $errors->any() ? old('description') : $post['description'] }}</textarea>
        </div>
        <select class="form-select" name="user_id" aria-label="Default select example">
            <option selected>Post By</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" @selected($user->id === ($errors->any() ? old('user_id') : $post->user_id))>{{ $user->name }}</option>
            @endforeach
        </select>
        <div>
            <button type="submit" class="btn btn-success mt-4">Update</button>
        </div>
    </form>
@endsection
