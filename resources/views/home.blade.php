@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>

                <div class="panel-body">
                    @foreach($posts as $post)
                    <div style="display:inline-grid; grid-template-columns: auto auto ; grid-gap: 20px; margin-bottom: 10px; height: 300px; ">
                    <div class="card" style="width:200px; text-align: center; box-shadow: 1px 1px 8px #888888; ">
                    <img height="100" width="150" style="margin-top: 10px;"  class="card-img-top" src="{{$post-> photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">{{$post->title}}</h4>
                        <p class="card-text">{{$post->body}}</p>
                        <a href="{{route('home.post', $post->id)}}" class="btn btn-primary">See Post</a>
                    </div>
                    </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
