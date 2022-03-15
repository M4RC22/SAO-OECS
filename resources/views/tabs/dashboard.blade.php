@extends('layouts.app')

@section('content')

@if($user->userType === "Student")

<div class="container">
    <div id="table-wrapper" class="shadow mb-5 rounded-0 mt-3">
        <table class="table table-striped">
            <thead >
                <tr>
                <th scope="col" class="d-none d-sm-table-cell py-4 fs-5">Event Title</th>
                <th scope="col" class="d-none d-sm-table-cell py-4 fs-5">Form Type</th>
                <th scope="col" class="d-none d-sm-table-cell py-4 fs-5">Date Submitted</th>
                <th scope="col" class="d-none d-sm-table-cell py-4 fs-5">Submitted By</th>
                <th scope="col" class="d-none d-sm-table-cell py-4 fs-5">Status</th>
                <th scope="col" class="d-none d-sm-table-cell py-4 fs-5">Current Approver</th>
                <th scope="col" class="d-none d-sm-table-cell py-4 fs-5">Action</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($dispForm as $key => $item)
                <tr>
                    <td>{{$item -> eventTitle}}</th>
                    <td>{{$item -> formType}}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y  - h:i A') }}</td>
                    <td>{{$creators[$key][0] -> firstName}} {{$creators[$key][0] -> lastName}}</td>
                    <td>{{$item -> status}}</td>
                    @if($item -> currApprover === 'adviser')
                        <td>Adviser</td>
                    @elseif($item -> currApprover === 'saoHead')
                        <td>SAO Head</td>
                    @elseif($item -> currApprover === 'acadServ')
                        <td>Academic Services</td>
                    @elseif($item -> currApprover === 'finance')
                        <td>Finance</td>
                    @endif
                    @if($item -> status === 'Pending')
                    <td><a href="/trackForm/{{$item -> id}}" class="btn btn-info" >Track</a></td>
                    @else
                    <td><a href="/{{$item -> formType}}/{{$item -> id}}/edit" class="btn btn-warning">Edit<a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>   
        </table>    
    </div>
