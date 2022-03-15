@extends('layouts.app')

@section('content')

<div class="container">
            
    <h3>Activity Proposal Form - For Checking</h3>

    @if(session()->has('errorInDeny'))
    <script>

        $(window).ready(() => {
            $('#modalDeny').modal('show');

            $("#closeModalDeny").on('click', function(){
                $("#modalDeny").modal('hide');
            });
        });
    </script>
    @endif

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
            <div class="col-md-5">
                <p><b>Duration of Event:</b> {{$proposal -> durationVal}} {{$proposal -> durationUnit}}</p>
            </div>
            <div class="col-md-5">
                <p><b>Organization: </b> {{$form -> orgName}}</p>
            </div>
            @if($proposal -> actClassificationB === 't1')
            <div class="col-md-12">
                <p><b>Activity Classification:</b> Workshop/Seminar/Training/Symposium/Forum/Team Building ({{$proposal -> actClassificationA}})</p>
            </div>
            @elseif ($proposal -> actClassificationB === 't2')
            <div class="col-md-12">
                <p><b>Activity Classification:</b> Games/Competition ({{$proposal -> actClassificationA}})</p>
            </div>
            @elseif ($proposal -> actClassificationB === 't3')
            <div class="col-md-12">
                <p><b>Activity Classification:</b> Social Event/Party/Celebration ({{$proposal -> actClassificationA}})</p>
            </div>
            @elseif ($proposal -> actClassificationB === 't4')
            <div class="col-md-12">
                <p><b>Activity Classification:</b> CSR/Community Service ({{$proposal -> actClassificationA}})</p>
            </div>
            @elseif ($proposal -> actClassificationB === 't5')
            <div class="col-md-12">
                <p><b>Activity Classification:</b> Marketing ({{$proposal -> actClassificationA}})</p>
            </div>
            @endif
        </div>  

        {{-- ------Row2------ --}}

        <hr style="height:3px; margin-top:0px">

        <div class="row">
            <div class="col-md-4">
                <p><b>Organizer:</b> {{$organizer[0] -> firstName}} {{$organizer[0] -> lastName}}</p>
            </div>
            <div class="col-md-4">
                <p><b>Email: </b> {{$organizer[0] -> email}}</p>
            </div>
            <div class="col-md-4">
                <p><b>Contact Number: </b> {{$organizer[0] -> phoneNumber}}</p>
            </div>
        </div>

        @foreach($externalCoorganizers as $item)
        <div class="row">
            <div class="col-md-3">
                <p><b>Co-Organizer:</b> {{$item -> coorganizer}}</p>
            </div>
            <div class="col-md-3">
                <p><b>Email: </b> {{$item -> email}}</p>
            </div>
            <div class="col-md-3">
                <p><b>Contact Number: </b> {{$item -> phoneNumber}}</p>
            </div>
            <div class="col-md-3">
                <p><b>Co-Organization: </b> {{$item -> coorganization}}</p>
            </div>
        </div>
        @endforeach
        

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
                <p><b>Rationale:</b> {{$proposal -> rationale}}</p>
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
                        <td>{{\Carbon\Carbon::parse($activity -> startDate)->format('F d, Y')}}</td>
                        <td>{{\Carbon\Carbon::parse($activity -> endDate)->format('F d, Y')}}</td>
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
                        <th style="width: 33.33%" scope="col">Service/Equipment</th>
                        <th style="width: 33.33%" scope="col">Venue</th>
                        <th style="width: 33.33%" scope="col">Date Needed</th>
                    </tr>
                </thead>
                <tbody>  
                    @foreach($logisticalNeeds as $item) 
                    <tr>
                        <td>{{$item -> service}}</td>
                        <td>{{$item -> venue}}</td>
                        <td>{{\Carbon\Carbon::parse($item -> dateNeeded)->format('F d, Y')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ------Row 11(Approve and Deny Button)------ --}}
        <div class="row">
            <div class="col-md-12">
            <button type="btn" class="btn btn-primary col-md-3 mt-md-5" onclick="window.location='{{ url('/submittedForms/details/'.$form->id .'/approve') }}'">Approve</button>
                <button type="btn" class="btn btn-danger col-md-3 mt-md-5" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modalDeny">Deny</button>
            </div>
        </div>      
    </div>

    {{-- ------Tracking------ --}}
    <div class="shadow mb-5 bg-#fff rounded mt-3">
        @if($form -> currApprover === 'adviser')
        <section>
            <ul class="step-form-list">
                <li class="step-form-item current-item">
                    <span class="progress-count">1</span>
                    <span class="progress-label">Adviser</span>
                    <span class="progress-label"></span>
                </li>
                <li class="step-form-item ">
                    <span class="progress-count">2</span>
                    <span class="progress-label">SAO Head</span>
                    <span class="progress-label"></span>
                </li>
                <li class="step-form-item">
                    <span class="progress-count">3</span>
                    <span class="progress-label">Academic Services</span>
                </li>
                <li class="step-form-item ">
                    <span class="progress-count">4</span>
                    <span class="progress-label">Finance</span>
                </li>
            </ul>
        </section>
        @elseif($form -> currApprover === 'saoHead')
        <section>
            <ul class="step-form-list">
                <li class="step-form-item">
                    <span class="progress-count">1</span>
                    <span class="progress-label">Adviser</span>
                    <span class="progress-label">{{\Carbon\Carbon::parse($form -> adviserDateApproved)->format('F d, Y - h:i A')}}</span>
                </li>
                <li class="step-form-item current-item">
                    <span class="progress-count">2</span>
                    <span class="progress-label">SAO Head</span>
                    <span class="progress-label"></span>
                </li>
                <li class="step-form-item">
                    <span class="progress-count">3</span>
                    <span class="progress-label">Academic Services</span>
                </li>
                <li class="step-form-item ">
                    <span class="progress-count">4</span>
                    <span class="progress-label">Finance</span>
                </li>
            </ul>
        </section>
        @elseif($form -> currApprover === 'acadServ')
        <section>
            <ul class="step-form-list">
                <li class="step-form-item">
                    <span class="progress-count">1</span>
                    <span class="progress-label">Adviser</span>
                    <span class="progress-label">{{\Carbon\Carbon::parse($form -> adviserDateApproved)->format('F d, Y - h:i A')}}</span>
                </li>
                <li class="step-form-item">
                    <span class="progress-count">2</span>
                    <span class="progress-label">SAO Head</span>
                    <span class="progress-label">{{\Carbon\Carbon::parse($form -> saoDateApproved)->format('F d, Y - h:i A')}}</span>
                </li>
                <li class="step-form-item current-item">
                    <span class="progress-count">3</span>
                    <span class="progress-label">Academic Services</span>
                </li>
                <li class="step-form-item ">
                    <span class="progress-count">4</span>
                    <span class="progress-label">Finance</span>
                </li>
            </ul>
        </section>
        @elseif($form -> currApprover === 'finance')
        <section>
            <ul class="step-form-list">
                <li class="step-form-item">
                    <span class="progress-count">1</span>
                    <span class="progress-label">Adviser</span>
                    <span class="progress-label">{{\Carbon\Carbon::parse($form -> adviserDateApproved)->format('F d, Y - h:i A')}}</span>
                </li>
                <li class="step-form-item">
                    <span class="progress-count">2</span>
                    <span class="progress-label">SAO Head</span>
                    <span class="progress-label">{{\Carbon\Carbon::parse($form -> saoDateApproved)->format('F d, Y - h:i A')}}</span>
                </li>
                <li class="step-form-item">
                    <span class="progress-count">3</span>
                    <span class="progress-label">Academic Services</span>
                    <span class="progress-label">{{\Carbon\Carbon::parse($form -> acadServDateApproved)->format('F d, Y - h:i A')}}</span>
                </li>
                <li class="step-form-item current-item">
                    <span class="progress-count">4</span>
                    <span class="progress-label">Finance</span>
                </li>
            </ul>
        </section>
        @endif
    </div>
</div>

{{-- ------Deny------ --}}
<div class="modal fade" id="modalDeny" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            {{-- ------Header------ --}}
            <div class="modal-header" style="background: #e7ae41">
                <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">You're about to Deny the Form</i></h4>
                <button type="button" id="closeModalDeny" class="close mx-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span>x</button>
            </div>           
            {{-- ------Body------ --}}
            <div class="modal-body">
                <form action="/submittedForms/details/{{$form->id}}/deny" id="passConfirmation" method="GET">
                    <div class="header-btn">
                        <div id="div-physical">
                            <label for="feedback">Please give feedback:</label>
                            <textarea class="form-control col-md-12" id="feedback" name="feedback"></textarea>
                            @if(session()->has('errorInDeny'))
                                <div class="alert alert-danger mt-2">
                                    {{ session()->get('errorInDeny') }}
                                </div>
                            @endif
                        </div>      
                    </div>
                    <button type="submit" class="btn btn-success col-md-3 mt-md-3 float-right">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection