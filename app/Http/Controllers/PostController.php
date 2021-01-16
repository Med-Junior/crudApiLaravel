<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{


    //Route::get('/posts', [PostController::class, 'index'])->name('posts');
    public function index()
    {
        return view("posts.index");
        $posts = Post::get()->toJson(JSON_PRETTY_PRINT);
        return response($posts, 200);
    }

    //Route::get('/posts/{id}', [PostController::class, 'getOne']);
    public function getOne($id)
    {
        if (Post::where('id', $id)->exists()) {
            $post = Post::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($post, 200);
        } else {
            return response()->json([
                "message" => "Post not found"
            ], 404);
        }
       //return view('posts.show');
    }


    //Route::post('/posts', [PostController::class, 'store']);
    public function store(Request $request)
    {
        $post = new Post();
        $post->user = $request->user;
        $post->body = $request->body;
        $post->imgName = $request->imgName;
        $post->imgUrl = $request->imgUrl;

        $post->save();
        return response()->json([
            "message" => "Post record created"
        ], 201);
        //return view('posts.create');
    }

    //Route::put('/posts/{id}', [PostController::class, 'update']);
    public function update(Request $request, $id)
    {
        if (Post::where('id', $id)->exists()) {
            $post = Post::find($id);

            $post->user = is_null($request->user) ? $post->user : $post->user;
            $post->body = is_null($request->body) ? $post->body : $post->body;
            $post->imgName = is_null($request->imgName) ? $post->imgName : $post->imgName;
            $post->imgUrl = is_null($request->imgUrl) ? $post->imgUrl : $post->imgUrl;
            $post->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Post not found"
            ], 404);
        }
        // return view('posts.update');
    }

    //Route::delete('/posts/{id}', [PostController::class, 'delete']);
    public function delete($id)
    {
        if(Post::where('id', $id)->exists()) {
            $post = Post::find($id);
            $post->delete();

            return response()->json([
              "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Post not found"
            ], 404);
        }
        //return view('posts.delete');
    }
    //
}
