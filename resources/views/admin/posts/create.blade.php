@extends('admin.layout.admin')

@section('content')
    <div class="page-header">
        <h1>Posts / Create </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('admin.posts.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                     <label for="title">TITLE</label>
                     <input type="text" name="title" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="body">BODY</label>
                     <textarea name="body" id="body" class="form-control" rows="8" value=""></textarea>
                     <script>
                        // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace( 'body' );
                     </script>
                </div>
                    <div class="form-group">
                     <label for="user_id">USER_ID</label>
                     <input type="text" name="user_id" class="form-control" value=""/>
                </div>



            <a class="btn btn-default" href="{{ route('admin.posts.index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Create</a>
            </form>
        </div>
    </div>


@endsection