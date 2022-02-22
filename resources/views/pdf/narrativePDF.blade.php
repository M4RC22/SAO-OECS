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
        .narrative-text{
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
            width: 50%;
            padding: 0;     
        }
        .row4{
            padding-top: 10px;
        }
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        .programTable td, .programTable th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .programTable tr:nth-child(even){
            background-color: #f2f2f2;
        }
        .programTable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #e6b800;
            color: black;
        }
        .participantTable td, .participantTable th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .participantTable tr:nth-child(even){
            background-color: #f2f2f2;
        }
        .participantTable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #e6b800;
            color: black;
        }
        .participant{
            padding-top: 12px;
            padding-bottom: 15px;
        }
        .commentTable td, .commentTable th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .commentTable tr:nth-child(even){
            background-color: #f2f2f2;
        }
        .commentTable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #e6b800;
            color: black;
        }
        .suggestionTable td, .suggestionTable th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .suggestionTable tr:nth-child(even){
            background-color: #f2f2f2;
        }
        .suggestionTable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #e6b800;
            color: black;
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
        .row7{
            padding-top: 10px;
        }
    </style>

</head>
  <body>
    <div class="main-container">
        <div class=logo>
            <img class="apclogo" src="https://www.apc.edu.ph/wp-content/uploads/2019/10/03_Seal-of-APC.png">
        </div>
        <h3 class="saotitle">SAO Online Event Creation System</h3>
        
        <div class="narrative-text">Narrative Form</div>

        <hr>

        {{-- ------Row1------ --}}

        <div class="row1">
            <p><b>Event Title:</b> {{$form -> eventTitle}}</p>
            <p><b>Event Date:</b> {{\Carbon\Carbon::parse($narrative -> enventdate)->format('F d, Y ')}}</p>     
            <p><b>Narration:</b><br>{{$narrative -> narration}}</p>     
        </div>  

        {{-- ------Row2------ --}}

        <hr>

        <div class="program">
            <h2>Programs:</h2>
            <table class="programTable">
                <thead>
                    <tr>
                        <th scope="col">Activity Title</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                    </tr>
                </thead>
                <tbody>
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
        
        <div class="participant">
            <h2>Participants:</h2>   
            <table class="participantTable">
                <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Section</th>
                        <th scope="col">Participated Date</th>
                    </tr>
                </thead>
                <tbody>  
                    @foreach($participants as $participant) 
                    <tr>
                        <td>{{$participant -> firstName}}</td>
                        <td>{{$participant -> lastName}}</td>
                        <td>{{$participant -> section}}</td>
                        <td>{{$participant -> participatedDate}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <hr>
        {{-- ------Row3------ --}}

        
        <div class="row3">
            <h2>Official Poster:</h2>
            @foreach($posters as $poster)
            <div class="col-4 pb-3">
                <img src="{{public_path('storage/{$poster -> image}')}}" class="w-100"> 
            </div>      
            @endforeach
        </div>
        

        {{-- ------Row4------ --}}

        <div class="row4">
            <h2>Photos:</h2>
            @foreach($eventImages as $image)
            <div class="col-4 pb-3">
                <img src="{{public_path('storage/{$image -> image}')}}" class="w-100"> 
            </div>      
            @endforeach
        </div>

        <hr>

        {{-- ------Row5------ --}}

        <div class="comment">
            <h2>Comments:</h2>   
            <table class="commentTable">
                <thead>
                    <tr>
                        <th scope="col">Message</th>
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

        {{-- ------Row6------ --}}

        <div class="suggestion">
            <h2>Suggestions:</h2>   
            <table class="suggestionTable">
                <thead>
                    <tr>
                        <th scope="col">Message</th>
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

        {{-- ------Row7------ --}}


        <div class="row7">
            <p><b>Rating: </b>{{$narrative -> evalRating}}</p>
        </div>

        <hr>

        {{-- ------Row8------ --}}

        {{-- ------Add here the names of Approvers------ --}}

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
    </div>
  </body>
</html>