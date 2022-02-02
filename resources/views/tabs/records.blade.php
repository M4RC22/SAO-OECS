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
            <tr>
                <td class="p-4 d-block d-sm-table-cell">High Street Dance Competition 2021</th>
                <td class="p-4 d-block d-sm-table-cell">APC Dance Company</td>
                <td class="p-4 d-block d-sm-table-cell">APF:B</td>
                <td class="p-4 d-block d-sm-table-cell">October 21, 2021</td>
                <td class="p-4 d-block d-sm-table-cell">October 25, 2021</td>
                <td class="p-4 d-block d-sm-table-cell"><a href="" class="text-decoration-none">Generate</a></td>
            </tr>
            <tr>
                <td class="p-4 d-block d-sm-table-cell">Gabi ng Lagim</th>
                <td class="p-4 d-block d-sm-table-cell">Teatre Phileo</td>
                <td class="p-4 d-block d-sm-table-cell">NR</td>
                <td class="p-4 d-block d-sm-table-cell">October 22, 2021</td>
                <td class="p-4 d-block d-sm-table-cell">October 26, 2021</td>
                <td class="p-4 d-block d-sm-table-cell"><a href="" class="text-decoration-none">Generate</a></td>
            </tr>
            <tr>
                <td class="p-4 d-block d-sm-table-cell">Project Moonshot</th>
                <td class="p-4 d-block d-sm-table-cell">JISSA</td>
                <td class="p-4 d-block d-sm-table-cell">APF:B</td>
                <td class="p-4 d-block d-sm-table-cell">October 23, 2021</td>
                <td class="p-4 d-block d-sm-table-cell">October 28, 2021</td>
                <td class="p-4 d-block d-sm-table-cell"><a href="" class="text-decoration-none">Generate</a></td>
            </tr>
            <tr>
                <td class="p-4 d-block d-sm-table-cell">Gabi ng Lagim</th>
                <td class="p-4 d-block d-sm-table-cell">Teatre Phileo</td>
                <td class="p-4 d-block d-sm-table-cell">LF</td>
                <td class="p-4 d-block d-sm-table-cell">October 22, 2021</td>
                <td class="p-4 d-block d-sm-table-cell">October 28, 2021</td>
                <td class="p-4 d-block d-sm-table-cell"><a href="" class="text-decoration-none">Generate</a></td>
            </tr>
            <tr>
                <td class="p-4 d-block d-sm-table-cell">Pista ng Musika</th>
                <td class="p-4 d-block d-sm-table-cell">Chorale</td>
                <td class="p-4 d-block d-sm-table-cell">APF:B</td>
                <td class="p-4 d-block d-sm-table-cell">October 24, 2021</td>
                <td class="p-4 d-block d-sm-table-cell">November 1, 2021</td>
                <td class="p-4 d-block d-sm-table-cell"><a href="" class="text-decoration-none">Generate</a></td>
            </tr>
        
        </tbody>   
    </table>
</div>
</div>
@endsection