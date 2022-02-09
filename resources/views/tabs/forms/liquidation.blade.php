@extends('layouts.app')

@section('content')
<div class="container">

        <h3>Liquidation Form</h3>

        <hr style="height:3px;">

    <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">
        <form action="{{ route('liquidationAdd') }}" method="POST" id="liqForms">
            {{ csrf_field() }}

            {{-- ----------R1---------- --}}
            
            {{-- Event --}}
            <div class="row g-3">

                <div class="form-group col-md-4">
                    <label for="eventTitle">Event Title</label>
                    <select class="form-control" name="chargeTo">
                        {{-- @foreach($eventTitle as $event)
                        <option>{{$event[0] -> eventName}}</option>
                        @endforeach --}}
                    </select>
                </div>

                
                <div class="form-group col-md-4">
                    <label for="enddate" class="form-label">Event Date</label>
                    <input type="date" class="form-control w-100" id="enddate" name="targetdate">
                </div>
                <div class="form-group col-md-4">
                    <label for="name" class="form-label">Cash Advance</label>
                    <input type="number" class="form-control w-100" id="name" name="name" placeholder="PHP">
                </div>
            
                {{-- ----------R2---------- --}}
        
                <div class="form-group col-md-4">
                    <label for="event" class="form-label">Cv Number</label>
                    <input type="number" class="form-control w-100" id="event" name="event">
                </div>
                <div class="form-group col-md-4">
                    <label for="event" class="form-label">Deduct</label>
                    <input type="number" class="form-control w-100" id="event" name="event" placeholder="PHP">
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
                            <th scope="col">Date</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Particular</th>
                            <th scope="col">Amonunt/Day</th>
                            <th scope="col">Total Expense</th>
                            <th scope="col" class="text-right"><a href="javascript:void(0)" class="btn btn-success" id="liqAddBtn"><i class="fas fa-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody id="liqItems">
                        {{-- Generated Items --}}
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
                        <input class="form-control-sm w-100" id="uploadReceipt" type="file" onchange="image_selectReceipt()" multiple/>
                    </div>

                    <div class="row" id="imageReceipt">
                    
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