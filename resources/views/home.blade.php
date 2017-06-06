@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Locations

                    <a href="{{ route('location.create') }}" class="btn btn-xs btn-primary pull-right" type="submit">
                    Add Location
                    </a>
                </div>

                <ul class="list-group">
                    @forelse ($locations as $location)

                        <li  class="list-group-item">
                            {{ $location->zip }}
                        </li>

                    @empty
                        <li  class="list-group-item">
                            No locations found
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
