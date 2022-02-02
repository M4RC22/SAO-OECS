@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Narrative Report</h3>

    <hr style="height:3px;">

    <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">

        <form action="#" class="row g-3">

            {{-- ----------R1---------- --}}

            <div class="form-group col-md-6">
                <label for="title" class="form-label">Event Title</label>
                <input type="text" class="form-control" id="title"  required>
            </div>

            

            <div class="form-group col-md-6">
                <label for="eventDate" class="form-label">Event Date</label>
                <input type="date" class="form-control" id="eventDate" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
           
            {{-- ----------R2---------- --}}
           
            <div class="form-group col-md-12">
                <label for="eventdesc" class="form-label">Narration</label>
                <textarea class="form-control" id="narration" style="height: 150px" required></textarea>
            </div>

            {{-- ----------R3---------- --}}
            
        </form>

                <form method="" action="" id="actTable" class="row">
                    <div class="form-group col-md-3">
                        <label for="actTitle" class="form-label">Activity Title</label>
                        <input class="form-control" id="actTitle" type="text" required />
                    </div>

                    <div class="form-group col-md-3">
                        <label class="form-label fw-bold" for="startDate" >Start Date</label>
                        <input class="form-control w-100" id="startDate" type="date" name="targetdate" required />
                    </div>

                    <div class="form-group col-md-3">
                        <label class="form-label fw-bold" for="endDate" >End Date</label>
                        <input class="form-control w-100" id="endDate" type="date" name="targetdate" required />
                    </div>

                    <div class="col-md-3 pt-3 d-flex align-items-center">
                        <button class="btn btn-success col-md-12" id="addBtn">Add</button>
                    </div>
                </form>
      

        {{-- ----------Table: Activity---------- --}}

        <div id="table-wrapper" class="pre-scrollable mt-3">
            <table class="table table-striped col-md-12">
                <thead class="table-light sticky-top">
                    <tr>
                        <th scope="col">Activity</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="items">
                    <tr>
                        {{-- Jquery generated --}} 
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="h3 form-title mt-5">
            Official Poster
        </div>

        <div class="mb-5 mt-2 py-1">
            <p for="officialposter" class="fst-italic text-secondary">Upload a photo. (.jpg .png)</p>
            <input class="form-control-sm w-100" id="officialposter" type="file"/>
        </div>

        <div class="row">
            <div class="col-4 pb-3">
                <img src="" class="w-100">
            </div>
            
            
        </div>
        

        <div class="h3 form-title">
            Photos
        </div>

        <div class="mb-5 mt-2 py-1">
            <p for="officialposter" class="fst-italic text-secondary">Upload a photo. (.jpg .png)</p>
            <input class="form-control-sm w-100" id="photos" type="file"/>
        </div>

        <div class="row">
            <div class="row">
                <div class="col-4 pb-3">
                    <img src="" class="w-100">
                </div>
               
            </div>
        
        </div>

            <button type="button" class="btn btn-primary mt-4" type="submit">Submit</button>
      </div>
</div>
    <hr>
</div>


@endsection