</div>
@else
{{-- Calendar --}}
<div class="wrapper">
    <div class="row d-flex- justify-content-lg-around">
        <div class="col-lg-7 shadow bg-#fff rounded mt-3" style="border-bottom: 5px solid #e7ae41;">
            <div class="response"></div>
            <div id='calendar'></div>  
        </div>
        {{-- 
            
            Adviser

            --}}

        @if($user->userType === "Professor")
        {{-- ------Events------ --}}
            <div class="col-lg-4 shadow p-3  bg-#fff rounded mx-1 mt-3" style="border-bottom: 5px solid  #e7ae41;">
                <h1 class="mt-3">Events <span style="color:#6C757D; font-size:18px;">Student Organizations</span></h1>
                @foreach($proposals as $key => $proposal)
                <div class="row mt-3">
                    <div class="col-sm-3 d-flex py-2 px-1 align-items-center flex-column" style="background-color:#e7ae41; border-radius:5px;">
                        <h5 class="m-0 d-flex justify-content-center" style="font-weight: bold; color:white;"> {{\Carbon\Carbon::parse($proposal[0] -> targetDate)->format('d')}}</h5>
                        <p class="m-0 d-flex justify-content-center" style="color:#6C757D;">{{\Carbon\Carbon::parse($proposal[0] -> targetDate)->format('M')}}</p>
                    </div>

                    <div class="col-sm-9 py-2 px-3">
                        <p class="m-0" style="font-weight: bold;">{{$events[$key][0] -> eventTitle}}</p>
                        <p class="m-0" style="color:#6C757D;">{{$events[$key][0] -> orgName}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{-- ------Summary------ --}}
        <div class="row px-4">
            <div class="container col-md-12 shadow p-4 bg-#fff rounded mt-5" style="border-bottom: 5px solid  #e7ae41;">
                {{-- ------Row1------ --}}

                <h4 class="mb-5">Summary of Form Approved</h4>
                
                <div class="row d-flex justify-content-between">
                    <div class="col-md-2 text-center">
                        <p><b>Activity Proposal Form</b></p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p><b>Requisition Form</b></p>
                    </div> 
                    <div class="col-md-2 text-center">
                        <p><b>Narrative Form</b> </p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p><b>Liquidation Form</b> </p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p><b>Total Approved Forms</b></p>
                    </div>    
                </div>  
                <div class="row d-flex justify-content-between">
                    <div class="col-md-2 text-center">
                        <p>{{$adviserAPF}}</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p>{{$adviserRF}}</p>
                    </div> 
                    <div class="col-md-2 text-center">
                        <p>{{$adviserNR}}</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p>{{$adviserLF}}</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p>{{$adviserTotal}}</p>
                    </div> 
                </div>  
            </div>
        </div>
        {{-- 
            
            SAO Head

            --}}
        @elseif($user->userType === "NTP")
            @if($userDept[0]->name === 'Academic Services' and $userPos === 'SAO Head')

            {{-- ------Events------ --}}
            <div class="col-lg-4 shadow p-3  bg-#fff rounded mx-1 mt-3" style="border-bottom: 5px solid  #e7ae41;">
                <h1 class="mt-3">Events <span style="color:#6C757D; font-size:18px;">Student Organizations</span></h1>
                @foreach($proposals as $key => $proposal)
                <div class="row mt-3">
                    <div class="col-sm-3 d-flex py-2 px-1 align-items-center flex-column" style="background-color:#e7ae41; border-radius:5px;">
                        <h5 class="m-0 d-flex justify-content-center" style="font-weight: bold; color:white;"> {{\Carbon\Carbon::parse($proposal[0] -> targetDate)->format('d')}}</h5>
                        <p class="m-0 d-flex justify-content-center" style="color:#6C757D;">{{\Carbon\Carbon::parse($proposal[0] -> targetDate)->format('M')}}</p>
                    </div>

                    <div class="col-sm-9 py-2 px-3">
                        <p class="m-0" style="font-weight: bold;">{{$events[$key][0] -> eventTitle}}</p>
                        <p class="m-0" style="color:#6C757D;">{{$events[$key][0] -> orgName}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{-- ------Summary------ --}}
        <div class="row px-4">
            <div class="container col-md-12 shadow p-4 bg-#fff rounded mt-5" style="border-bottom: 5px solid  #e7ae41;">
                {{-- ------Row1------ --}}

                <h4 class="mb-5">Summary of Form Submission</h4>
                
                <div class="row d-flex justify-content-between">
                    <div class="col-md-2">
                        <p><b>Organization Name</b></p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p><b>Pending</b></p>
                    </div> 
                    <div class="col-md-2 text-center">
                        <p><b>Narrative</b></p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p><b>Liquidation</b> </p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p><b>Total Submitted Forms</b></p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p><b>Total Approved Forms</b></p>
                    </div>    
                </div>  
                
                @foreach($organizations as $key=> $organization)
                <div class="row d-flex justify-content-between">
                    <div class="col-md-2">
                        <p>{{$organization -> orgName}}</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p>{{$pending[$key]}}</p>
                    </div> 
                    <div class="col-md-2 text-center">
                        <p>{{$orgNarrativeApproved[$key]}} out of {{$orgNarrativePending[$key]}}</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p>{{$orgLiquidationApproved[$key]}} out of {{$orgLiquidationPending[$key]}}</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p>{{$totalSubmittedForms[$key]}}</p>
                    </div> 
                    <div class="col-md-2 text-center">
                        <p style="color:#e7ae41;">{{$totalApprovedForms[$key]}}</p>
                    </div> 
                </div>  
                @endforeach
            </div>
        </div>
        {{-- ------Charts------ --}}
        <div class="row">
            <div class="container col-md-5 shadow p-4 mb-5 bg-#fff rounded mt-5" style="border-bottom: 5px solid  #e7ae41;">
                <h4>Narrative Reports</h4>
                <div class="col" id="narrativeChartContainer">
                    <!-- Narrative -->
                </div>
                <p><b>Pending:</b> {{$narrativePending}}</p>
                <p><b>Approved:</b> {{$liquidationApproved}}</p>
            </div>
            <div class="container col-md-6 shadow p-4 mb-5 bg-#fff rounded mt-5" style="border-bottom: 5px solid  #e7ae41;">
                <h4>Liquidation Reports</h4>
                <div class="col" id="liquidationChartContainer">
                    <!-- Liquidation -->
                </div>
                <p><b>Pending:</b> {{$liquidationPending}}</p>
                <p><b>Approved:</b> {{$liquidationApproved}}</p>
            </div>
        </div>
        {{-- 
            
            Academi Services Head

            --}}
        @elseif($userDept[0]->name=== 'Academic Services' and $userPos === 'Head')
         {{-- ------Events------ --}}
            <div class="col-lg-4 shadow p-3  bg-#fff rounded mx-1 mt-3" style="border-bottom: 5px solid  #e7ae41;">
                <h1 class="mt-3">Events <span style="color:#6C757D; font-size:18px;">Student Organizations</span></h1>
                @foreach($proposals as $key => $proposal)
                <div class="row mt-3">
                    <div class="col-sm-3 d-flex py-2 px-1 align-items-center flex-column" style="background-color:#e7ae41; border-radius:5px;">
                        <h5 class="m-0 d-flex justify-content-center" style="font-weight: bold; color:white;"> {{\Carbon\Carbon::parse($proposal[0] -> targetDate)->format('d')}}</h5>
                        <p class="m-0 d-flex justify-content-center" style="color:#6C757D;">{{\Carbon\Carbon::parse($proposal[0] -> targetDate)->format('M')}}</p>
                    </div>

                    <div class="col-sm-9 py-2 px-3">
                        <p class="m-0" style="font-weight: bold;">{{$events[$key][0] -> eventTitle}}</p>
                        <p class="m-0" style="color:#6C757D;">{{$events[$key][0] -> orgName}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{-- ------Summary------ --}}
        <div class="row px-4">
            <div class="container col-md-12 shadow p-4 bg-#fff rounded mt-5" style="border-bottom: 5px solid  #e7ae41;">
                {{-- ------Row1------ --}}

                <h4 class="mb-5">Summary of Form Approved</h4>
                
                <div class="row d-flex justify-content-between">
                    <div class="col-md-2 text-center">
                        <p><b>Activity Proposal Form</b></p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p><b>Requisition Form</b></p>
                    </div> 
                    <div class="col-md-2 text-center">
                        <p><b>Liquidation Form</b> </p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p><b>Total Approved Forms</b></p>
                    </div>    
                </div>  
                <div class="row d-flex justify-content-between">
                    <div class="col-md-2 text-center">
                        <p>{{$acadServAPF}}</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p>{{$acadServRF}}</p>
                    </div> 
                    <div class="col-md-2 text-center">
                        <p>{{$acadServLF}}</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p>{{$acadServTotal}}</p>
                    </div> 
                </div>  
            </div>
        </div>
        {{-- 
            
            Finance Head

            --}}
        @elseif($userDept[0]->name === 'Finance')
        {{-- ------Events------ --}}
        <div class="col-lg-4 shadow p-3  bg-#fff rounded mx-1 mt-3" style="border-bottom: 5px solid  #e7ae41;">
                <h1 class="mt-3">Events <span style="color:#6C757D; font-size:18px;">Student Organizations</span></h1>
                @foreach($proposals as $key => $proposal)
                <div class="row mt-3">
                    <div class="col-sm-3 d-flex py-2 px-1 align-items-center flex-column" style="background-color:#e7ae41; border-radius:5px;">
                        <h5 class="m-0 d-flex justify-content-center" style="font-weight: bold; color:white;"> {{\Carbon\Carbon::parse($proposal[0] -> targetDate)->format('d')}}</h5>
                        <p class="m-0 d-flex justify-content-center" style="color:#6C757D;">{{\Carbon\Carbon::parse($proposal[0] -> targetDate)->format('M')}}</p>
                    </div>

                    <div class="col-sm-9 py-2 px-3">
                        <p class="m-0" style="font-weight: bold;">{{$events[$key][0] -> eventTitle}}</p>
                        <p class="m-0" style="color:#6C757D;">{{$events[$key][0] -> orgName}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{-- ------Summary------ --}}
        <div class="row px-4">
            <div class="container col-md-12 shadow p-4 bg-#fff rounded mt-5" style="border-bottom: 5px solid  #e7ae41;">
                {{-- ------Row1------ --}}

                <h4 class="mb-5">Summary of Form Approved</h4>
                
                <div class="row d-flex justify-content-between">
                    <div class="col-md-2 text-center">
                        <p><b>Activity Proposal Form</b></p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p><b>Requisition Form</b></p>
                    </div> 
                    <div class="col-md-2 text-center">
                        <p><b>Liquidation Form</b> </p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p><b>Total Approved Forms</b></p>
                    </div>    
                </div>  
                <div class="row d-flex justify-content-between">
                    <div class="col-md-2 text-center">
                        <p>{{$financeAPF}}</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p>{{$financeRF}}</p>
                    </div> 
                    <div class="col-md-2 text-center">
                        <p>{{$financeLF}}</p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p>{{$financeTotal}}</p>
                    </div> 
                </div>  
            </div>
        </div>
        @endif
     @endif
