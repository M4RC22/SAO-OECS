@extends('layouts.app')

@section('content')


<div class="container ">
    <div class="form-title fw-bold fs-3">
        Roles
    </div>
    @if($userPos === "President" or $userPos === "Adviser")
      <div class="main-section border border-1 bg-white shadow-sm p-3 mb-5 rounded rounded-3 mt-3">
            <div class="row d-flex justify-content-center align-items-center pb-2">
                <div class="col-sm-4 mt-2">
                    <label for="emailadd" class="form-label fw-bold">Email address</label>
                    <input type="email" class="form-control opacity-75 shadow-sm bg-body rounded" id="emailadd required" placeholder="Use APC email">
                </div>
                <div class="col-sm-4 mt-2">
                    <label for="roles" class="form-label fw-bold">Position</label>
                    <select class="form-select w-100 h-50 opacity-75 shadow-sm bg-body rounded" id="roles required">
                        <option selected>Choose Role...</option>
                        <option value="1">President</option>
                        <option value="2">Vice-President</option>
                        <option value="3">Treasurer</option>
                        <option value="4">Auditor</option>
                        <option value="5">Member</option>
                    </select>
                </div>
                <div class="col-sm-1 mt-4 pt-2">
                    <a href="" class="ml-4 btn btn-success">Assign</a>
                </div>

            </div>
      </div>
      @endif
</div>


<div class="container">

        <div class="table-responsive-sm shadow mb-5 rounded-0 mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th class="d-none d-sm-table-cell p-4 fs-5">Name</th>
                    <th class="d-none d-sm-table-cell p-4 fs-5">Position</th>
                    
                    </tr>
                </thead>
                <tbody>
                @foreach($orgMembers as $key=>$member)
                    <tr>
                    <td class="p-4 d-block d-sm-table-cell">{{$member[0]-> firstName}} {{$member[0]->lastName}}</th>
                    <td class="p-4 d-block d-sm-table-cell">{{$member[1]->position}}</td>
                    <td class="p-4 d-block d-sm-table-cell"><a href="" class="text-decoration-none">Remove</a></td>
                    </tr>
                @endforeach
                </tbody>   
            </table>
        </div>
</div>


@endsection