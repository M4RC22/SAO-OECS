@extends('layouts.app')

@section('content')
   
<div class="container">
        
        <h3>Budget Requisition Form</h3>

        <hr style="height:3px;">
    
    <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">

        {{-- --------- FORM ---------- --}}
    
        <form action="{{ route('requisitionAdd') }}" id="reqForms" method="POST">
            {{ csrf_field() }}
            

            {{-- ----------R1---------- --}}

            <div class="row g-3">
                <div class="form-group col-md-3 ">
                    <label for="controlNum" class="form-label">Control Number</label>
                    <input type="text" class="form-control" id="controlNum" name="controlNum">
                </div>

                <div class="form-group col-md-3">
                    <label for="dateFiled" class="form-label">Date Filed</label>
                    <input type="date" class="form-control" id="dateFiled" value="<?php echo date('Y-m-d'); ?>" name="dateFiled">
                </div>

                <div class="form-group col-md-3">
                    <label for="dateNeeded" class="form-label">Date Needed</label>
                    <input type="date" class="form-control" id="dateNeeded" value="<?php echo date('Y-m-d'); ?>" name="dateNeeded">
                </div>


                {{-- ----------R2 Radio Buttons---------- --}}

                <div class="form-group col-md-3">
                    <label for="paymentMethod" class="form-label">Payment Method</label>
                    <div>
                        <div class="form-check form-check-inline align-self-end">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="payment" value="payment">
                            <label class="form-check-label" for="payment">Payment</label>
                        </div>
                        <div class="form-check form-check-inline align-self-end">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="purchase" value="purchase">
                            <label class="form-check-label" for="purchase">Purchase</label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ----------Table: Activity---------- --}}
            <hr>

            <div id="table-wrapper" class="pre-scrollable mt-3">
                <table class="table table-hover col-md-12">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th scope="col">Quantity</th>
                            <th scope="col">Particulars/Purpose</th>
                            <th scope="col">Price</th>
                            <th scope="col">Cost</th>
                            <th scope="col" class="text-right"><a href="javascript:void(0)" class="btn btn-success" id="reqAddBtn"><i class="fas fa-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody id="reqItems">
                        {{-- <tr>
                            <td><input class="form-control" name="qty[]" type="number" id="qty"/></td>
                            <td><input class="form-control" name="particulars[]" type="text" id="particulars"></td>
                            <td><input class="form-control" name="cost[]" type="number" step="0.01" id="cost" ></td>
                            <td></td>
                            <td class="float-right"><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
                        </tr> --}}
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
            <hr>
            {{-- ----------End of Table Activity---------- --}}


            {{-- ----------Textareas---------- --}}

            <div class="row g-3">
                <div class="form-group form-floating col-md-12">
                    <label for="remarks">Remarks</label>
                    <textarea class="form-control" id="remarks" style="height: 150px" name="remarks"></textarea>
                </div>

                <div class="form-group col-md-4">
                        <label for="chargeTo">Charge to</label>
                        <select class="form-control" name="chargeTo">
                            <option hidden>Department/Unit</option>
                            <option value="t1">Test 1</option>
                            <option value="t2">Test 2</option>
                        </select>
                </div>
            </div>

            {{-- ----------Submit---------- --}}

            <div class="form-group">
                <button class="btn btn-primary" id="reqSubmit">Submit</button>
            </div>

        </form>

    </div> 
     
</div>
    
@endsection