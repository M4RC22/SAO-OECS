@extends('layouts.app')

@section('content')

@if($user->userType === "Student")
<div class="container">
    <div id="table-wrapper" class="pre-scrollable mt-3">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Event Title</th>
                <th scope="col">Form Type</th>
                <th scope="col">Date Submitted</th>
                <th scope="col">Submitted By:</th>
                <th scope="col">Status</th>
                <th scope="col">Current Approver</th>
                <th scope="col">Action</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($dispForm as $item)
                <tr>
                    <td>{{$item -> eventTitle}}</th>
                    <td>{{$item -> formType}}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y  - h:i A') }}</td>
                    <td>Sample President</td>
                    <td>{{$item -> status}}</td>
                    <td>{{$item -> currApprover}}</td>
                    @if($item -> status === 'Pending')
                    <td><a href=" ">Track<a></td>
                    @else
                    <td><a href="/{{$item -> formType}}/{{$item -> id}}/edit">Edit<a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>   
        </table>
    </div>
</div>
@else
<div class="wrapper">
    <div class="row d-flex- justify-content-lg-around">
        <div class="col-lg-7 shadow mb-5 bg-#fff rounded mt-3" style="border-bottom: 5px solid #e7ae41;">
            <div class="response"></div>
            <div id='calendar'></div>  
        </div>

        @if($user->userType === "NTP")
        
        <div class="col-lg-4 shadow p-3 mb-5 bg-#fff rounded mt-3" style="border-bottom: 5px solid  #e7ae41;">
            <h1 class="mt-3">Events <span style="color:#6C757D; font-size:18px;">Student Organizations</span></h1>

            {{-- R1 --}}
            <div class="row mt-3">
                <div class="col-sm-3 d-flex py-2 px-1 align-items-center flex-column" style="background-color:#e7ae41; border-radius:5px;">
                    <h5 class="m-0 d-flex justify-content-center" style="font-weight: bold; color:white;">15</h5>
                    <p class="m-0 d-flex justify-content-center" style="color:#6C757D;">Nov</p>
                </div>

                <div class="col-sm-9 py-2 px-3">
                    <p class="m-0" style="font-weight: bold;">High Street Dance Competition 2021</p>
                    <p class="m-0" style="color:#6C757D;">APC Dance Conpany</p>
                </div>
            </div>

            {{-- R2 --}}
            <div class="row mt-3">
                <div class="col-sm-3 d-flex py-2 px-1 align-items-center flex-column" style="background-color:#e7ae41; border-radius:5px;">
                    <h5 class="m-0 d-flex justify-content-center" style="font-weight: bold; color:white;">15</h5>
                    <p class="m-0 d-flex justify-content-center" style="color:#6C757D;">Nov</p>
                </div>

                <div class="col-sm-9 py-2 px-3">
                    <p class="m-0" style="font-weight: bold;">High Street Dance Competition 2021</p>
                    <p class="m-0" style="color:#6C757D;">APC Dance Conpany</p>
                </div>
            </div>

            {{-- R3 --}}
            <div class="row mt-3">
                <div class="col-sm-3 d-flex py-2 px-1 align-items-center flex-column" style="background-color:#e7ae41; border-radius:5px;">
                    <h5 class="m-0 d-flex justify-content-center" style="font-weight: bold; color:white;">15</h5>
                    <p class="m-0 d-flex justify-content-center" style="color:#6C757D;">Nov</p>
                </div>

                <div class="col-sm-9 py-2 px-3">
                    <p class="m-0" style="font-weight: bold;">High Street Dance Competition 2021</p>
                    <p class="m-0" style="color:#6C757D;">APC Dance Conpany</p>
                </div>
            </div>
        </div>
        @endif
    </div>

</div>

@endif

@endsection 
