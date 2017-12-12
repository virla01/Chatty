@extends('Template.layout.default')

@section('content')
    <h3 class="is-size-3">Oops, that page could not found.!</h3>
    <a href="{{ route('home') }}">Go home</a>
@stop
