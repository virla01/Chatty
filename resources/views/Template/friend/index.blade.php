@extends('Template.layout.default')

@section('content')
    <div class="row">
        <div class="col-6">
            <h3>Your friends</h3>
            @if(!$friends->count())
                <p>Your have no friends. </p>
            @else
                @foreach ($friends as $user)
                    @include('Template\user\userblock')
                @endforeach
            @endif
        </div>

        <div class="col-6">
            <h4>Friends requests</h4>

            @if(!$requests->count())
                <p>You have no friend requests.</p>
            @else
                @foreach ($requests as $user)
                    @include('Template\user\userblock')
                @endforeach
            @endif
        </div>
    </div>
@stop
