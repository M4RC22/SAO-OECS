@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Liquidation Form</h3>

    <hr style="height:3px;">

    <div class="main-section shadow p-3 mb-5 bg-#fff rounded mt-3">

        <div class="row mb-3 py-1 d-flex">
            <div class="col-sm-12 col-md-4 pb-3 d-block d-sm-block">
                <label for="event" class="form-label">Event Name</label>
                <input type="text" class="form-control w-100" id="event" name="event" placeholder="Event Name">
            </div>
            <div class="col-sm-12 col-md-4 pb-3 d-block d-sm-block">
                <label for="enddate" class="form-label">Event Date</label>
                <input type="date" class="form-control w-100" id="enddate" name="targetdate">
            </div>
            <div class="col-sm-12 col-md-4 pb-3 d-block d-sm-block">
                <label for="name" class="form-label">Cash Advance</label>
                <input type="number" class="form-control w-100" id="name" name="name" placeholder="PHP">
            </div>
        </div>
        <div class="row mb-3 py-1 d-flex">
                <div class="col-sm-12 col-md-4 pb-3 d-block d-sm-block">
                    <label for="event" class="form-label">Cv Number</label>
                    <input type="number" class="form-control w-100" id="event" name="event">
                </div>
                <div class="col-sm-12 col-md-4 pb-3 d-block d-sm-block">
                    <label for="event" class="form-label">Deduct</label>
                    <input type="number" class="form-control w-100" id="event" name="event" placeholder="PHP">
                </div>  
        </div>
            
        {{-- -----------Form---------- --}}

        <h3>A. Pier Dem</h3>

        <form method="" action="" id="liqForms" class="row g-3">
            <div class="form-group col-md-2">
                <label for="qty" class="form-label">Date Bought</label>
                <input class="form-control" id="dateBought" type="date" required />
            </div>

            <div class="form-group col-md-2">
                <label for="qty" class="form-label">Quantity</label>
                <input class="form-control" id="itemQty" type="number" required />
            </div>

            <div class="form-group col-md-4">
                <label for="particulars" class="form-label">Particulars/Purpose</label>
                <input type="text" class="form-control" id="items" required>
            </div>

            <div class="form-group col-md-2">
                <label for="cost" class="form-label">Amount/Day</label>
                <input type="number" step="0.01"class="form-control" id="amount" required>
            </div>

            <div class="col-md-2 pt-3 d-flex align-items-center">
                <button class="btn btn-success col-md-12" id="liqBtn">Add</button>
            </div>
        </form>

        {{-- ----------Table: Expenses---------- --}}

        <div id="table-wrapper" class="pre-scrollable mt-3">
            <table class="table table-striped col-md-12">
                <thead class="table-light sticky-top">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Particular</th>
                        <th scope="col">Amonunt/Day</th>
                        <th scope="col">Total Expense</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="liqItems">
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
                        <td></td>
                        <td class="text-right"><strong>Total:</strong></td>
                        <td><span>&#8369;</span><span id="totalExpense">0</span></td>
                        <td></td>
                    </tr>
                  </tfoot>
            </table>
        </div>

        {{-- ----------Upload Proof of Payment---------- --}}

        <h3>Reciept</h3>
        
        <div class="mb-5 mt-2 py-1">
            <p for="officialposter" class="fst-italic text-secondary">Upload a photo. (.jpg .png)</p>
            <input class="form-control-sm w-100" id="officialposter" type="file"/>
        </div>

        <div class="row">
            <div class="col-4 pb-3">
                <img src="" class="w-100">
            </div>
            
        </div>
        
        <p class="text-break fst-italic fst-italic text-secondary mt-5">*IMPORTANT NOTE:<br>
            All expenses should be supported with receipts. Breakdown of expenses should be attached if needed. Liquidation 
            Report shall be submitted to Accounting within 5 working days after the completion of the event for which the cash 
            advance is taken. Failure to do so is tantamount to one-time Payroll deduction for the unliquidated cash advance.
        </p>

        <button class="btn btn-primary mt-3" type="submit">
            Submit
        </button>
    </div>
</div>
@endsection