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
      

            {{-- Programs Table Starts --}}
            
            <div id="table-wrapper">
                <table class="table table-striped table-sm mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Activity</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="items">
                        <tr>
                            <th scope="row">Help to save the world from devastation</th>
                            <td>01-22-2022</td>
                            <td>01-30-2022</td>
                            <td><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md- pt-3 d-flex align-items-center">
                <button class="btn btn-primary" id="mainFormBtn" type="submit">Submit</button>
            </div>

            {{-- ----------R4---------- --}}
<!-- 
            <a href="#" class="btn btn-success mt-2" type="submit">Add</a>

        <div class="form-title mt-5 fw-bold fs-4">
            Official Poster
        </div>

        <div class="mb-5 mt-2 py-1">
            <label for="officialposter" class="form-label fst-italic fw-lighter opacity-75">Upload a photo. (.jpg .png)</label>
            <input class="form-control form-control-sm w-25" id="poster" type="file"/>
        </div>

            <div class="row">
            <div class="col-4 pb-3">
                <img src="/img/post1.jpg" class="w-100">
            </div>
    <div> -->
    
</div>



@endsection