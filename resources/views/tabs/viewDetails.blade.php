@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Application - For Checking</h3>
    
    <hr style="height:3px;">

    <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">

        {{-- ----------R1---------- --}}
        <div class="d-flex justify-content-between col-md-9">
            <p><b>Name </b>{{$adviser[0] -> firstName}} {{$adviser[0] -> lastName}}</p>
            <p><b>Submitted Date: </b>{{\Carbon\Carbon::parse($application[0] -> created_at)->format('F d, Y  - h:i A')}}</p>
        </div>
            
        {{-- ----------R2---------- --}}
        <div class="d-flex justify-content-between col-md-10">
            <p><b>Proposed Organization Name </b>{{$application[0] -> proposedOrgName}}</p>
            
        </div>

        {{-- ----------R3---------- --}}
        <div class="d-flex justify-content-between col-md-10">
            <p><b>President Email </b>{{$application[0] -> presidentEmail}}</p>
        </div>
        <hr style="height:0.5px; width:100%; margin-top:0px;">

        <div class="d-flex justify-content-between col-md-12">
            <p><b>Description:</b>
            <br/>
            {{$application[0] -> description}}</p>
        </div>
            
        {{-- ------ Buttons------ --}}
        <div class="row">
            <div class="col-md-12">
                <button type="btn" class="btn btn-primary col-md-3 mt-md-5"  onclick="window.location='{{ url('/application/approve/' . $application[0] -> id) }}'" >Approve</button>
                <button type="btn" class="btn btn-danger col-md-3 mt-md-5"  onclick="window.location='{{ url('/application/deny/' . $application[0] -> id) }}'">Deny</button>
            </div>
        </div>   
    </div>
</div>

@endsection