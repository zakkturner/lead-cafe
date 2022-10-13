@extends('layouts.app');

@section('content')
    <div class="container-fluid">

        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>{!! $prospect->company !!} <small class="text-muted">Details</small></h1>


                </div>
            </div>
        </div>
        <prospect-card
            idprop="{{$prospect->id}}"
            contactprop="{{$prospect->contact}}"
            companyprop="{{$prospect->company}}"
            phone_oneprop="{{$prospect->phone_one}}"
            phone_twoprop="{{$prospect->phone_two}}"
            addressprop="{{$prospect->address}}"
            websiteprop="{{$prospect->web_url}}"
            emailprop="{{$prospect->email}}"
            positionprop="{{$prospect->position}}"
            notesprop="{{$prospect->notes}}"
        ></prospect-card>
    </div>

@endsection
