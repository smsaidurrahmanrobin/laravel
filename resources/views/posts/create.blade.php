@extends('layouts.app')

@section('content')

    <h1>Create Post</h1>
    <form method="post" action="/posts">

        <input type="text" name="title" placeholder="Enter Title">

        <input type="submit" name="submit">
        {{csrf_field()}}

    </form>




@endsection
