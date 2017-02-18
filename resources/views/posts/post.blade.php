@extends('layouts.default')

@section('content')
	<article>
		<h1>{!! $post->title !!}</h1>
		<p class="created_at blog-post-meta">Created on {{{ date('Y-m-d', strtotime($post->created_at))}}} by <a href="#">{{{ $post->user->name }}}</a></p>
		<p>{!! $post->body !!}</p>
		<p>{!! link_to_route('home', '&lsaquo; Back') !!}</p>
	</article>
@stop