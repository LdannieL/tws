@extends('layouts.default')

@section('content')	
	@if($posts->count())
		@foreach($posts as $post)
			<article>
			    <h2>{!! link_to_route('post', $post->title, array($post->id)) !!}</h2>
			    <p class="created_at blog-post-meta">Created on {{{ date('Y-m-d', strtotime($post->created_at))}}} by <a href="#">{{{ $post->user->name }}}</a></p>
			    <p>{!! str_limit($post->body, 300) !!}</p>
			    <p>{!! link_to_route('post', 'Read More &rsaquo;', array($post->id)) !!}</p>
			</article>
		@endforeach
		@include('posts._partials.pager')
	@endif
	{!! $posts->render() !!}
@stop
