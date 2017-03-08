<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index',compact('posts'));
    }


//等同于下面的方法
   /* public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show',compact('post'));
    }*/


    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //dd(request()->all());
        //dd(request('id'));
        //dd(['id','body']);

        /*
         *方法一

        //Create a new post using the request data
        $post = new Post;

        $post->title = request('title');
        $post->body = request('body');

        //Save it to the database
        $post->save();

        */

        /*
         *
         * 方法二
         Post::create([
            'title' => request('title'),
            'body' => request('body')
        ]);

        */

        //方法三

        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required',
        ]);

        //可以替换下面的写法
        auth()->user()->publish(
            new Post(request(['title','body']))
        );

        /*
         *
         Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);
        */

        // And then redirect to the home page.
        return redirect('/');
    }

}
