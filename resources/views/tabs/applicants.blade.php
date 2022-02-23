@extends('layouts.app')

@section('content')
   
    <div class=" shadow p-3 mb-5 bg-#fff rounded mt-3">
        <table class="table table-striped table hover col-md-12">
            <thead>
                <tr>
                <th scope="col">Submitted By</th>
                <th scope="col">Proposed Organization</th>
                <th scope="col">Date Submitted</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $key => $item)
                <tr>
                    <td>{{$advisers[$key][0] -> firstName}} {{$advisers[$key][0] -> lastName}}</td>
                    <td>{{$item -> proposedOrgName}}</td>
                    <td>{{ \Carbon\Carbon::parse($item -> created_at)->format('F d, Y  - h:i A') }}</td>
                    <td><a href="/application/viewDetails/{{$item -> id}}">View Details</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
    
@endsection