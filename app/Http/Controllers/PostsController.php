<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view("posts.index", ["posts" => $posts]);
    }

    public function show(Post $post)
    {
        return view("posts.show", ["post" => $post]);
    }

    public function create()
    {
        $users = User::all();
        return view("posts.create", ["users" => $users]);
    }

    public function store()
    {
        request()->validate([
            "title" => ["required", "string", "min:5", "max:20"],
            "description" => ["required", "string", "min:50", "max:100"],
            "user_id" => ["required","exists:users,id"]
        ]);
        $data = request()->all();
        Post::create($data);
        return to_route("posts.index");
    }

    public function edit($post)
    {
        $p = Post::findOrFail($post);
        $users = User::all();
        return view("posts.edit", ["users" => $users, "post" => $p]);
    }

    public function update($post)
    {
        request()->validate([
            "title" => ["required", "string", "min:5", "max:20"],
            "description" => ["required", "string", "min:50", "max:100"],
            "user_id" => ["required","exists:users,id"]
        ]);
        $data = request()->all();
        $title = $data["title"];
        $description = $data["description"];
        $userId = $data["user_id"];
        $p = Post::findOrFail($post);
        $p->title = $title;
        $p->description = $description;
        $p->user_id = $userId;
        $p->save();
        return to_route("posts.show", $post);
    }

    public function destroy($post)
    {
        $p = Post::findOrFail($post);
        $p->delete();
        return to_route("posts.index");
    }
}
