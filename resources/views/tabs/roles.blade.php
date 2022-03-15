@extends('layouts.app')

@section('content')


<div class="container ">
    <h3>Roles</h3>

    <hr style="height:3px;">

    @if(session()->has('errorUserAlreadyExist'))
    <script>
        $(window).ready(() => {
            $('#errorUserAlreadyExist').modal('show');
            $("#error1").on('click', function(){
                $("#errorUserAlreadyExist").modal('hide');
            });
        });
    </script>
    @elseif(session()->has('errorRoleTaken'))
    <script>
        $(window).ready(() => {
            $('#errorRoleTaken').modal('show');
            $("#error2").on('click', function(){
                $("#errorRoleTaken").modal('hide');
            });
        });
    </script>
    @elseif(session()->has('errorUserNotExist'))
    <script>
        $(window).ready(() => {
            $('#errorUserNotExist').modal('show');
            $("#error3").on('click', function(){
                $("#errorUserNotExist").modal('hide');
            });
        });
    </script>
     @elseif(session()->has('errorRemoveUser'))
    <script>
        $(window).ready(() => {
            $('#errorRemoveUser').modal('show');
            $("#error4").on('click', function(){
                $("#errorRemoveUser").modal('hide');
            });
        });
    </script>
    @endif

    @if($userPos === "President" or $userPos === "Adviser")
        <form action="/assignPosition" id="reqForms" method="POST">
                {{ csrf_field() }}
        <div class="main-section border border-1 bg-white shadow-sm p-3 mb-5 rounded rounded-3 mt-3">
            <div class="row d-flex justify-content-center align-items-center pb-2">
                <div class="col-sm-4 mt-2">
                    <label for="emailadd" class="form-label">Email address</label>
                    <input type="email" class="form-control opacity-75 shadow-sm bg-body rounded" id="email" name="email" value="{{ old('email') }}" placeholder="Use APC email">
                </div>
                <div class="col-sm-4 mt-2">
                    <label for="roles" class="form-label">Position</label>
                    <select class="form-control  @error('position') is-invalid @enderror w-100 h-50 opacity-75 shadow-sm bg-body rounded" id="role" name="position">
                        <option selected disabled>Choose Role</option>
                        <option value="President">President</option>
                        <option value="Vice-President">Vice-President</option>
                        <option value="Treasurer">Treasurer</option>
                        <option value="Auditor">Auditor</option>
                        <option value="Member">Member</option>
                    </select>
                    @error('position')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-sm-1 mt-4 pt-3">
                    <button class="btn btn-success" id="addBtn">Assign</button>
                </div>
            </div>
        </div>
    </form>
    @endif
</div>


<div class="container">

        <div class="table-responsive-sm shadow mb-5 rounded-0 mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th class="d-none d-sm-table-cell p-4 fs-5">Name</th>
                    <th class="d-none d-sm-table-cell p-4 fs-5">Position</th>
                    @if($userPos === "President" or $userPos === "Adviser")
                    <th class="d-none d-sm-table-cell p-4 fs-5">Action</th>
                    @endif
                    
                    </tr>
                </thead>
                <tbody>
                @foreach($orgMembers as $key=>$member)
                    <tr>
                    <td class="p-4 d-block d-sm-table-cell">{{$member[0]-> firstName}} {{$member[0]->lastName}}</th>
                    <td class="p-4 d-block d-sm-table-cell">{{$member[1]}}</td>
                    @if($userPos === "President" or $userPos === "Adviser")
                    <td class="p-4 d-block d-sm-table-cell"><a href="/removeMember/{{$member[0]->id}}" class="text-decoration-none">Remove</a></td>
                    @endif
                    </tr>
                @endforeach
                </tbody>   
            </table>
        </div>
</div>

{{-- ------errorUserAlreadyExist------ --}}
<div class="modal fade" id="errorUserAlreadyExist" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            {{-- ------Header------ --}}
            <div class="modal-header" style="background: #e7ae41">
                <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">Oooops! Error Occured.</i></h4>
            </div>           
            {{-- ------Body------ --}}
            <div class="modal-body">
                <div class="header-btn">
                    <div id="div-physical">
                        @if(session()->has('errorUserAlreadyExist'))
                            <div class="alert alert-danger mt-2">
                                {{ session()->get('errorUserAlreadyExist') }}
                            </div>
                        @endif
                    </div>      
                </div>
                <button type="button" class="btn btn-success col-md-3 mt-md-3 float-right" data-dismiss="modal"  id="error1" aria-label="Close">Okay</button>
            </div>
        </div>
    </div>
</div>


{{-- ------errorRoleTaken------ --}}
<div class="modal fade" id="errorRoleTaken" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            {{-- ------Header------ --}}
            <div class="modal-header" style="background: #e7ae41">
                <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">Oooops! Error Occured.</i></h4>
            </div>           
            {{-- ------Body------ --}}
            <div class="modal-body">
                <div class="header-btn">
                    <div id="div-physical">
                        @if(session()->has('errorRoleTaken'))
                            <div class="alert alert-danger mt-2">
                                {{ session()->get('errorRoleTaken') }}
                            </div>
                        @endif
                    </div>      
                </div>
                <button type="button" class="btn btn-success col-md-3 mt-md-3 float-right" data-dismiss="modal"  id="error2" aria-label="Close">Okay</button>
            </div>
        </div>
    </div>
</div>

{{-- ------errorUserNotExist------ --}}
<div class="modal fade" id="errorUserNotExist" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            {{-- ------Header------ --}}
            <div class="modal-header" style="background: #e7ae41">
                <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">Oooops! Error Occured.</i></h4>
            </div>           
            {{-- ------Body------ --}}
            <div class="modal-body">
                <div class="header-btn">
                    <div id="div-physical">
                        @if(session()->has('errorUserNotExist'))
                            <div class="alert alert-danger mt-2">
                                {{ session()->get('errorUserNotExist') }}
                            </div>
                        @endif
                    </div>      
                </div>
                <button type="button" class="btn btn-success col-md-3 mt-md-3 float-right" data-dismiss="modal"  id="error3" aria-label="Close">Okay</button>
            </div>
        </div>
    </div>
</div>

{{-- ------errorRemoveUser------ --}}
<div class="modal fade" id="errorRemoveUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            {{-- ------Header------ --}}
            <div class="modal-header" style="background: #e7ae41">
                <h4 class="modal-title" id="myModalLabel" style="color: whitesmoke;">Oooops! Error Occured.</i></h4>
            </div>           
            {{-- ------Body------ --}}
            <div class="modal-body">
                <div class="header-btn">
                    <div id="div-physical">
                        @if(session()->has('errorRemoveUser'))
                            <div class="alert alert-danger mt-2">
                                {{ session()->get('errorRemoveUser') }}
                            </div>
                        @endif
                    </div>      
                </div>
                <button type="button" class="btn btn-success col-md-3 mt-md-3 float-right" data-dismiss="modal"  id="error4" aria-label="Close">Okay</button>
            </div>
        </div>
    </div>
</div>

@endsection
        