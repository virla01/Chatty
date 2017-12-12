@extends('Template.layout.default')

@section('content')
<div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <h4 class="card-header">Sign up</h4>
                <div class="card-body">
                    <form action="{{ route('auth.signup') }}" role="form" method="post">
                        <div class="form-group row pt-0">
                            <label for="email" class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <input type="text" class="form-control{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" id="email" placeholder="Email" value="{{ Request::old('email') ?: '' }}">
                                @if ($errors->has('email'))
                                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row pt-0">
                            <label for="username" class="col-3 col-form-label">User name</label>
                            <div class="col-9">
                                <input type="text" class="form-control{{ $errors->has('username') ? ' is-danger' : '' }}" name="username" id="username" placeholder="User name" value="{{ Request::old('username') ?: '' }}">
                                @if ($errors->has('username'))
                                    <p class="help is-danger">{{ $errors->first('username') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row pt-0">
                            <label for="password" class="col-3 col-form-label">Password</label>
                            <div class="col-9">
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" id="password">
                                @if ($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row pt-0">
                            <div class="col-10">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
