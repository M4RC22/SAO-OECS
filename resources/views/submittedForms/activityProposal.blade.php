@extends('layouts.app')

@section('content')

<div class="container">
            
    <h3>Activity Proposal Form - For Checking</h3>
        
    <hr style="height:3px;">

    <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">

    {{-- ------Row1------ --}}

    <div class="row">
        <div class="col-md-3">
            <p><b>Event Title:</b> {{$form -> eventTitle}}</p>
        </div>
        <div class="col-md-3">
            <p><b>Date Submitted:</b> {{$form -> created_at}}</p>
        </div>
        <div class="col-md-3">
            <p><b>Activity Title:</b> {{$proposal[0] -> activityTitle}}</p>
        </div>
        <div class="col-md-3">
            <p><b>Outcome:</b> {{$proposal[0] -> outcome}}</p>
        </div>
    </div>

    {{-- ------Row2------ --}}

    @foreach( $activities as $activity)
    <div class="row">
        <div class="col-md-3">
            <p><b>Activity:</b> {{$activity->activity}}</p>
        </div>
        <div class="col-md-3">
            <p><b>Start Date:</b> {{$activity->startDate}}</p>
        </div>
        <div class="col-md-3">
            <p><b>End Date:</b> {{$activity->endDate}}</p>
        </div>
    </div>
    @endforeach


    {{-- ------Row nth------ --}}
    <div class="row">
        <div class="col-md-12">
            <button type="btn" class="btn btn-primary col-md-3" onclick="window.location.href='/submittedForms/details/{{$form->id}}';">Approve</button>
            <button type="btn" class="btn btn-danger col-md-3">Deny</button> 
        </div>

        
        </div>
        
    </div>
</div>

@endsection