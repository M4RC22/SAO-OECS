@extends('layouts.app')

@section('content')
<div class="container">
            
    <h3>Activity Proposal Form</h3>

    <hr style="height:3px;">

    <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">

        {{-- ----------Form 1: First part---------- --}}

        <form action="#" class="row g-3">

            {{-- ----------R1---------- --}}

            <div class="form-group col-md-3">
                <label for="eventDate" class="form-label">Target Date of Activity</label>
                <input type="date" class="form-control" id="eventDate" value="<?php echo date('Y-m-d'); ?>" required>
            </div>
            
            <div class="form-group col-md-3 "> {{-- di ako sure dito kaya text --}}
                <label for="activityDuration" class="form-label">Duration of Activity</label>
                <input type="text" class="form-control" id="activityDuration" required>
            </div>

            <div class="form-group col-md-6">
                <label for="venue" class="form-label">Venue</label>
                <input type="text" class="form-control" id="venue" required>
            </div>

            {{-- ----------R2---------- --}}

            <div class="form-group col-md-4">
                <label for="activityTitle" class="form-label">Activity Title</label>
                <input type="text" class="form-control" id="activityTitle" required>
            </div>

            <div class="form-group col-md-4">
                <label for="orgName">Name of Organization</label>
                <select class="form-control" id="orgName" required>
                <option selected>Select one</option>
                <option>...</option>
                </select>
            </div>

            <div class="form-group col md-4">
                <label for="dateSubmitted" class="form-label">Date Submitted</label>
                <input type="date" class="form-control" id="dateSubmitted" value="<?php echo date('Y-m-d'); ?>" required>
            </div>

            {{-- ----------R3---------- --}}

            <div class="form-group col-md-4 ">
                <label for="organizerName" class="form-label">Name of Organizer</label>
                <input type="text" class="form-control" id="organizerName" placeholder="First Name Last Name" required>
            </div>

            <div class="form-group col-md-4 ">
                <label for="orgContactNum" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="orgContactNum" placeholder="09123456789" required>
            </div>
            
            <div class="form-group col-md-4 ">
                <label for="orgEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="orgEmail" placeholder="abc@domain.com.ph" required>
            </div>

            {{-- ----------R4---------- --}}

            <div class="form-group col-md-12 d-flex row">
                <div class="col-md-4">
                    <label for="coorgName">Co-Organization</label>
                    <select class="form-control" id="coorgName" required>
                    <option selected>Select one</option>
                    <option>...</option>
                    </select>
                </div>
            </div>
        </form>
        
        {{-- ----------R5 / Form 2: Coorganizer Add ---------- --}}
        <hr>

        <div>
            <form action="" class="row g-3" id="coorgForm">
                <div class="form-group col-md-4 ">
                    <label for="coorganizer" class="form-label">Co-Organizer/s</label>
                    <input type="text" class="form-control" id="coorganizer" placeholder="First Name Last Name" required>
                </div>
    
                <div class="form-group col-md-3 ">
                    <label for="coorgContactNum" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="coorgContactNum" placeholder="09123456789" required>
                </div>
    
                
                <div class="form-group col-md-3 ">
                    <label for="coorgEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="coorgEmail" placeholder="abc@domain.com.ph" required>
                </div>
    
                <div class="col-md-2 pt-3 d-flex align-items-center">
                    <button class="btn btn-success col-md-12" id="addBtn">Add</button>
                </div>
            </form>
    
            {{-- ----------Table: Coorganizer---------- --}}

            <div id="table-wrapper"  class="pre-scrollable mt-3">
                <table class="table table-striped col-md-12">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th scope="col">Co-organizers</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="coorgItems">
                        <tr>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <hr>
        {{-- ----------Form 3: Third part---------- --}}

        <form action="#" class="row g-3">

            {{-- ----------R6---------- --}}

            <div class="col-md-12 d-flex row">
                <div class="form-group col-md-4">
                    <label for="actClass">Activity Classification</label>
                    <select class="form-control" id="actClass" required>
                    <option selected>Select one</option>
                    <option>...</option>
                    </select>
                </div>

                <div class="form-group col-md-4 d-flex justify-content-around">
                    <div class="form-check form-check-inline align-self-end">
                        <input class="form-check-input" type="radio" name="eventType" id="incampus" value="1">
                        <label class="form-check-label" for="inlineRadio1">In-Campus</label>
                    </div>
                    <div class="form-check form-check-inline align-self-end">
                        <input class="form-check-input" type="radio" name="eventType" id="offcampus" value="2">
                        <label class="form-check-label" for="offcampus">Off-Campus</label>
                    </div>
                </div>
            </div>

            {{-- ----------R7---------- --}}

            <div class="form-group form-floating col-md-12">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" style="height: 150px" required></textarea>
            </div>

            {{-- ----------R8---------- --}}

            <div class="form-group form-floating col-md-12">
                <label for="rationale">Rationale</label>
                <textarea class="form-control" id="rationale" style="height: 150px" required></textarea>
            </div>


            {{-- ----------R9---------- --}}

            <div class="form-group form-floating col-md-12">
                <label for="outcome">Outcome</label>
                <textarea class="form-control" id="outcome" style="height: 150px" required></textarea>
            </div>

            <p class="col-md-12 fst-italic text-secondary">*If it is classified as a Workshop/Training/Seminar/Symposium/Forum/Team Building, Learning outcomes or objectives should be written here.<br></p>

            {{-- ----------R10---------- --}}

            <div class="col-md-12 d-flex row">
                <div class="form-group col-md-4 ">
                    <label for="primaryAud" class="form-label">Primary target audience/beneficiary</label>
                    <input type="text" class="form-control" id="primaryAud" placeholder="e.g. Students" required>
                </div>

                <div class="form-group col-md-3 ">
                    <label for="primaryNum" class="form-label">Number of participants/beneficiary</label>
                    <input type="number" class="form-control" id="primaryNum" required>
                </div>
            </div>

            {{-- ----------R11---------- --}}

            <div class="col-md-12 d-flex row">
                <div class="form-group col-md-4 ">
                    <label for="secondaryAud" class="form-label">Secondary target audience/beneficiary</label>
                    <input type="text" class="form-control" id="secondaryAud" placeholder="e.g. Students" required>
                </div>

                <div class="form-group col-md-3 ">
                    <label for="secondaryNum" class="form-label">Number of participants/beneficiary</label>
                    <input type="number" class="form-control" id="secondaryNum" required>
                </div>
            </div>
        </form>

        {{-- ----------R12 / Form 4: Programme Form Add---------- --}}
        <hr>

        <div>    
            <form method="" action="" id="programmeForm" class="row g-3">
                <div class="form-group col-md-4">
                    <label for="programme" class="form-label">Activity Title</label>
                    <input class="form-control" id="programme" type="text" required />
                </div>

                <div class="form-group col-md-3">
                    <label for="progStartDate" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="progStartDate" value="<?php echo date('Y-m-d'); ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="progEndDate" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="progEndDate" value="<?php echo date('Y-m-d'); ?>" required>
                </div>

                <div class="col-md-2 pt-3 d-flex align-items-center">
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
                    <tbody id="programmeItems">
                        <tr>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>

        {{-- ----------Important Notes---------- --}}

        <p class="col-md-12 fst-italic text-secondary">*IMPORTANT NOTES:
            <br>1. The Activity Proposal Form must be submitted at least two (2) weeks before the event.
            <br>2. Activities will not be approved if its date/s falls one (1) week before the midterms or final exams, or if its date falls exactly on the midterms or finals week. Activities with dates falling on term break will be approved provided that participants will be required to submit waivers.
            <br>3. It is the responsibility of the organization to inquire and prepare for the logistical needs and follow them up after the approval of their proposal.
            <br>
        </p>

        {{-- ----------Button submit all forms---------- --}}
        
        <div class="col-md-12">
            <button type="button" class="btn btn-primary" onclick="submitForms()">Submit</button>
        </div>

        

    </div>


    
</div> 
@endsection