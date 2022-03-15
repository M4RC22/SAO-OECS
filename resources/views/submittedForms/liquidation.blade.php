@extends('layouts.app')

@section('content')
<div class="container">

    <h3>Liquidation Form - For Checking</h3>

    @if(session()->has('errorInDeny'))
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
                <p><b>Date Submitted:</b> {{\Carbon\Carbon::parse($form -> created_at)->format('F d, Y')}}</p>
            </div>
            <div class="col-md-5">
                <p><b>Organization Name</b> {{$form -> orgName}}</p>
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
            <button type="btn" class="btn btn-primary col-md-3 mt-md-5" onclick="window.location='{{ url('/submittedForms/details/'.$form->id .'/approve') }}'">Approve</button>
                <button type="btn" class="btn btn-danger col-md-3 mt-md-5" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#modalDeny">Deny</button>
            </div>
        </div> 
    </div>

    {{-- ------Tracking------ --}}
    <div class="shadow mb-5 bg-#fff rounded mt-3">
        @if($form -> currApprover === 'adviser')
        <section>
            <ul class="step-form-list">
                <li class="step-form-item current-item">
                    <span class="progress-count">1</span>
                    <span class="progress-label">Adviser</span>
                    <span class="progress-label"></span>
                </li>
                <li class="step-form-item ">
                    <span class="progress-count">2</span>
                    <span class="progress-label">SAO Head</span>
                    <span class="progress-label"></span>
                </li>
                <li class="step-form-item">
                    <span class="progress-count">3</span>
                    <span class="progress-label">Academic Services</span>
                </li>
                <li class="step-form-item ">
                    <span class="progress-count">4</span>
                    <span class="progress-label">Finance</span>
                </li>
            </ul>
        </section>
        @elseif($form -> currApprover === 'saoHead')
        <section>
            <ul class="step-form-list">
                <li class="step-form-item">
                    <span class="progress-count">1</span>
                    <span class="progress-label">Adviser</span>
                    <span class="progress-label">{{\Carbon\Carbon::parse($form -> adviserDateApproved)->format('F d, Y - h:i A')}}</span>
                </li>
                <li class="step-form-item current-item">
                    <span class="progress-count">2</span>
                    <span class="progress-label">SAO Head</span>
                    <span class="progress-label"></span>
                </li>
                <li class="step-form-item">
                    <span class="progress-count">3</span>
                    <span class="progress-label">Academic Services</span>
                </li>
                <li class="step-form-item ">
                    <span class="progress-count">4</span>
                    <span class="progress-label">Finance</span>
                </li>
            </ul>
        </section>
        @elseif($form -> currApprover === 'acadServ')
        <section>
            <ul class="step-form-list">
                <li class="step-form-item">
                    <span class="progress-count">1</span>
                    <span class="progress-label">Adviser</span>
                    <span class="progress-label">{{\Carbon\Carbon::parse($form -> adviserDateApproved)->format('F d, Y - h:i A')}}</span>
                </li>
                <li class="step-form-item">
                    <span class="progress-count">2</span>
                    <span class="progress-label">SAO Head</span>
                    <span class="progress-label">{{\Carbon\Carbon::parse($form -> saoDateApproved)->format('F d, Y - h:i A')}}</span>
                </li>
                <li class="step-form-item current-item">
                    <span class="progress-count">3</span>
                    <span class="progress-label">Academic Services</span>
                </li>
                <li class="step-form-item ">
                    <span class="progress-count">4</span>
                    <span class="progress-label">Finance</span>
                </li>
            </ul>
        </section>
        @elseif($form -> currApprover === 'finance')
        <section>
            <ul class="step-form-list">
                <li class="step-form-item">
                    <span class="progress-count">1</span>
                    <span class="progress-label">Adviser</span>
                    <span class="progress-label">{{\Carbon\Carbon::parse($form -> adviserDateApproved)->format('F d, Y - h:i A')}}</span>
                </li>
                <li class="step-form-item">
                    <span class="progress-count">2</span>
                    <span class="progress-label">SAO Head</span>
                    <span class="progress-label">{{\Carbon\Carbon::parse($form -> saoDateApproved)->format('F d, Y - h:i A')}}</span>
                </li>
                <li class="step-form-item">
                    <span class="progress-count">3</span>
                    <span class="progress-label">Academic Services</span>
                    <span class="progress-label">{{\Carbon\Carbon::parse($form -> acadServDateApproved)->format('F d, Y - h:i A')}}</span>
                </li>
                <li class="step-form-item current-item">
                    <span class="progress-count">4</span>
                    <span class="progress-label">Finance</span>
                </li>
            </ul>
        </section>
        @endif
    </div>
</div>


{{-- ------Deny------ --}}
<div class="modal fade" id="modalDeny" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            {{-- ------Header------ --}}
            <div class="modal-header" style="background: #e7ae41">
                <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">You're about to Deny the Form</i></h4>
                <button type="button" id="closeModalDeny" class="close mx-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span>x</button>
            </div>           
            {{-- ------Body------ --}}
            <div class="modal-body">
                <form action="/submittedForms/details/{{$form->id}}/deny" id="passConfirmation" method="GET">
                    <div class="header-btn">
                        <div id="div-physical">
                            <label for="feedback">Please give feedback:</label>
                            <textarea class="form-control col-md-12" id="feedback" name="feedback"></textarea>
                            @if(session()->has('errorInDeny'))
                                <div class="alert alert-danger mt-2">
                                    {{ session()->get('errorInDeny') }}
                                </div>
                            @endif
                        </div>      
                    </div>
                    <button type="submit" class="btn btn-success col-md-3 mt-md-3 float-right">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection