@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Narrative Report - For Checking</h3>

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

        {{-- ----------R1---------- --}}
        <div class="d-flex justify-content-between col-md-8">
            <p><b>Event Title: </b>{{$form -> eventTitle}}</p>
            <p><b>Event Date: </b>{{\Carbon\Carbon::parse($narrative -> enventdate)->format('F d, Y ')}}</p>
        </div>
            
        {{-- ----------R2---------- --}}
        <hr style="height:0.5px; width:100%; margin-top:0px;">

        <div class="form-group col-md-12 ">
            <p class="font-weight-bold">Narration: <span class="text-break font-weight-normal">
            {{$narrative -> narration}}</span></p>
        </div>
                

        {{-- ----------Table: Activity---------- --}}
        <h5 class="mt-5">Programs:</h5>
        <div id="table-wrapper" class="pre-scrollable mt-4">
            <table class="table table-striped col-md-12">
                <thead class="table-light sticky-top">
                    <tr>
                        <th style="width: 33.33%" scope="col">Activity Title</th>
                        <th style="width: 33.33%" scope="col">Start Date</th>
                        <th style="width: 33.33%" scope="col">End Date</th>
                    </tr>
                </thead>
                <tbody id="items">
                    @foreach($programs as $program)
                    <tr>
                        <td>{{$program -> activity}}</td>
                        <td>{{\Carbon\Carbon::parse($program -> startDate)->format('F d, Y ')}}</td>
                        <td>{{\Carbon\Carbon::parse($program -> endDate)->format('F d, Y ')}}</td>
                    </tr>      
                    @endforeach
                </tbody>
            </table>
        </div>

        <hr class="mt-0" style="height:3px;">

        <h5 class="mt-5">Participants:</h5>
        <div id="table-wrapper" class="pre-scrollable mt-4">
            
            <table class="table table-striped col-md-12">
                <thead class="table-light sticky-top">
                    <tr>
                        <th style="width: 25%" scope="col">First Name</th>
                        <th style="width: 25%" scope="col">Last Name</th>
                        <th style="width: 25%" scope="col">Section</th>
                        <th style="width: 25%" scope="col">Participated Date</th>
                    </tr>
                </thead>
                <tbody id="items">
                    @foreach($participants as $participant)
                    <tr>
                        <td>{{$participant -> firstName}}</td>
                        <td>{{$participant -> lastName}}</td>
                        <td>{{$participant -> section}}</td>
                        <td>{{\Carbon\Carbon::parse($participant -> participatedDate)->format('F d, Y ')}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <hr class="mt-0" style="height:3px;">


        {{-- ----------IMAGE SECTION---------- --}}
        <div class="d-block">
            
            <h5 class="mt-5 pb-3">Official Poster:</h5>
           
            <div class="row" id="poster">
                @foreach($posters as $poster)
                <div class="col-4 pb-3">
                    <img src="/storage/{{$poster -> image}}" class="w-100"> 
                </div>      
                @endforeach
            </div>

            <h5 class="mt-5 pb-3">Photos:</h5>

            <div class="row" id="photos">
                @foreach($eventImages as $image)
                <div class="col-4 pb-3">
                    <img src="/storage/{{$image -> image}}" class="w-100"> 
                </div>      
                @endforeach
            </div>

            {{-- ----------Comments---------- --}}
            
            <h5 class="mt-5">Comments:</h5>
            <div id="table-wrapper" class="pre-scrollable mt-4">
            
                <table class="table table-striped col-md-12">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th style="width: 70%" scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment -> message}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- ----------Suggestions---------- --}}

            <h5 class="mt-5">Suggestions:</h5>
            <div id="table-wrapper" class="pre-scrollable mt-4">
            
                <table class="table table-striped col-md-12">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th style="width: 70%" scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($suggestions as $suggestion)
                        <tr>
                            <td>{{$suggestion -> message}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- ----------Ratings---------- --}}

            <div class="h3 form-group mt-5 col-md-12">
                <p><b>Rating: </b>{{$narrative -> evalRating}}</p>
            </div>

                
            {{-- ------Approve and Deny Button------ --}}
            <div class="row">
                <div class="col-md-12">
                <button type="btn" class="btn btn-primary col-md-3 mt-md-5" onclick="window.location='{{ url('/submittedForms/details/'.$form->id .'/approve') }}'">Approve</button>
                <button type="btn" class="btn btn-danger col-md-3 mt-md-5" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modalDeny">Deny</button>
                </div>
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
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">2</span>
                <span class="progress-label">SAO Head</span>
            </li>
        </ul>
    </section>
    @else
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