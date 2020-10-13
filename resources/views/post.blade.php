@extends('layouts.blog-post')



@section('content')


    <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo->file}}" alt="">

                <hr>

                <!-- Post Content -->
                <p>{{$post->body}}</p>

                <hr>

                @if(Session::has('comment_message'))
                    {{session('comment_message')}}

                @endif

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>

                    {!! Form::open(['method' => 'POST', 'action' => 'PostCommentController@store']) !!}

                        <input type="hidden" name="post_id" value="{{$post->id}}">

                        <div class="form-group">
                        {!! Form::label('body', ':') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>3]) !!}
                        
                        </div>
                        <div class="form-group">
                         {!! Form::submit('Submit Comment', ['class' => 'btn btn-primary']) !!}
                        </div>
                        
                    {!! Form::close() !!}


                </div>

             

                <hr>

                <!-- Posted Comments -->


                

                @foreach($comments as $comment)

                <div class="media">
                    <div class="media-left">
                      <img src="{{$comment->photo ? $comment->photo : 'http://placehold.it/400x400'}}" class="media-object" style="width:60px">
                    </div>
                    <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}</h4>
                    <p>{{$comment->body}}</p>
                    </div>
                  </div>
                
                

                @endforeach

              

               

@stop



@section('scripts')


    <script>
        $(".comment-reply-container .toggle-reply").click(function(){

            $(this).next().slideToggle("slow");
        })
    </script>

@stop