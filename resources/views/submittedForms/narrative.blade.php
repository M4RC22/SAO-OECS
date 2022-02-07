@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Narrative Report - For Checking</h3>

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
                        <td>{{$program -> startDate}}</td>
                        <td>{{$program -> endDate}}</td>
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
                        <td>{{$participant -> participatedDate}}</td>
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
                    <img src="{{$poster -> image}}" class="w-100"> 
                </div>      
                @endforeach
            </div>

            <h5 class="mt-5 pb-3">Photos:</h5>

            <div class="row" id="photos">
                @foreach($eventImages as $image)
                <div class="col-4 pb-3">
                    <img src="{{$image -> image}}" class="w-100"> 
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
                            <td>{{$suggestion -> message}}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- ----------Ratings---------- --}}

            <div class="h3 form-group mt-5 col-md-12">
                <p><b>Rating: </b>{{$narrative -> evalRating}}</p>
            </div>

            {{-- ----------Button---------- --}}
                
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary col-md-2 mt-4" type="submit">
                        Approve
                    </button>
                    <button type="button" class="btn btn-danger col-md-2 mt-4" type="submit">
                        Deny
                    </button>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection