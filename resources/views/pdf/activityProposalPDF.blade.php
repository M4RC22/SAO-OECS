<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
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
                    <p><b>Duration of Event:</b> {{$proposal -> durationVal}} {{$proposal -> durationUnit}}</p>
                </div>
                <div class="col-md-5">
                    <p><b>Activity Classification:</b> {{$proposal -> actClassificationB}} ({{$proposal -> actClassificationA}})</p>
                </div>
                
                
            </div>  

            {{-- ------Row2------ --}}

            <hr style="height:3px; margin-top:0px">

            <div class="row">
                <div class="col-md-3">
                    <p><b>Organizer:</b> {{$organizer[0] -> firstName}} {{$organizer[0] -> lastName}}</p>
                </div>
                <div class="col-md-3">
                    <p><b>Email: </b> {{$organizer[0] -> email}}</p>
                </div>
                <div class="col-md-3">
                    <p><b>Contact Number: </b> {{$organizer[0] -> phoneNumber}}</p>
                </div>
                <div class="col-md-3">
                    <p><b>Organization: </b> {{$form -> orgName}}</p>
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
                            <td>{{$item -> dateNeeded}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 
            
            {{-- ------Add here the names of Approvers------ --}}
            <h1>Adviser: {{$adviser[0] -> firstName}} {{$adviser[0] -> lastName}}</h1>
            <p>Approved Date: {{\Carbon\Carbon::parse($form -> adviserDateApproved)->format('F d, Y - h:i A')}} </p>

            <hr style="height:3px;">

            <h1>SAO Head: {{$saoHead[0] -> firstName}} {{$saoHead[0] -> lastName}}</h1>
            <p>Approved Date: {{\Carbon\Carbon::parse($form -> saoDateApproved)->format('F d, Y - h:i A')}} </p>

            <hr style="height:3px;">

            <h1>SAO Head: {{$acadServ[0] -> firstName}} {{$acadServ[0] -> lastName}}</h1>
            <p>Approved Date: {{\Carbon\Carbon::parse($form -> acadServDateApproved)->format('F d, Y - h:i A')}} </p>

            <hr style="height:3px;">

            <h1>SAO Head: {{$finance[0] -> firstName}} {{$finance[0] -> lastName}}</h1>
            <p>Approved Date: {{\Carbon\Carbon::parse($form -> financeDateApproved)->format('F d, Y - h:i A')}} </p>

        </div>
    </div>
  </body>
</html>