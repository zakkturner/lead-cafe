@extends('layouts.app');

@section('content')
    <div class="container-fluid">
        {{--        @if (session())--}}
        {{--            <div class="alert alert-success mt-3">--}}
        {{--                {{session('success')}}--}}
        {{--            </div>--}}

        {{--        @endif--}}
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>{!! $prospect->company !!} <small class="text-muted">Details</small></h1>

                    <div class="m1-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.prospects.dashboard')}}">All Prospects</a></li>
                                <li><a class="dropdown-item" href="{{route('admin.prospects.edit', $prospect->id)}}">Edit
                                        Prospect</a></li>
                                <li><a class="dropdown-item" href="#">Delete Prospect</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
