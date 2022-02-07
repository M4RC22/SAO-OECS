@extends('layouts.app')

@section('content')

<div class="container">
            
    <h3>Activity Proposal Form - For Checking</h3>
        
    <hr style="height:3px;">

    <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">

        {{-- ------Row1------ --}}

        <div class="row d-flex justify-content-between">
            <div class="col-md-5">
                <p><b>Event Title:</b> {{$form -> eventTitle}}</p>
            </div>
            <div class="col-md-5">
                <p><b>Date Submitted:</b> {{\Carbon\Carbon::parse($form -> created_at)->format('F d, Y - h:i A')}}</p>
            </div>
            <div class="col-md-12">
                <p><b>Duration of Event:</b> 2 Days *DB</p>
            </div>
            <div class="col-md-5">
                <p><b>Activity Classification:</b> {{$proposal -> actClassificationB}} ({{$proposal -> actClassificationA}})</p>
            </div>
            
            
        </div>  

        {{-- ------Row2------ --}}

        <hr style="height:3px; margin-top:0px">

        <div class="row">
            <div class="col-md-3">
                <p><b>Organizer:</b> John Doe</p>
            </div>
            <div class="col-md-3">
                <p><b>Email: </b> jdoe@gmail.com</p>
            </div>
            <div class="col-md-3">
                <p><b>Contact Number: </b> 09123456789</p>
            </div>
            <div class="col-md-3">
                <p><b>Organization: </b> APC Chorale</p>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-3">
                <p><b>Co-Organizer:</b> APC Dance Company</p>
            </div>
            <div class="col-md-3">
                <p><b>Email: </b> apcdc@gmail.com</p>
            </div>
            <div class="col-md-3">
                <p><b>Contact Number: </b> 09123456789</p>
            </div>
            <div class="col-md-3">
                <p><b>Co-Organization: </b> Internal</p>
            </div>
        </div>
        

        <hr style="height:3px; margin-top:0px">


        {{-- ------Row6------ --}}

        <div class="row  d-flex justify-content-between">
            <div class="col-md-5">
                <p><b>Primary target audience/beneficiary:</b> {{$proposal -> primaryAudience}}</p>
            </div>
            <div class="col-md-5">
                <p><b>Number of participants/beneficiary:</b> {{$proposal -> numPrimaryAudience}}</p>
            </div>
        </div>

        {{-- ------Row7------ --}}

        <div class="row  d-flex justify-content-between">
            <div class="col-md-5">
                <p><b>Secondary target audience/beneficiary:</b> {{$proposal -> secondaryAudience}}</p>
            </div>
            <div class="col-md-5">
                <p><b>Number of participants/beneficiary:</b> {{$proposal -> numSecondaryAudience}}</p>
            </div>
        </div>

        {{-- ------Row8------ --}}

        <hr style="height:3px; margin-top:0px">

        <div class="row  d-flex justify-content-between">
            <div class="col-md-12">
                <p><b>Description:</b> {{$proposal -> description}}</p>
            </div>
        </div>

        {{-- ------Row9------ --}}

        <hr style="height:3px; margin-top:0px">

        <div class="row  d-flex justify-content-between">
            <div class="col-md-12">
                <p><b>Rationale:</b> {{$proposal -> raationale}}</p>
            </div>
        </div>

        {{-- ------Row11------ --}}

        <hr style="height:3px; margin-top:0px">

        <div class="row  d-flex justify-content-between">
            <div class="col-md-12">
                <p><b>Outcome:</b> {{$proposal -> outcome}}</p>
            </div>
        </div>

        {{-- ------Row11------ --}}

        <hr style="height:3px; margin-top:0px">

        <h5 class="mb-3">Activities/Programme:</h5>

        <div id="table-wrapper" class="row pre-scrollable mt-3">
            <table class="table table-striped ">
                <thead class="table-light sticky-top">
                    <tr>
                        <th style="width: 33.33%" scope="col">Activity</th>
                        <th style="width: 33.33%" scope="col">Start Date</th>
                        <th style="width: 33.33%" scope="col">End Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                    <tr>
                        <td>{{$activity -> activity}}</td>
                        <td>{{$activity -> startDate}}</td>
                        <td>{{$activity -> endDate}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ------Row11------ --}}

        <hr style="height:3px; margin-top:0px">

        <h5 class="mb-3">Logistical Needs:</h5>

        <div id="table-wrapper" class="pre-scrollable mt-3">
            <table class="table table-striped col-md-12">
                <thead class="table-light sticky-top">
                    <tr>
                        <th style="width: 33.33%" scope="col">Service</th>
                        <th style="width: 33.33%" scope="col">Venue</th>
                        <th style="width: 33.33%" scope="col">Date Needed</th>
                    </tr>
                </thead>
                <tbody>  
                    @foreach($logisticalNeeds as $item) 
                    <tr>
                        <td>{{$item -> service}}</td>
                        <td>venue *DB</td>
                        <td>{{$item -> dateNeeded}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ------Row 11------ --}}
        <div class="row">
            <div class="col-md-12">
                <button type="btn" class="btn btn-primary col-md-3 mt-md-5" >Approve</button>
                <button type="btn" class="btn btn-danger col-md-3 mt-md-5">Deny</button> 
            </div>
        </div>      
    </div>
</div>
@endsection