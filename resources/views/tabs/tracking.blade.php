@extends('layouts.app')

@section('content')
<div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">
    
    <div class="row d-flex justify-content-between">
        <div class="col-md-5">
            <p><b>Event Title:</b> {{$form -> eventTitle}}</p>
        </div>
        <div class="col-md-5">
            @if( $form -> currApprover === 'adviser')
            <p><b>Current Approver:</b> Adviser</p>
            @elseif($form -> currApprover === 'saoHead')
            <p><b>Current Approver:</b> SAO Head</p>
            @elseif($form -> currApprover === 'acadServ')
            <p><b>Current Approver:</b> Academic Services</p>
            @elseif($form -> currApprover === 'finance')
            <p><b>Current Approver:</b> Finance</p>
            @endif
        </div>
        <div class="col-md-5">
            <p><b>Control Number: </b>{{$form -> controlNumber}}</p>
        </div>
        <div class="col-md-5">
            <p><b>Status:</b> {{$form -> status}}</p>
        </div>
        <div class="col-md-5">
            <p><b>Form Type: </b>{{$form -> formType}}</p>
        </div>
    </div>

    <hr style="height:3px;">

    @if($form -> formType === 'Narrative')

        @if($form -> currApprover === 'adviser')
            <section class="step-wizard">
            <ul class="step-wizard-list">
                <li class="step-wizard-item current-item">
                    <span class="progress-count">1</span>
                    <span class="progress-label">Adviser</span>
                </li>
                <li class="step-wizard-item">
                    <span class="progress-count">2</span>
                    <span class="progress-label">SAO Head</span>
                </li>
            </ul>
        </section>
        @else
        <section class="step-wizard">
            <ul class="step-wizard-list">
                <li class="step-wizard-item">
                    <span class="progress-count">1</span>
                    <span class="progress-label">Adviser</span>
                    <span class="progress-label">{{\Carbon\Carbon::parse($form -> adviserDateApproved)->format('F d, Y - h:i A')}}</span>
                </li>
                <li class="step-wizard-item  current-item">
                    <span class="progress-count">2</span>
                    <span class="progress-label">SAO Head</span>
                </li>
            </ul>
        </section>
        @endif
    @else
        @if($form -> currApprover === 'adviser')

            <section class="step-wizard">
                <ul class="step-wizard-list">
                    <li class="step-wizard-item current-item">
                        <span class="progress-count">1</span>
                        <span class="progress-label">Adviser</span>
                    </li>
                    <li class="step-wizard-item">
                        <span class="progress-count">2</span>
                        <span class="progress-label">SAO Head</span>
                    </li>
                    <li class="step-wizard-item ">
                        <span class="progress-count">3</span>
                        <span class="progress-label">Academic Services</span>
                    </li>
                    <li class="step-wizard-item ">
                        <span class="progress-count">4</span>
                        <span class="progress-label">Finance</span>
                    </li>
                </ul>
            </section>

            @elseif($form -> currApprover === 'saoHead')

            <section class="step-wizard">
                <ul class="step-wizard-list">
                    <li class="step-wizard-item">
                        <span class="progress-count">1</span>
                        <span class="progress-label">Adviser</span>
                        <span class="progress-label">{{\Carbon\Carbon::parse($form -> adviserDateApproved)->format('F d, Y - h:i A')}}</span>
                    </li>
                    <li class="step-wizard-item  current-item">
                        <span class="progress-count">2</span>
                        <span class="progress-label">SAO Head</span>
                    </li>
                    <li class="step-wizard-item ">
                        <span class="progress-count">3</span>
                        <span class="progress-label">Academic Services</span>
                    </li>
                    <li class="step-wizard-item ">
                        <span class="progress-count">4</span>
                        <span class="progress-label">Finance</span>
                    </li>
                </ul>
            </section>

            @elseif($form -> currApprover === 'acadServ')

            <section class="step-wizard">
                <ul class="step-wizard-list">
                    <li class="step-wizard-item">
                        <span class="progress-count">1</span>
                        <span class="progress-label">Adviser</span>
                        <span class="progress-label">{{\Carbon\Carbon::parse($form -> adviserDateApproved)->format('F d, Y - h:i A')}}</span>
                    </li>
                    <li class="step-wizard-item ">
                        <span class="progress-count">2</span>
                        <span class="progress-label">SAO Head</span>
                        <span class="progress-label">{{\Carbon\Carbon::parse($form -> saoDateApproved)->format('F d, Y - h:i A')}}</span>
                    </li>
                    <li class="step-wizard-item current-item ">
                        <span class="progress-count">3</span>
                        <span class="progress-label">Academic Services</span>
                    </li>
                    <li class="step-wizard-item ">
                        <span class="progress-count">4</span>
                        <span class="progress-label">Finance</span>
                    </li>
                </ul>
            </section>

            @elseif($form -> currApprover === 'finance')

            <section class="step-wizard">
                <ul class="step-wizard-list">
                    <li class="step-wizard-item">
                        <span class="progress-count">1</span>
                        <span class="progress-label">Adviser</span>
                        <span class="progress-label">{{\Carbon\Carbon::parse($form -> adviserDateApproved)->format('F d, Y - h:i A')}}</span>
                    </li>
                    <li class="step-wizard-item ">
                        <span class="progress-count">2</span>
                        <span class="progress-label">SAO Head</span>
                        <span class="progress-label">{{\Carbon\Carbon::parse($form -> saoDateApproved)->format('F d, Y - h:i A')}}</span>
                    </li>
                    <li class="step-wizard-item">
                        <span class="progress-count">3</span>
                        <span class="progress-label">Academic Services</span>
                        <span class="progress-label">{{\Carbon\Carbon::parse($form -> acadServDateApproved)->format('F d, Y - h:i A')}}</span>
                    </li>
                    <li class="step-wizard-item current-item">
                        <span class="progress-count">4</span>
                        <span class="progress-label">Finance</span>
                    </li>
                </ul>
            </section>
        @endif
    @endif 
</div> 

@endsection