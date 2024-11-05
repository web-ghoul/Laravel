@extends('templates.posts')

@section('title', 'Posts')

@section('content')
    <div class="p-5 d-flex flex-column container">
        <div class="text-center mt-4">
            <!-- Button trigger modal -->
            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                Create Post
            </a>
        </div>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Creator</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post['id'] }}</th>
                        <td>{{ $post['title'] }}</td>
                        <td>{{ $post['description'] }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post['created_at'] }}</td>
                        <td>{{ $post['updated_at'] }}</td>
                        <td><a href="{{ route('posts.show', $post['id']) }}" class="btn btn-info">View</a>
                            <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-primary">Edit</a>
                            <form class="d-inline" action="{{ route('posts.destroy', $post['id']) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
