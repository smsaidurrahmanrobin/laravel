@extends('layouts.app')

@section('content')

    <h1>Contactsssss Page</h1>

    @if (count($people))

        <ul>


        @foreach($people as $person)

            <li>{{$person}}</li>

        @endforeach

        </ul>
    @endif

@stop

@section('footer')

{{--    <script>alert("Hello to Contact Page in the views folder")</script>--}}

@stop
