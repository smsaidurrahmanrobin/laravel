@extends('layouts.app')

@section('content')

    <h1>Edit Post</h1>

    {!! Form::model($post, ['method' =>'PATCH', 'action'=>['\App\Http\Controllers\PostsController@update', $post->id]] ) !!}

    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'from-control']) !!}

    {!! Form::submit('Update', ['class'=>'btn btn-info']) !!}




        {{csrf_field()}}

    {!! Form::close() !!}

    {!! Form::model($post, ['method' =>'DELETE', 'action'=>['\App\Http\Controllers\PostsController@destroy', $post->id]] ) !!}


    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}




    {{csrf_field()}}

    {!! Form::close() !!}



@endsection
