<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <style>
         body{
            font-family: Arial, Helvetica, sans-serif;
            margin: 0px;
            padding: 0px;
            font-size: 14px;
            
        }
        
        .logo{
            text-align: center;
        }
        .apclogo{
            height: 100px;
            width: 100px;
        }
        h3{
            text-align: center;
            font-size: 16px;

        }
        .saotitle{
            text-align: center;
            font-size: 20px;
            
        }
        .apf-text{
            text-align: center;
            font-size: 18px;
            margin-bottom: 30px;
        }
        hr{
            border-style: solid;
            border-width: 0.5px;
            color: #737373;
        }
        .row1{
            width: 50%;
            padding: 0;     
        }
        .row2{
            padding: 0px;
        }
        .row3{
            width: 65%;
        }
        .row4{
            width: 50%;
        }
        .row5{
            width: 50%;
        }
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        .programmeTable td, .programmeTable th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .programmeTable tr:nth-child(even){
            background-color: #f2f2f2;
        }
        .programmeTable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #e6b800;
            color: black;
        }
        .logisticalTable td, .logisticalTable th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .logisticalTable tr:nth-child(even){
            background-color: #f2f2f2;
        }
        .logisticalTable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #e6b800;
            color: black;
        }
        .logistical{
            padding-top: 12px;
        }
        .signatures{
            padding-top: 200px;
        }
        .signatureTable td, .signatureTable th{
            
            padding: 8px;
        }
        h1, .approvedDate{
            text-align: right;
        }
        
    </style>

</head>
  <body>
    <div class="main-container">
        <div class=logo>
            <img class="apclogo" src="https://www.apc.edu.ph/wp-content/uploads/2019/10/03_Seal-of-APC.png">
        </div>
        <h3 class="saotitle">SAO Online Events Creation System</h3>
        
        <div class="apf-text">Activity Proposal Form</div>

        <hr>

        {{-- ------Row1------ --}}

        <div class="row1">
            <p><b>Event Title:</b> {{$form -> eventTitle}}</p>
            <p><b>Date Submitted:</b> {{\Carbon\Carbon::parse($form -> created_at)->format('F d, Y - h:i A')}}</p>     
        </div>  

        {{-- ------Row2------ --}}

        <hr>

        <div class="row2">
            <p><b>Duration of Event:</b> {{$proposal -> durationVal}} {{$proposal -> durationUnit}}</p>
            <p><b>Activity Classification:</b> {{$proposal -> actClassificationB}} ({{$proposal -> actClassificationA}})</p>
            <p><b>Organizer:</b> {{$organizer[0] -> firstName}} {{$organizer[0] -> lastName}}</p>
            <p><b>Email: </b> {{$organizer[0] -> email}}</p>
            <p><b>Contact Number: </b> {{$organizer[0] -> phoneNumber}}</p>
            <p><b>Organization: </b> {{$form -> orgName}}</p>
        </div>

        <hr>

        {{-- ------Row3------ --}}

        @foreach($externalCoorganizers as $item)
        <div class="row3">
            <p><b>Co-Organizer:</b> {{$item -> coorganizer}}</p>
            <p><b>Email: </b> {{$item -> email}}</p>
            <p><b>Contact Number: </b> {{$item -> phoneNumber}}</p>
            <p><b>Co-Organization: </b> {{$item -> coorganization}}</p>
        </div>
        @endforeach
            
        <hr>

        {{-- ------Row4------ --}}

        <div class="row4">
            <p><b>Primary target audience/beneficiary:</b> {{$proposal -> primaryAudience}}</p>
            <p><b>Number of participants/beneficiary:</b> {{$proposal -> numPrimaryAudience}}</p>
        </div>

        {{-- ------Row5------ --}}

        <div class="row5">
            <p><b>Secondary target audience/beneficiary:</b> {{$proposal -> secondaryAudience}}</p>
            <p><b>Number of participants/beneficiary:</b> {{$proposal -> numSecondaryAudience}}</p>
        </div>

        {{-- ------Row6------ --}}

        <hr>

        <div class="row6">
            <p><b>Description:</b><br> {{$proposal -> description}}</p>
        </div>

        {{-- ------Row7------ --}}


        <div class="row7">
            <p><b>Rationale:</b><br> {{$proposal -> rationale}}</p>
        </div>

        {{-- ------Row8------ --}}


        <div class="row8">
            <p><b>Outcome:</b><br> {{$proposal -> outcome}}</p>
        </div>

        {{-- ------Row9------ --}}

        <hr>

        <div class="programme">
            <h2>Activities/Programme:</h2>
            <table class="programmeTable">
                <thead>
                    <tr>
                        <th scope="col">Activity</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
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
            
            
        {{-- ------Row10------ --}}

        <div class="logistical">
            <h2>Logistical Needs:</h2>   
            <table class="logisticalTable">
                <thead>
                    <tr>
                        <th scope="col">Service/Equipment</th>
                        <th scope="col">Venue</th>
                        <th scope="col">Date Needed</th>
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
            
             
        
        <div class="signatures">
            
            <table class="signatureTable">
                <thead>
    
                </thead>
                <tbody>  
                    <tr>
                        <td><b>Adviser: {{$adviser[0] -> firstName}} {{$adviser[0] -> lastName}}</b></td>
                        <td><b>SAO Head: {{$saoHead[0] -> firstName}} {{$saoHead[0] -> lastName}}</b></td>
                    </tr>
                    <tr>
                        <td>Approved Date: {{\Carbon\Carbon::parse($form -> adviserDateApproved)->format('F d, Y - h:i A')}}</td>
                        <td>Approved Date: {{\Carbon\Carbon::parse($form -> saoDateApproved)->format('F d, Y - h:i A')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- ------Add here the names of Approvers------ --}}

        <div class="signatures">
            <table class="signatureTable">
                <thead>
    
                </thead>
                <tbody>  
                    <tr>
                        <td><b>Academic Services Head: {{$acadServ[0] -> firstName}} {{$acadServ[0] -> lastName}}</b></td>
                        <td><b>Finance Head: {{$finance[0] -> firstName}} {{$finance[0] -> lastName}}</b></td>
                    </tr>
                    <tr>
                        <td>Approved Date: {{\Carbon\Carbon::parse($form -> acadServDateApproved)->format('F d, Y - h:i A')}}</td>
                        <td>Approved Date: {{\Carbon\Carbon::parse($form -> financeDateApproved)->format('F d, Y - h:i A')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  </body>
</html>