@extends('layouts.app')

@section('content')
   
    <div class="container">
            
        <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">
        
            <form action="#" class="row g-3">

                {{-- ----------R1---------- --}}

                <div class="form-group col-md-5 ">
                    <label for="orgName" class="form-label">Organization Name</label>
                    <input type="text" class="form-control" id="orgName" required>
                </div>

                <div class="form-group col-md-4 ">
                    <label for="president" class="form-label">President</label>
                    <input type="text" class="form-control" id="president" required>
                    <h6 class="text-secondary">Note: *Please use APC Email.</h6>
                </div>

                {{-- ----------Apply Button---------- --}}

                <div class="col-md-3 d-flex justify-content-around">
                    <button type="button" class="btn btn-success align-self-center">Apply</button>
                </div>
        
            </form>
        </div> 
    </div>
    
    
@endsection