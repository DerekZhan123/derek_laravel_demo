<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;

/*
 *Simple example, get all articles data
 */
class AirticleController extends Controller
{
    //Show all the content
    public function show()
    {
        return Post::all();
    }
}
