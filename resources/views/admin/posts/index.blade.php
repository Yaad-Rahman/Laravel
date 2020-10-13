@extends('layouts.admin')



@section('content')

    <h1>Posts</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>User</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Post link</th>
                <th>Comments</th>
                <th>Created</th>
                <th>Updated</th>
                <th></th>
                <th></th>

            </tr>
        </thead>

        <tbody>

            @if($posts)

                @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><img height="50" src="{{$post-> photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>
                <td><a href="{{route('admin.comments.index', $post->id)}}">View Comments</a></td>
                <td>{{$post->created_at->diffForhumans()}}</td>
                <td>{{$post->updated_at->diffForhumans()}}</td> 
                <td><a class="btn btn-primary" href="{{route('admin.posts.edit', $post->id)}}">Edit Post </a>  </td> 
                <td>
                    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}

                    <div class="form-group">
                        {!! Form::submit('Delete Post', ['class' => 'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}    
                </td>  
            </tr>

            @endforeach

            @endif

        </tbody>
    
    </table>


@stop