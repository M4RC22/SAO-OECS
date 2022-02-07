@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Narrative Report</h3>

    <hr style="height:3px;">

    <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">

        <form action="{{ route('narrativeAdd') }}" method="POST" id="narrativeForms">
            {{ csrf_field() }}

            {{-- ----------R1---------- --}}

            <div class="row g-3">
                <div class="form-group col-md-6">
                    <label for="title" class="form-label">Event Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="form-group col-md-6">
                    <label for="eventDate" class="form-label">Event Date</label>
                    <input type="date" class="form-control" id="eventDate" value="<?php echo date('Y-m-d'); ?>" name="eventDate">
                </div>
                
                {{-- ----------R2---------- --}}
                
                <div class="form-group col-md-12">
                    <label for="eventdesc" class="form-label">Narration</label>
                    <textarea class="form-control" id="narration" style="height: 150px" name="narration"></textarea>
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
                        {{-- Generated Items --}}
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
                        {{-- Generated items --}}
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
                    <p for="officialposter" class="fst-italic text-secondary">Upload a photo. (.jpg .png)</p>
                    <input class="form-control-sm w-100" id="officialPoster" type="file" onchange="image_selectPoster()" multiple/>
                </div>

                <div class="row" id="poster">
                                    
                </div>

                <div class="h3 form-title">
                    Photos
                </div>

                <div class="mb-5 mt-2 py-1">
                    <p for="uploadPhotos" class="fst-italic text-secondary">Upload a photo. (.jpg .png)</p>
                    <input class="form-control-sm w-100" id="uploadPhotos" type="file" onchange="image_selectPhotos()" multiple/>
                </div>

                <div class="row" id="photos">
                            
                </div>
            
            </div>


            {{-- ----------Table: Programs Table---------- --}}
            
            <h3 class="col-md-12">Comments/Suggestion</h3>
            <hr>

            <div id="table-wrapper" class="pre-scrollable mt-3">
                <table class="table table-hover col-md-12">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th scope="col">Message</th>
                            <th scope="col">Type</th>
                            <th scope="col" class="text-right"><a href="javascript:void(0)" class="btn btn-success" id="messageAddBtn"><i class="fas fa-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody id="messageItem">
                        {{-- Generated Items --}}
                    </tbody>
                </table>
            </div>
            <hr>
            {{-- ----------End of Programs table---------- --}}

            <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-group col-md-2">
                        <label for="rating" class="form-label">Rating</label>
                        <input type="number" class="form-control" id="rating" min="0" max="5" name="rating">
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