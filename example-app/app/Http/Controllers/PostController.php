<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;


/*
 *Article processing class
 */

class PostController extends Controller
{
    //Home page
    public function index()
    {
        $post = Post::latest();
        if (request('search')) {
            $post->where('title', 'like', '%'.request('search').'%');
            $post->orWhere('body', 'like', '%'.request('search').'%');
        }

        return view('posts.home', ['posts' => $post->get()]);
    }

    //Delte
    public function delete($id)
    {
        $delete = Post::find(intval($id))->delete();

        if ($delete) {
            return redirect('/')->with('success', 'Delete Success-'.$id);
        } else {
            return redirect('/')->withErrors(['error' => 'Delete Failed-'.$id]);
        }

        return redirect('/');
    }

    //View detail
    public function detail($id)
    {
        $cache_name = 'airticle'.$id;
        //dd($cache_name);
        if ($airticle = Redis::get($cache_name)) {
            //dd($airticle);
            //Get redis data and transfer to array return
            return view('posts.detail', json_decode($airticle, true));
        } else {
            $airticle = Post::findOrFail(intval($id));

            Redis::setex($cache_name, 500, json_encode($airticle));

            return view('posts.detail', $airticle);
        }
    }

    //Edit
    public function edit($id)
    {
        $aiticle = Post::findOrFail(intval($id));

        return view('posts.edit', $aiticle);
    }

    //Update
    public function update()
    {
        $id = request()->get('id');
        $result = Post::find($id)
        ->update([
            'title' => request()->get('title'),
            'body' => request()->get('body'),
            'update_by' => auth::id(),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if (!$result) {
            return redirect('/')->withErrors(['error' => 'Update Failed-'.$id]);
        } else {
            $cache_name = 'airticle'.$id;
            Redis::del($cache_name);

            return redirect('/');
        }
    }

    //Create page
    public function create()
    {
        return view('posts.create');
    }

    //Save the data
    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required|max:255|min:3',
            'body' => 'required',
        ]);

        $attributes['create_by'] = auth::id(); //Need get from session ID

        $result = Post::create($attributes);

        if ($result) {
            return redirect('/');
        } else {
            //Todo error alert to view layer
            return redirect('posts/create')->withErrors(['error' => 'Save Failed!']);
        }
    }
}
