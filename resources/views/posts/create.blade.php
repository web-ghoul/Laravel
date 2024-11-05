@extends('templates.posts')

@section('title', 'Create Post')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST" class="p-5 d-flex flex-column container">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title" value={{old("title")}}>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{old("description")}}</textarea>
        </div>
        <select class="form-select" name="user_id" aria-label="Default select example">
            <option selected>Post By</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <div>
            <button type="submit" class="btn btn-success mt-4">Submit</button>
        </div>
    </form>
@endsection
