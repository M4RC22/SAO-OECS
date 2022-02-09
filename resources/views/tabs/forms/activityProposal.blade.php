@extends('layouts.app')

@section('content')
<div class="container">
            
        <h3>Activity Proposal Form</h3>

        <hr style="height:3px;">

    <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">

        <form action="{{ route('activityProposalAdd') }}" id="apfForms" method="POST">
            {{ csrf_field() }}

            {{-- ----------R1---------- --}}

            <div class="row g-3">

                <div class="form-group col-md-3">
                    <label for="eventDate" class="form-label">Target Date of Event</label>
                    <input type="date" class="form-control" id="eventDate" value="<?php echo date('Y-m-d'); ?>" name="eventDate">
                </div>

                <div class="form-group col-md-3 ">
                    <div class="row g-3">
                    <label for="durationVal" class="form-label col-md-12">Duration of Event</label>
                    <input type="number" class="form-control col-md-5" id="durationVal" min="0" name="durationVal">
                    <select class="form-control col-md-7" id="durationUnit" name="durationUnit">
                        <option value="days">Days</option>
                        <option value="weeks">Weeks</option>
                        <option value="months">Months</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="venue" class="form-label">Venue</label>
                    <input type="text" class="form-control" id="venue" name="venue">
                </div>

            {{-- ----------R2---------- --}}

                <div class="form-group col-md-4">
                    <label for="eventTitle" class="form-label">Event Title</label>
                    <input type="text" class="form-control @error('eventTitle') is-invalid @enderror" id="eventTitle" name="eventTitle" value="{{ old('eventTitle') }}">
                    @error('eventTitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="orgName">Name of Organization</label>
                    <input type="text" class="form-control" id="orgName" name="orgName" value="{{$org[0] -> orgName}}" disabled/>
                </div>

                <div class="form-group col md-4">
                    <label for="dateSubmitted" class="form-label">Date Submitted</label>
                    <input type="date" class="form-control" id="dateSubmitted" value="<?php echo date('Y-m-d'); ?>" name="dateSubmitted">
                </div>

                {{-- ----------R3---------- --}}

                <div class="form-group col-md-4 ">
                    <label for="organizerName" class="form-label">Name of Organizer</label>
                    <select class="form-control" id="organizer" name="organizer">
                        <option selected disabled>Select one</option>
                        @foreach($orgMembers as $member)
                        <option>{{$member[0] -> firstName}} {{$member[0] -> lastName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


        {{-- ----------Table: Coorg---------- --}}
            <hr>

            <div id="table-wrapper" class="pre-scrollable mt-3">
                <table class="table table-hover col-md-12">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th scope="col">Co-organization</th>
                            <th scope="col">Co-organizers</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="text-right"><a href="javascript:void(0)" class="btn btn-success" id="apfCoorgAddBtn"><i class="fas fa-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody id="coorgItems">
                        {{-- Generated Items --}}
                    </tbody>
                </table>
            </div>
            <hr>
        {{-- ----------End of Coorg table---------- --}}


            {{-- ----------R6---------- --}}
            <div class="row g-3">
                <div class="col-md-12 d-flex row">
                    <div class="form-group col-md-4">
                    <label for="actClassificationB">Activity Classification</label>
                        <select class="form-control" name="actClassificationB">
                            <option hidden>Select Here</option>
                            <option value="t1">Workshop/Seminar/Training/Symposium/Forum/Team Building</option>
                            <option value="t2">Games/Competition</option>
                            <option value="t3">Social Event/Party/Celebration</option>
                            <option value="t4">CSR/Community Service</option>
                            <option value="t5">Marketing</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4 ml-3">
                        <label for="actClassificationA">Activity Classification</label>
                            <select class="form-control" name="actClassificationA">
                                <option hidden>Select Here</option>
                                <option value="In-Campus">In-Campus</option>
                                <option value="Off-Campus">Off-Campus</option>
                            </select>
                    </div>
                </div>
            </div>

            {{-- ----------Table: Logistics---------- --}}
            <hr>
            

            <div id="table-wrapper" class="pre-scrollable mt-3">
                <table class="table table-hover col-md-12">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th scope="col">Items/Service/Support</th>
                            <th scope="col">Date Needed</th>
                            <th scope="col">Venue</th>
                            <th scope="col" class="text-right"><a href="javascript:void(0)" class="btn btn-success" id="apfLogisticsAddBtn"><i class="fas fa-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody id="logisticsItems">
                        {{-- Generated Items --}}
                    </tbody>
                </table>
            </div>
            <hr>
        {{-- ----------End of Coorg table---------- --}}








                {{-- ----------R7---------- --}}
            <div class="row g-3">
                <div class="form-group form-floating col-md-12">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" style="height: 150px" name="description"></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- ----------R8---------- --}}

                <div class="form-group form-floating col-md-12">
                    <label for="rationale">Rationale</label>
                    <textarea class="form-control" id="rationale" style="height: 150px" name="rationale"></textarea>
                </div>


                {{-- ----------R9---------- --}}

                <div class="form-group form-floating col-md-12">
                    <label for="outcome">Outcome</label>
                    <textarea class="form-control" id="outcome" style="height: 150px" name="outcome"></textarea>
                </div>

                <p class="col-md-12 fst-italic text-secondary">*If it is classified as a Workshop/Training/Seminar/Symposium/Forum/Team Building, Learning outcomes or objectives should be written here.<br></p>

                {{-- ----------R10---------- --}}

                <div class="col-md-12 d-flex row">
                    <div class="form-group col-md-4 ">
                        <label for="primaryAud" class="form-label">Primary target audience/beneficiary</label>
                        <input type="text" class="form-control" id="primaryAud" placeholder="e.g. Students" name="primaryAud">
                    </div>

                    <div class="form-group col-md-3 ">
                        <label for="primaryNum" class="form-label">Number of participants/beneficiary</label>
                        <input type="number" class="form-control" id="primaryNum" name="primaryNum">
                    </div>
                </div>

                {{-- ----------R11---------- --}}

                <div class="col-md-12 d-flex row">
                    <div class="form-group col-md-4 ">
                        <label for="secondaryAud" class="form-label">Secondary target audience/beneficiary</label>
                        <input type="text" class="form-control" id="secondaryAud" placeholder="e.g. Students" name="secondaryAud">
                    </div>

                    <div class="form-group col-md-3 ">
                        <label for="secondaryNum" class="form-label">Number of participants/beneficiary</label>
                        <input type="number" class="form-control" id="secondaryNum" name="secondaryNum">
                    </div>
                </div>
            </div>
        

            {{-- ----------Table: Activity---------- --}}

            <hr>

            {{-- ----------Table: Activity Table---------- --}}
            <hr>

            <div id="table-wrapper" class="pre-scrollable mt-3">
                <table class="table table-hover col-md-12">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th scope="col">Activity</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col" class="text-right"><a href="javascript:void(0)" class="btn btn-success" id="apfActAddBtn"><i class="fas fa-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody id="programmeItems">
                        {{-- <tr>
                            <td><input class="form-control" id="programme" type="text" name="programme[]"/></td>
                            <td><input type="date" class="form-control" id="progStartDate" value="<?php echo date('Y-m-d'); ?>" name="progStartDate[]"></td>
                            <td><input type="date" class="form-control" id="progEndDate" value="<?php echo date('Y-m-d'); ?>" name="progEndDate[]"></td>
                            <td class="float-right"><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
            <hr>
            {{-- ----------End of Coorg table---------- --}}

            <hr>
            {{-- ----------Important Notes---------- --}}

            <p class="col-md-12 fst-italic text-secondary">*IMPORTANT NOTES:
                <br>1. The Activity Proposal Form must be submitted at least two (2) weeks before the event.
                <br>2. Activities will not be approved if its date/s falls one (1) week before the midterms or final exams, or if its date falls exactly on the midterms or finals week. Activities with dates falling on term break will be approved provided that participants will be required to submit waivers.
                <br>3. It is the responsibility of the organization to inquire and prepare for the logistical needs and follow them up after the approval of their proposal.
                <br>
            </p>
            {{-- ----------Submit---------- --}}

            <div class="form-group">
                <button class="btn btn-primary" id="apfSubmit" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div> 
@endsection