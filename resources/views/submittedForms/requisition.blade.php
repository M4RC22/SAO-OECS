@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Requisition Report - For Checking</h3>

    <hr style="height:3px;">

    <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">

        {{-- ----------R1---------- --}}
        <div class="d-flex justify-content-between col-md-8">
            <p><b>Event Title: </b>{{$form -> eventTitle}}</p>
            <p><b>Event Date: </b>{{\Carbon\Carbon::parse($requisition -> eventdate)->format('F d, Y ')}}</p>
        </div>
            
        {{-- ----------R2---------- --}}
        <hr style="height:0.5px; width:100%; margin-top:0px;">

        <div class="form-group col-md-12 ">
            <p class="font-weight-bold">Control Number: <span class="text-break font-weight-normal">
            {{$requisition -> controlNum}}</span></p>
        </div>
        <div class="form-group col-md-12 ">
            <p class="font-weight-bold">Type: <span class="text-break font-weight-normal">
            {{$requisition -> type}}</span></p>
        </div>
        <div class="form-group col-md-12 ">
            <p class="font-weight-bold">Date Needed: <span class="text-break font-weight-normal">
            {{$requisition -> dateNeeded}}</span></p>
        </div>
        <div class="form-group col-md-12 ">
            <p class="font-weight-bold">Charged Department: <span class="text-break font-weight-normal">
            {{$requisition -> chargedDepartment}}</span></p>
        </div>



        {{-- Table: Items --}}

        <hr style="height:3px;">

        <h5 class="mb-3">A. Pier Dem</h5>

        <div id="table-wrapper" class="form-group row col-md-12 d-flex pre-scrollable mt-2">
            
            <table class="table table-striped col-md-12">
                <thead class="table-light sticky-top">
                    <tr>
                        <th scope="col">Date Bought</th>
                        <th scope="col">Particular</th>
                        <th scope="col">Amount / Day</th>
                    </tr>
                </thead>
                <tbody id="items">
                    @foreach($requisitionItem as $item)
                    <tr>
                        <td>{{$item -> quantity}}</td>
                        <td>{{$item -> purpose}}</td>
                        <td>{{$item -> unitCost}}</td>
                    </tr>    
                    @endforeach
                </tbody>
                <tfoot class="table-light" style="position: sticky;
                    bottom: 0;
                    z-index: 1;">
                        <tr>
                            <td></td>
                            <td class="text-right"><strong>Total:</strong></td>
                            <td><span>&#8369;</span><span id="totalExpense">{{$item -> sum('unitCost')}}</span></td>
                        </tr>
                    </tfoot>
            </table>
        </div>

            {{-- ----------Button---------- --}}

            <div class="form-group col-md-12 ">
                <p class="font-weight-bold">Remarks: <span class="text-break font-weight-normal">
                {{$requisition -> remarks}}</span></p>
            </div>
                
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary col-md-2 mt-4" onclick="window.location.href='/submittedForms/details/{{$form->id}}';">
                        Approve
                    </button>
                    <button type="button" class="btn btn-danger col-md-2 mt-4" type="submit">
                        Deny
                    </button>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection