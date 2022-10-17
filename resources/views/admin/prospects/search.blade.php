@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>Search Location</h1>
                    <custom-button :title="'Add Prospect'"></custom-button>
                    <div class="ml-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.prospects.dashboard')}}">Dashboard</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                @if ($errors->count())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $message)
                                <li>{{$message}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{--<search-component></search-component>--}}
                <form action="{{route('admin.prospects.search')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="contact">Enter Search Query</label>
                        <input type="text" class="form-control" name="query">
                    </div>
                    <div class="d-flex justify-content-end pt-2">
                        <button type="submit" class="btn btn-success">Search Prospects</button>
                    </div>
                </form>
                <div class="ml-auto">
                    @if ($results)
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Thumbnail</th>
                                <th>Name of Restaurant</th>
                                <th>Address</th>
                                <th>Tel 1</th>
                                <th>Description</th>

                                <th>Website</th>


                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $item)
                                <tr>
                                    <td>{{$item->thumbnail}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->type}}</td>

                                    <td>
                                        @if($item->website)
                                            {{$item->website}}
                                        @else
                                            No website
                                        @endif
                                    </td>


                                    <td>
                                        <custom-button
                                            :title="'Add Prospect'"
                                            phone_one='{{$item->phone}}'
                                            address="{{$item->address}}"
                                            company="{{$item->title}}"
                                            website="{{$item->website}}"
                                        ></custom-button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @else

                        No results. Please Enter New Query
                    @endif
                </div>

            </div>
        </div>

    </div>
@endsection
