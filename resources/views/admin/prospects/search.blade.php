@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>Search Location</h1>

                    <div class="ml-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.prospects.dashboard')}}">Back to Dashboard</a>
                                </li>

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
                    <div class="d-flex justify-content-between">

                    <div class="form-group w-100 px-2">
                        <label for="contact">Enter Search Query</label>
                        <input type="text" class="form-control w-100" name="query">
                    </div>
                    <div class="d-flex justify-content-end pt-2">
                        <button type="submit" class="btn btn-success">Search Prospects</button>
                    </div>
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
                                    @if(isset($item->thumbnail))
                                        <td><img  alt="thumbnail" src="{{$item->thumbnail}}" width="100px" height="100px" /> </td>
                                    @else
                                        <td>No Image</td>
                                    @endif
                                    <td>{{$item->title}}</td>
                                    @if(isset($item->address))
                                        <td>{{$item->address}}</td>
                                    @else
                                        <td>No address</td>
                                    @endif
                                    @if(isset($item->phone))
                                        <td>{{$item->phone}}</td>
                                    @else
                                        <td>No phone</td>
                                    @endif
                                    @if(isset($item->type))
                                        <td>{{$item->type}}</td>
                                    @else
                                        <td>No types</td>
                                    @endif
                                    <td>
                                        @if(isset($item->website))
                                            {{$item->website}}
                                        @else
                                            No website
                                        @endif
                                    </td>


                                    <td>
{{--                                        @if(isset($item->website))--}}
{{--                                            <custom-button--}}
{{--                                                :title="'Add Prospect'"--}}
{{--                                                phone_one='{{$item->phone}}'--}}
{{--                                                address="{{$item->address}}"--}}
{{--                                                company="{{$item->title}}"--}}
{{--                                                website="{{$item->website}}"--}}
{{--                                            ></custom-button>--}}
{{--                                        @else--}}
                                            <custom-button
                                                :title="'Add Prospect'"
                                                :prospect='@json($item)'
{{--                                                phone_one='{{$item->phone}}'--}}
{{--                                                address="{{$item->address}}"--}}
{{--                                                company="{{$item->title}}"--}}
                                            ></custom-button>
{{--                                        @endif--}}
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
