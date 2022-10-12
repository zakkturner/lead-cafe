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



                </div>
            </div>
        </div>
        <prospect-card
            contact="{{$prospect->contact}}"
            company="{{$prospect->company}}"
            phone_one="{{$prospect->phone_one}}"
            phone_two="{{$prospect->phone_two}}"
           address="{{$prospect->address}}"
        website="{{$prospect->web_url}}"
            email="{{$prospect->email}}"
            position="{{$prospect->position}}"
            notes="{{$prospect->notes}}"
       ></prospect-card>
    </div>

@endsection
<script>
    import ProspectCard from "../../../js/components/ProspectCard";
    export default {
        components: {ProspectCard}
    }
</script>
