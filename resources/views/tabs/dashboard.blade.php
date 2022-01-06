@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if($user->userType === "Student")
                    <div class="card-header">
                        <p>{{ $user->userType }}</p>
                        <p>Organization: {{ $userOrg}}
                    </div>
                @elseif($user->userType === "Professor")
                    <div class="card-header">
                        <p>{{ $user->userType }}</p>
                        <p>Department: {{ $userDept[0]->name }}
                        <p>Organization: {{$userOrg}}</p>
                    </div>
                @else($user->userType === "NTP")
                    <div class="card-header">
                        <p>{{ $user->userType }}</p>
                        <p>Department:{{$userDept[0]-> name}}</p>    
                    </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }} 
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                    <p>Position: {{ $userPos }} </p> 
                </div>
            </div>
        </div>
    </div>

@endsection
