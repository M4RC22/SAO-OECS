@extends('layouts.app')

@section('content')
   
    <div class="container">
            
        <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">
        
            <form action="/apply/{{ Auth::user()->id}}" class="row g-3" id="applicationForm" method="POST">
            {{ csrf_field() }}

                {{-- ----------R1---------- --}}

                <div class="form-group col-md-5 ">
                    <label for="orgName" class="form-label">Organization Name</label>
                    <input type="text" class="form-control" id="orgName" name="orgName" required>
                </div>

                <div class="form-group col-md-4 ">
                    <label for="president" class="form-label">President</label>
                    <input type="email" class="form-control" id="presidentEmail" name="presidentEmail" required>
                    <h6 class="text-secondary">Note: *Please use APC Email.</h6>
                </div>

                {{-- ----------Apply Button---------- --}}

                <div class="col-md-3 d-flex justify-content-around">
                    <button type="submit" class="btn btn-success align-self-center">Apply</button>
                </div>
            </form>
        </div> 
    </div>
    
    
@endsection