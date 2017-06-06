@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Location</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('location.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('zip') || $errors->has('error') ? ' has-error' : '' }}">
                            <label for="zip" class="col-md-4 control-label">ZIP Code</label>

                            <div class="col-md-6">
                                <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required autofocus>

                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('error'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('error') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