</div>

<script>
    $(document).ready(function() {
    
        var data = @json($data);
  
        $('#calendar').fullCalendar({
            height: 550 ,
            contentHeight:"auto",
            themeSystem: 'bootstrap',
            initialView: 'dayGridWeek',
            events: data,
            displayEventTime: false,
            eventColor: '#e7ae41',
            header: {
                left:   'title',
                center: 'hello world',
                right:  'today, prev,next myCustomButton'
            },
            eventRender: function(data, element) {
                $(element).tooltip({title: (data.formType === 'APF' ? 'Activity Proposal' : data.formType) + (data.formType === 'Narrative' ? ' Report' : ' Form') + " - "+ data.title});      
                $(element).css('cursor','pointer');       
            },
            eventClick: function(data) {
                window.location = "/submittedForms/details/"+data.id;
            }      
        });
        
    });
</script>
@push('js')
    <script>
        const liquidationChart = new Chartisan({
            el: '#liquidationChartContainer',
            url: "@chart('liquidation_chart')",
            hooks: new ChartisanHooks()
            .datasets('doughnut')
            .pieColors(['#009900', '#e7ae41']),
        })
    </script>

    <script>
        const narrativeChart = new Chartisan({
            el: '#narrativeChartContainer',
            url: "@chart('narrative_chart')",
            hooks: new ChartisanHooks()
            .datasets('doughnut')
            .pieColors(['#009900', '#e7ae41']),
        })
    </script>
@endpush   


@endif
@endsection 
