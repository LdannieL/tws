@extends('admin.layout.admin')

@section('content')
    <div class="page-header">
        <h1>Posts</h1>
    </div>

{!! $posts->render() !!}
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>BODY</th>
                        <th>USER</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>
                <a class="btn btn-success" href="{{ route('admin.posts.create') }}">Create</a>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body, 50)}}</td>
                    <td>{{$post->user->name}}</td>

                    <td class="text-right">
                        <a class="margin-b btn btn-primary" href="{{ route('admin.posts.show', $post->id) }}">View</a>
                        <a class="margin-b btn btn-warning" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
                        <form class="form-btn" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="margin-b btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>

            <a class="btn btn-success" href="{{ route('admin.posts.create') }}">Create</a>
        </div>
    </div>
{!! $posts->render() !!}

@endsection