@extends('layouts.app')

@section('content')
   
<div class="container">
        
        <h3>Budget Requisition Form</h3>

        <hr style="height:3px;">
    
    <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">

        {{-- --------- FORM ---------- --}}
    
        <form action="{{ route('requisitionAdd') }}" id="reqForms" method="POST">
            {{ csrf_field() }}
            

            {{-- Event --}}
            <div class="row g-3">
                <div class="form-group col-md-6">
                    <label for="eventTitle">Event Title</label>
                    <select class="form-control  @error('eventTitle') is-invalid @enderror" name="eventTitle">
                        <option selected disabled>Select One</option>
                        @foreach($orgForms as $eventTitle)
                        <option value="{{$eventTitle -> eventTitle}}">{{$eventTitle -> eventTitle}}</option>
                        @endforeach
                    </select>
                    @error('eventTitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="dateFiled" class="form-label">Date Filed</label>
                    <input type="date" class="form-control @error('dateFiled') is-invalid @enderror" id="dateFiled" value="<?php echo date('Y-m-d'); ?>" name="dateFiled" disabled>
                    @error('dateFiled')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                    
            </div>

            {{-- ----------R1---------- --}}
            <div class="row g-3">

                <div class="form-group col-md-6">
                    <label for="dateNeeded" class="form-label">Date Needed</label>
                    <input type="date" class="form-control @error('dateNeeded') is-invalid @enderror" id="dateNeeded" name="dateNeeded">
                    @error('dateNeeded')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="paymentMethod">Payment</label>
                    <select class="form-control @error('paymentMethod') is-invalid @enderror" name="paymentMethod">
                        <option selected disabled>Select One</option>
                        <option value="payment">Payment</option>
                        <option value="purchase">Purchase</option>
                    </select>
                    @error('paymentMethod')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
                            <th scope="col" class="text-right"><button type="button" class="btn btn-success" id="reqAddBtn"><i class="fas fa-plus"></i></button></th>
                        </tr>
                    </thead>
                    <tbody id="reqItems">
                            {{-- Holder --}}
                    </tbody>
                    <tfoot class="table-light" style="position: sticky; bottom: 0; z-index: 1;">
                        <tr>
                            <td></td>
                            <td class="text-right"><strong>Total:</strong></td>
                            <td>&#8369;<span id="totalCost"> 0</span></td>
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
                    <label for="chargeTo">Charge To</label>
                    <input type="text" class="form-control @error('chargeTo') is-invalid @enderror" id="chargeTo" name="chargeTo">
                    @error('chargeTo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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