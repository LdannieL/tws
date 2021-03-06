@extends('admin.layout.admin')

@section('content')
    <div class="page-header">
        <h1>Posts / Show </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$post->id}}</p>
                </div>
                <div class="form-group">
                     <label for="title">TITLE</label>
                     <p class="form-control-static">{{$post->title}}</p>
                </div>
                    <div class="form-group">
                     <label for="body">BODY</label>
                     <p class="form-control-static">{{$post->body}}</p>
                </div>
                    <div class="form-group">
                     <label for="user_id">USER</label>
                     <p class="form-control-static">{{$post->user->name}}</p>
                </div>
            </form>

            <p></p>

            <a class="btn btn-default" href="{{ route('admin.posts.index') }}">Back</a>
            <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
            <form action="#/$post->id" method="DELETE" style="display: inline; border: none;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><button class="btn btn-danger" type="submit">Delete</button></form>
        </div>
    </div>


@endsection