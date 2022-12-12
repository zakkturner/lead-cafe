@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex home-container">
        <app></app>
{{--        @if (session())--}}
{{--            <div class="alert alert-success mt-3">--}}
{{--                {{ session('success')}}--}}
{{--            </div>--}}

{{--        @endif--}}


{{--        <side-bar title="Filters"></side-bar>--}}

{{--        <div class="card mt-4 w-60 ms-2">--}}
{{--            <div class="card-body">--}}
{{--                <div class="d-flex justify-content-between">--}}
{{--                    <h1>Prospects <small class="text-muted">Showing All Prospects</small></h1>--}}


{{--                    <div class="m1-auto">--}}
{{--                        <div class="dropdown">--}}
{{--                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"--}}
{{--                                    data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                Actions--}}
{{--                            </button>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li><a class="dropdown-item" href="{{route('admin.prospects.create')}}">Create--}}
{{--                                        Prospect</a></li>--}}
{{--                                <li><a class="dropdown-item" href="{{route('admin.prospects.export')}}">Download as Excel</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}



{{--                @if($prospects->count())--}}

{{--                    <table class="table table-hover">--}}

{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Notes</th>--}}
{{--                            <th>Name of Restaurant</th>--}}
{{--                            <th>Address</th>--}}
{{--                            <th>Tel 1</th>--}}
{{--                            <th>Tel 2</th>--}}
{{--                            <th>Email</th>--}}
{{--                            <th>Website</th>--}}
{{--                            <th>Contact</th>--}}
{{--                            <th>Position</th>--}}
{{--                            <th>Created At</th>--}}
{{--                            <th>Actions</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($prospects as $prospect)--}}
{{--                            <tr>--}}
{{--                                <td>{{$prospect->notes}}</td>--}}
{{--                                <td>{{$prospect->company}}</td>--}}
{{--                                <td>{{$prospect->address}}</td>--}}
{{--                                <td>{{$prospect->phone_one}}</td>--}}
{{--                                <td>{{$prospect->phone_two}}</td>--}}
{{--                                <td>{{$prospect->email}}</td>--}}
{{--                                <td>{{$prospect->web_url}}</td>--}}
{{--                                <td>{{$prospect->contact}}</td>--}}
{{--                                <td>{{$prospect->position}}</td>--}}
{{--                                <td>{{$prospect->pretty_created}}</td>--}}
{{--                                <td>--}}

{{--                                    <a href="{{route('admin.prospects.show', $prospect->id)}}" class="btn btn-primary">View Prospect</a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                        <prospect-list></prospect-list>--}}
{{--                    </table>--}}

{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

@endsection
