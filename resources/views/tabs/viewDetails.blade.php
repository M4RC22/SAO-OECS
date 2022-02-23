@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Application - For Checking</h3>

    @if(session()->has('errorInApproval'))
    <script>
        $(window).ready(() => {
            $('#applicationApprove').modal('show');
            $("#closeApprove").on('click', function(){
                $("#applicationApprove").modal('hide');
            });
        });
    </script>
    @elseif(session()->has('errorInDeny'))
    <script>

        $(window).ready(() => {
            $('#applicationDeny').modal('show');
            $("#closeDeny").on('click', function(){
                $("#applicationDeny").modal('hide');
            });
        });
    </script>
    @endif

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
            {{$application[0] -> presidentEmail}}</p>
        </div>
            
        {{-- ------ Buttons------ --}}
        <div class="row">
            <div class="col-md-12">
                <button type="btn" class="btn btn-primary col-md-3 mt-md-5" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#applicationApprove" >Approve</button>
                <button type="btn" class="btn btn-danger col-md-3 mt-md-5" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#applicationDeny">Deny</button>
            </div>
        </div>   
    </div>
</div>


{{-- ------Approve------ --}}
<div class="modal fade" id="applicationApprove" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            {{-- ------Header------ --}}
            <div class="modal-header" style="background: #e7ae41">
                <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">You're about to Approve the Form</i></h4>
                <button type="button" id="closeApprove" class="close mx-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span>x</button>
            </div>           
            {{-- ------Body------ --}}
            <div class="modal-body">
                <form action="/application/approve/{{$application[0] -> id}}" id="passConfirmation" method="GET">
                    <div class="header-btn">
                        <div id="div-physical">
                            <label for="confirmPass">Please Enter Your Password:</label>
                            <input type="password" class="form-control col-md-12" id="confirmPass" name ="confirmPass">
                            @if(session()->has('errorInApproval'))
                                <div class="alert alert-danger mt-2">
                                    {{ session()->get('errorInApproval') }}
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


{{-- ------Deny------ --}}
<div class="modal fade" id="applicationDeny" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            {{-- ------Header------ --}}
            <div class="modal-header" style="background: #e7ae41">
                <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">You're about to Deny the Form</i></h4>
                <button type="button" id="closeDeny" class="close mx-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span>x</button>
            </div>           
            {{-- ------Body------ --}}
            <div class="modal-body">
                <form action="/application/deny/{{$application[0] -> id}}" id="passConfirmation" method="GET">
                    <div class="header-btn">
                        <div id="div-physical">
                            <label for="confirmPass">Please Enter Your Password:</label>
                            <input type="password" class="form-control col-md-12" id="confirmPass" name="confirmPass">
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