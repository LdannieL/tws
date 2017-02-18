<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $posts =  Post::with('user')->paginate(3);
        return view('posts.index', compact('posts'));
	}

	public function show($id)
	{
        $post = Post::with('user')->find($id);
        return view('posts.post', compact('post'));
	}
}