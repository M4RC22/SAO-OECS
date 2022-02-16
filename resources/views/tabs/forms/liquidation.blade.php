@extends('layouts.app')

@section('content')
<div class="container">

        <h3>Liquidation Form</h3>

        <hr style="height:3px;">

    <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">
        <form action="{{ route('liquidationAdd') }}" method="POST" id="liqForms" enctype="multipart/form-data">
            {{ csrf_field() }}

            {{-- ----------R1---------- --}}
            
            {{-- Event --}}
            <div class="row g-3">

            <div class="form-group col-md-4">
                    <label for="enddate" class="form-label">Event Title</label>
                    <input type="text" class="form-control w-100 @error('eventTitle') is-invalid @enderror" id="eventTitle" name="eventTitle">
                    @error('eventTitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                
                <div class="form-group col-md-4">
                    <label for="enddate" class="form-label">Event Date</label>
                    <input type="date" class="form-control w-100 @error('eventDate') is-invalid @enderror" id="eventDate" name="eventDate">
                    @error('eventDate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="name" class="form-label">Cash Advance</label>
                    <input type="number" class="form-control w-100 @error('cashAdvance') is-invalid @enderror" id="cashAdvance" name="cashAdvance" placeholder="PHP">
                    @error('cashAdvance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                {{-- ----------R2---------- --}}
        
                <div class="form-group col-md-4">
                    <label for="event" class="form-label">Cv Number</label>
                    <input type="number" class="form-control w-100 @error('cvNumber') is-invalid @enderror" id="cvNumber" name="cvNumber">
                    @error('cvNumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="event" class="form-label">Deduct</label>
                    <input type="number" class="form-control w-100 @error('deduct') is-invalid @enderror" id="deduct" name="deduct" placeholder="PHP">
                    @error('deduct')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>  

                <div class="col-md-4"></div>
            </div>


            {{-- ----------Table: Expenses Table---------- --}}
            
            <h3 class="col-md-12">A. Pier Dem</h3>
            <hr>

            <div id="table-wrapper" class="pre-scrollable mt-3">
                <table class="table table-hover col-md-12">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th scope="col">Date Bought</th>
                            <th scope="col">Particular</th>
                            <th scope="col">Amonunt/Day</th>
                            <th scope="col" class="text-right"><a href="javascript:void(0)" class="btn btn-success" id="liqAddBtn"><i class="fas fa-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody id="liqItems">
                        {{-- Generated Items --}}
                    </tbody>
                    <tfoot class="table-light" style="position: sticky;
                        bottom: 0;
                        z-index: 1;">
                           {{--  <tr>
                                <td></td>
                                <td class="text-right"><strong>Total:</strong></td>
                                <td><span>&#8369;</span><span id="totalExpense">0</span></td>
                                <td></td>
                            </tr> 
                            --}}
                        </tfoot>
                </table>
            </div>
            <hr>
            {{-- ----------End of Expenses table---------- --}}

            

            {{-- ----------Upload Proof of Payment---------- --}}
            <div class="row g-3">
                <div class="d-block">
                    <div class="h3 form-title mt-5 col-md-4">
                        <h3 class="col-md-4">Receipt</h3>
                    </div>
                    
                    <div class="mb-5 mt-2 py-1 col-md-12">
                        <p for="uploadReceipt" class="fst-italic text-secondary">Upload a photo. (.jpg .png)</p>
                        <input class="form-control-sm w-100" id="receipt" type="file" name="receipt[]"multiple/>
                    </div>

                    <div class="row" id="receiptHolder">
                    
                    </div>
                    
                    <p class="text-break fst-italic fst-italic text-secondary mt-5">*IMPORTANT NOTE:<br>
                        All expenses should be supported with receipts. Breakdown of expenses should be attached if needed. Liquidation 
                        Report shall be submitted to Accounting within 5 working days after the completion of the event for which the cash 
                        advance is taken. Failure to do so is tantamount to one-time Payroll deduction for the unliquidated cash advance.
                    </p>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" id="reqSubmit">Submit</button>
            </div>

        </form>
    </div>
</div>
@endsection