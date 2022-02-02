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
        </form>

        {{-- ----------Form table---------- --}}

     <hr>

    <div>    
        <form method="" action="" id="reqForms" class="row g-3">
            <div class="form-group col-md-2">
                <label for="qty" class="form-label">Quantity</label>
                <input class="form-control" id="qty" type="number" required />
            </div>

            <div class="form-group col-md-5">
                <label for="particulars" class="form-label">Particulars/Purpose</label>
                <input type="text" class="form-control" id="particulars" required>
            </div>

            <div class="form-group col-md-3">
                <label for="cost" class="form-label">Cost</label>
                <input type="number" step="0.01"class="form-control" id="cost" required>
            </div>

            <div class="col-md-2 pt-3 d-flex align-items-center">
                <button class="btn btn-success col-md-12" id="reqAddBtn">Add</button>
            </div>
        </form>

        {{-- ----------Table: Activity---------- --}}

        <div id="table-wrapper" class="pre-scrollable mt-3">
            <table class="table table-striped col-md-12">
                <thead class="table-light sticky-top">
                    <tr>
                        <th scope="col">Quantity</th>
                        <th scope="col">Particulars/Purpose</th>
                        <th scope="col">Price</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="reqItems">
                    <tr>
                        {{-- Generated Items --}}
                    </tr>
                </tbody>
                <tfoot class="table-light" style="position: sticky;
                bottom: 0;
                z-index: 1;">
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right"><strong>Total:</strong></td>
                        <td><span>&#8369;</span><span id="totalCost">0</span></td>
                        <td></td>
                    </tr>
                  </tfoot>
            </table>
        </div>
    </div>

    <hr>


        
     {{-- ----------Textareas---------- --}}

        <form action="#" class="row g-3">
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