@extends('layouts.app')

@section('content')
   
    <div class="container">
            
        <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">

        @if(session()->has('errorInSubmission'))
        <script>
            $(window).ready(() => {
                $('#errorInSubmission').modal('show');
                $("#errorSubmission").on('click', function(){
                    $("#errorInSubmission").modal('hide');
                });
            });
        </script>
        @endif
            @if($submitted === true)
            <p><b>You already submitted the application!</b> Please wait for SAO Head's response thank you!</p>

            @else
            <form action="/apply/{{ Auth::user()->id}}" class="row g-3" id="applicationForm" method="POST">
            {{ csrf_field() }}

                {{-- ----------R1---------- --}}

                <div class="form-group col-md-6 ">
                    <label for="orgName" class="form-label">Organization Name</label>
                    <input type="text" class="form-control" id="orgName" name="orgName" required>
                </div>

                <div class="form-group col-md-6 ">
                    <label for="president" class="form-label">President</label>
                    <input type="email" class="form-control" id="presidentEmail" name="presidentEmail" required>
                    <h6 class="text-secondary">Note: *Please use APC Email.</h6>
                </div>

                <div class="form-group col-md-12 ">
                    <label for="president" class="form-label">Organization Description</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>

                {{-- ----------Apply Button---------- --}}

                <div class="col-md-3">
                    <button type="submit" class="btn btn-success align-self-center">Apply</button>
                </div>
            </form>
            @endif
        </div> 
    </div>

{{-- ------errorInSubmission------ --}}
<div class="modal fade" id="errorInSubmission" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            {{-- ------Header------ --}}
            <div class="modal-header" style="background: #e7ae41">
                <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">You already submitted an entry.</i></h4>
            </div>           
            {{-- ------Body------ --}}
            <div class="modal-body">
                <div class="header-btn">
                    <div id="div-physical">
                        @if(session()->has('errorInSubmission'))
                            <div class="alert alert-danger mt-2">
                                {{ session()->get('errorInSubmission') }}
                            </div>
                        @endif
                    </div>      
                </div>
                <button type="button" class="btn btn-success col-md-3 mt-md-3 float-right" data-dismiss="modal"  id="errorSubmission" aria-label="Close">Okay</button>
            </div>
        </div>
    </div>
</div>

    
    
@endsection