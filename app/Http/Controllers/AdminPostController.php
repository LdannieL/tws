<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPostController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
    {
        $this->middleware('auth');
    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::with('user')->latest()->paginate(3);

		return view('admin.posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$users = User::get();
		return view('admin.posts.create', compact('users'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$post = new Post();

		$post->title = $request->input("title");
        $post->body = $request->input("body");
        $user_id = User::where('name', '=', $request->input("user_id"))->first()->id;
        $post->user_id = $user_id;

		$post->save();

		return redirect()->route('admin.posts.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::findOrFail($id);

		return view('admin.posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::findOrFail($id);
		$users = User::get();

		return view('admin.posts.edit', compact('post', 'users'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$post = Post::findOrFail($id);

		$post->title = $request->input("title");
        $post->body = $request->input("body");
        $user_id = User::where('name', '=', $request->input("user_id"))->first()->id;
        $post->user_id = $user_id;

		$post->save();

		return redirect()->route('admin.posts.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		$post->delete();

		return redirect()->route('admin.posts.index')->with('message', 'Item deleted successfully.');
	}

}
