@extends('layouts.app')

@section('content')
   
    <div class="container">
        
            <h3>Budget Requisition Form</h3>

            <hr style="height:3px;">
        
        <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">
        
            <form action="#" class="row g-3">
    
                {{-- ----------R1---------- --}}
    
    
                <div class="form-group col-md-3 ">
                    <label for="controlNum" class="form-label">Control Number</label>
                    <input type="text" class="form-control" id="controlNum" required>
                </div>
    
                <div class="form-group col-md-3">
                    <label for="dateFiled" class="form-label">Date Filed</label>
                    <input type="date" class="form-control" id="dateFiled" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
    
                <div class="form-group col-md-3">
                    <label for="dateNeeded" class="form-label">Date Needed</label>
                    <input type="date" class="form-control" id="dateNeeded" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
    
    
                {{-- ----------R2 Radio Buttons---------- --}}
    
                <div class="d-flex col-md-3">
                    <div class="form-group col-md-3 d-flex align-self-end">
                        <div class="form-check form-check-inline align-self-end">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="incampus" value="1">
                            <label class="form-check-label" for="inlineRadio1">Payment</label>
                        </div>
                        <div class="form-check form-check-inline align-self-end">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="offcampus" value="2">
                            <label class="form-check-label" for="offcampus">Purchase</label>
                        </div>
                    </div>
                </div>
    
                {{-- ----------R3-Table--------- --}}
    
                <table class="table table-striped table-bordered col-md-12">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Particulars/Purpose</th>
                        <th scope="col">Unit Cost</th>
                        <th scope="col">Total Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>
                    </tbody>
                </table>
    
                {{-- ----------Add/Del Button---------- --}}
                
                <div class="col-md-12">
                    <button type="button" class="btn btn-success">Add</button>
                    <button type="button" class="btn btn-danger">Remove</button>
                </div>
    
                {{-- ----------Textareas---------- --}}
    
                <div class="form-group form-floating col-md-12">
                    <label for="remarks">Remarks</label>
                    <textarea class="form-control" id="remarks" style="height: 150px" required></textarea>
                </div>
    
    
                <div class="form-group col-md-4 ">
                    <label for="" class="form-label">Charge to</label>
                    <input type="text" class="form-control" id="primaryNum" placeholder="Department/Unit" srequired>
                </div>
    
                {{-- ----------Submit---------- --}}
                
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div> 
        
    </div>
    
@endsection