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
            
            </tr>
        </thead>
        <tbody>
            @foreach($forms as $form)
            <tr>
                <td class="p-4 d-block d-sm-table-cell">{{ $form->eventTitle}}</th>
                <td class="p-4 d-block d-sm-table-cell">{{ $form->orgName}}</td>
                <td class="p-4 d-block d-sm-table-cell">{{ $form->formType}}</td>
                <td class="p-4 d-block d-sm-table-cell">{{ \Carbon\Carbon::parse($form->created_at)->format('F d, Y  - h:i A') }}</td>
                <td class="p-4 d-block d-sm-table-cell"><a href="/submittedForms/details/{{$form->id}}/si/Kenneth/Lang/Pogi/Sa/bHuOnG/w0rlD" class="text-decoration-none">View Details</a></td>
            </tr>
            @endforeach
        </tbody>   
    </table>
</div>
</div>
@endsection