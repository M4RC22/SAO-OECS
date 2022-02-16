@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Liquidation Form - For Checking</h3>

    @if(session()->has('errorInApproval'))
    <script>
        $(window).ready(() => {
            $('#modalApprove').modal('show');
            $("#closeModalApprove").on('click', function(){
                $("#modalApprove").modal('hide');
            });
        });
    </script>
    @elseif(session()->has('errorInDeny'))
    <script>

        $(window).ready(() => {
            $('#modalDeny').modal('show');

            $("#closeModalDeny").on('click', function(){
                $("#modalDeny").modal('hide');
            });
        });
    </script>
    @endif

    <hr style="height:3px;">

    <div class="container shadow p-3 mb-5 bg-#fff rounded mt-3">

        {{-- ----------R1---------- --}}

        <div class="row d-flex justify-content-between">
            <div class="col-md-5">
                <p><b>Event Title:</b> {{$form -> eventTitle}}</p>
            </div>
            <div class="col-md-5">
                <p><b>Date Submitted:</b> {{\Carbon\Carbon::parse($liquidation -> eventDate)->format('F d, Y')}}</p>
            </div>
        </div>  

        <hr style="height:0.5px; width:100%; margin-top:0px;">


        {{-- ----------R2---------- --}}

        <div class="row d-flex justify-content-between">
            <div class="col-md-5">
                <p><b>Cash Advance:</b> &#8369;{{$liquidation -> cashAdvance}}</p>
            </div>
            <div class="col-md-5">
                <p><b>CV Number:</b> {{$liquidation -> cvNumber}}</p>
            </div>
        </div>  


        {{-- ----------R3---------- --}}

        <div class="row d-flex justify-content-between">
            <div class="col-md-5">
                <p><b>Deduct:</b> &#8369;{{$liquidation -> deduct}}</p>
            </div>
        </div>  
                
               
        {{-- ----------Table: Activity---------- --}}

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
                    @foreach($liquidationItems as $item)
                    <tr>
                        <td>{{\Carbon\Carbon::parse($item -> dateBought)->format('F d, Y')}}</td>
                        <td>{{$item -> particulars}}</td>
                        <td><span>&#8369;</span>{{$item -> amountPerDay}}</td>
                    </tr>    
                    @endforeach
                </tbody>
                <tfoot class="table-light" style="position: sticky;
                    bottom: 0;
                    z-index: 1;">
                        <tr>
                            <td></td>
                            <td class="text-right"><strong>Total:</strong></td>
                            <td><span>&#8369;</span><span id="totalExpense">{{$liquidationItems -> sum('amountPerDay') }}</span></td>
                        </tr>
                    </tfoot>
            </table>
        </div>


        {{-- ----------IMAGE SECTION---------- --}}
        <div class="d-block">
            <h5 class="mt-5">Reciept:</h5>

            <div class="row" id="poster">
                @foreach($proofOfPayments as $item)
                <div class="col-4 pb-3">
                    <img src="/storage/{{$item -> image}}" class="w-100"> 
                </div>      
                @endforeach 
            </div>
        </div>
        {{-- ------Row 11(Approve and Deny Button)------ --}}
        <div class="row">
            <div class="col-md-12">
               @include('layouts.modal')
            </div>
        </div> 
    </div>
</div>
@endsection