@extends('layouts.app')

@section('content')
<div class="container">

<div class="shadow mb-5 rounded-0 mt-3">
    <table class="table table-striped">
        <thead>
            <tr>
            <th class="d-none d-sm-table-cell p-4 fs-5">Event Title</th>
            <th class="d-none d-sm-table-cell p-4 fs-5">Organization</th>
            <th class="d-none d-sm-table-cell p-4 fs-5">Form Type</th>
            <th class="d-none d-sm-table-cell p-4 fs-5">Date Submitted</th>
            <th class="d-none d-sm-table-cell p-4 fs-5">Date Finished</th>
            
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
            <tr>
                <td class="p-4 d-block d-sm-table-cell">{{$record -> eventTitle}}</th>
                <td class="p-4 d-block d-sm-table-cell">{{$record -> orgName}}</td>
                <td class="p-4 d-block d-sm-table-cell">{{$record -> formType}}</td>
                <td class="p-4 d-block d-sm-table-cell">{{ \Carbon\Carbon::parse($record->created_at)->format('F d, Y  - h:i A') }}</td>
                <td class="p-4 d-block d-sm-table-cell">{{ \Carbon\Carbon::parse($record->updated_at)->format('F d, Y  - h:i A') }}</td>
                <td class="p-4 d-block d-sm-table-cell"><a href="/records/downloadForm/{{$record -> id}}" class="text-decoration-none">Generate</a></td>
            </tr>
            @endforeach
        </tbody>   
    </table>
</div>
</div>
@endsection