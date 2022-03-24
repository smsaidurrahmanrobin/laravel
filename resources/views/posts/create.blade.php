@extends('layouts.app')

@section('content')

    <h1>Create Post</h1>
{{--    <form method="post" action="/posts">--}}

    {!! Form::open(['method' =>'POST', 'action'=>'\App\Http\Controllers\PostsController@store', 'files'=>true]) !!}



        <div class="from_group">

                   {!! Form::label('title', 'Title:') !!}
                   {!! Form::text('title', null, ['class'=>'from-control']) !!}

                    {!! Form::submit('Create', ['class'=>'btn btn-danger']) !!}

         </div>

        <div class="from_group">

            {!! Form::file('file1', ['class'=>'from-control']) !!}

        </div>



{{--        <input type="text" name="title" placeholder="Enter Title">--}}

{{--        <input type="submit" name="submit">--}}
        {{csrf_field()}}

{{--    </form>--}}

    {!! Form::close() !!}


    @if(count($errors) > 0)

            <div class="alert alert-danger">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>{{$error}}</li>


                    @endforeach



               </ul>



            </div>

        @endif


@endsection


