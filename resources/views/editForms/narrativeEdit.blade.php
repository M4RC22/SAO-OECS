@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Narrative Report</h3>

    <hr style="height:3px;">

    <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">

    <div class="alert alert-warning" role="alert">
        <p style="color:black;">{{$form -> remarks}}</p>
    </div>

        <form action="/NarrativeUpdate/{{$form  -> id}}" method="POST" id="narrativeForms" enctype="multipart/form-data">
            {{ csrf_field() }}


            {{-- ----------R1---------- --}}
            <div class="row g-3">

                <div class="form-group col-md-6">
                    <label for="eventTitle">Event Title</label>
                    <input type="text" class="form-control" id="eventTitle" name="eventTitle" value="{{$form -> eventTitle}}"/>
                </div>

                <div class="form-group col-md-6">
                    <label for="eventDate" class="form-label">Event Date</label>
                    <input type="date" class="form-control @error('eventDate') is-invalid @enderror" id="eventDate" name="eventDate" value="{{$narrative -> eventDate -> format('Y-m-d')}}">
                    @error('eventDate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                {{-- ----------R2---------- --}}
                
                <div class="form-group col-md-12">
                    <label for="eventdesc" class="form-label">Narration</label>
                    <textarea class="form-control @error('narration') is-invalid @enderror" id="narration" style="height: 150px" name="narration">{{$narrative -> narration}}</textarea>
                    @error('narration')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            {{-- ----------Table: Programs Table---------- --}}
            
            <h3 class="col-md-12">Programs</h3>
            <hr>

            <div id="table-wrapper" class="pre-scrollable mt-3">
                <table class="table table-hover col-md-12">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th scope="col">Activity</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col" class="text-right"><a href="javascript:void(0)" class="btn btn-success" id="narrActAddBtn"><i class="fas fa-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody id="programsItem">
                    @foreach($programs as $program)
                    <tr>
                        <td><input class="form-control w-100" id="actTitle" type="text" value="{{$program -> activity}}" name="actTitle[]" required/></td>
                        <td><input class="form-control w-100" id="startDate" type="date" value="{{$program->startDate->format('Y-m-d')}}" name="startDate[]" required/></td>
                        <td><input class="form-control w-100" id="endDate" type="date" value="{{$program->endDate->format('Y-m-d')}}" name="endDate[]" required/></td>
                        <td class="float-right"><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
                    </tr>      
                    @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            {{-- ----------End of Programs table---------- --}}

            

            {{-- ----------Table: Participants Table---------- --}}
            
            <h3 class="col-md-12">Participants</h3>
            <hr>

            <div id="table-wrapper" class="pre-scrollable mt-3">
                <table class="table table-hover col-md-12">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Section</th>
                            <th scope="col">Participated Date</th>
                            <th scope="col" class="text-right"><a href="javascript:void(0)" class="btn btn-success" id="participantsAddBtn"><i class="fas fa-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody id="participantsItem">
                    @foreach($participants as $participant)
                    <tr>
                        <td><input class="form-control" id="firstName" type="text" name="firstName[]" value="{{$participant ->firstName}}" required/></td>
                        <td><input class="form-control" id="lastName" type="text" name="lastName[]" value="{{$participant ->lastName}}" required/></td>
                        <td><input class="form-control" id="section" type="text" name="section[]" value="{{$participant ->section}}" required/></td>
                        <td><input class="form-control w-100" id="participatedDate" type="date" name="participatedDate[]" value="{{$participant ->participatedDate -> format('Y-m-d')}}" required/></td>
                        <td class="float-right"><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            {{-- ----------End of Participants table---------- --}}

            {{-- ----------IMAGE SECTION---------- --}}
            <div class="d-block col-md-12">
                <div class="h3 form-title mt-5">
                    Official Poster
                </div>
                            
                <div class="mb-5 mt-2 py-1">
                    <p for="officialposter" class="fst-italic text-secondary" >Upload a photo. (.jpg .png)</p>
                    <input type="file" class="form-control-sm w-100"  name="poster[]" id="poster" multiple/>
                </div>

                <div class="row" id="posterHolder">
                    @foreach($posters as $poster)
                    <div class="col-md-3">
                        <img src="/storage/{{$poster -> image}}" class="w-100"/>
                        <button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button>
                    </div>
                    @endforeach
                                    
                </div>

                <div class="mb-5 mt-2 py-1">
                    <p for="uploadPhotos" class="fst-italic text-secondary">Upload a photo. (.jpg .png)</p>
                    <input class="form-control-sm w-100" type="file" name="photos[]" id="photos" multiple/>
                </div>

                <div class="row" id="photosHolder">
                    @foreach($eventImages as $photo)
                    <div class="col-md-3">
                        <img src="/storage/{{$photo -> image}}" class="w-100"/>
                        <button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button>
                    </div>
                    @endforeach      
                </div>
            
            </div>


            {{-- ----------Table: Comments Table---------- --}}
            
            <h3 class="col-md-12">Comments</h3>
            <hr>

            <div id="table-wrapper" class="pre-scrollable mt-3">
                <table class="table table-hover col-md-12">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th scope="col">Message</th>
                            <th scope="col" class="text-right"><a href="javascript:void(0)" class="btn btn-success" id="commentAddBtn"><i class="fas fa-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody id="commentItems">
                        @foreach($comments as $comment)
                        <tr>
                            <td><textarea class="form-control" id="comments" type="text" name="comments[]" required>{{$comment -> message}}</textarea></td>comment
                            <td class="d-flex justify-content-center"><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            {{-- ----------End of Comments table---------- --}}

            {{-- ----------Table: Suggestions Table---------- --}}
            
            <h3 class="col-md-12">Suggestions</h3>
            <hr>

            <div id="table-wrapper" class="pre-scrollable mt-3">
                <table class="table table-hover col-md-12">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th scope="col">Message</th>
                            <th scope="col" class="text-right"><a href="javascript:void(0)" class="btn btn-success" id="suggestionAddBtn"><i class="fas fa-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody id="suggestionItems">
                       @foreach($suggestions as $suggestion)
                       <tr>
                            <td><textarea class="form-control" id="suggestions" type="text" name="suggestions[]" required>{{$suggestion -> message}}</textarea></td>
                            <td class="d-flex justify-content-center"><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            {{-- ----------End of Suggestions table---------- --}}

            <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-group col-md-2">
                        <label for="rating" class="form-label">Rating</label>
                        <input type="number" class="form-control  @error('rating') is-invalid @enderror" id="rating" min="0" max="5" name="rating" value="{{$narrative -> evalRating }}">
                        @error('rating')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
            </div>
            
    
            <div class="form-group">
                <button class="btn btn-primary" id="reqSubmit">Submit</button>
            </div>
        </form>
    </div>
</div>


@endsection