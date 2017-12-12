@extends('Template.layout.default')

@section('content')
    <h3 class="title is-3">Your search for "{{ Request::input('query') }}"</h3>
    @if (!$users->count())
        <p>No results found, sorry.</p>
    @else
        <div class="row">
            <div class="col">
                @foreach ($users as $user)
                    @include('Template/user/userblock')
                @endforeach
            </div>
        </div>
    @endif
@stop
