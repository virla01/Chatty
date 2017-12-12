@extends('Template.layout.default')

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <h4 class="card-header">Update your profile</h4>
                <div class="card-body">
                    <form action="{{ route('profile.edit') }}" role="form" method="post">
                        <div class="form-group row pt-0{{ $errors->has('first_name') ? ' has-error': '' }}">
                            <label for="first_name" class="col-3 col-form-label">First name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name" value="{{ Request::old('first_name') ?: Auth::user()->first_name }}">
                            </div>
                            @if ($errors->has('first_name'))
                                <span class="help-block">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group row pt-0{{ $errors->has('last_name') ? ' has-error': '' }}">
                            <label for="last_name" class="col-3 col-form-label">Last name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name" value="{{ Request::old('last_name') ?: Auth::user()->last_name }}">
                            </div>
                            @if ($errors->has('first_name'))
                                <span class="help-block">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group row pt-0{{ $errors->has('location') ? ' has-error': '' }}">
                            <label for="location" class="col-3 col-form-label">Location</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="{{ Request::old('location') ?: Auth::user()->location }}">
                            </div>
                            @if ($errors->has('first_name'))
                                <span class="help-block">{{ $errors->first('location') }}</span>
                            @endif
                        </div>
                        <div class="form-group row pt-0">
                            <div class="col-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
