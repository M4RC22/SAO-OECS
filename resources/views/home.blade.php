@extends('layouts.app')

@section('content')
    <!-- <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> -->
    <div class="container">
    <div class="form-title fw-bold fs-3">
        Narrative Report
    </div>

      <div class="main-section shadow p-3 mb-5 bg-#fff rounded mt-3">
        <div class="mb-3 mt-1 py-1">
            <label for="eventdesc" class="form-label fw-bold">Event Description</label>
            <textarea class="form-control opacity-75 shadow-sm bg-body rounded" id="eventdesc" rows="6"></textarea>
        </div>

        <div class="mb-3 mt-1 py-1">
            <label for="eventprep" class="form-label fw-bold">Event Preparation</label>
            <textarea class="form-control opacity-75 shadow-sm bg-body rounded" id="eventprep" rows="6" ></textarea>
        </div>

        <div class="mb-5 mt-1 py-1">
            <label for="participants" class="form-label fw-bold">Participants</label>
            <textarea class="form-control opacity-75 shadow-sm bg-body rounded" id="participants" rows="6" ></textarea>
        </div>

        <div class="form-title fw-bold fs-4">
            Program
        </div>

        <div class="row mb-3 mt-5 py-1 d-flex justify-content-starts">
            <div class="col-sm-12 col-md-2 pb-3">
                <label for="startdate" class="form-label fw-bold">Start Date</label>
                <input type="date" class="form-control w-100" id="startdate" name="targetdate">
            </div>
            <div class="col-sm-12 col-md-2">
                <label for="enddate" class="form-label fw-bold">End Date</label>
                <input type="date" class="form-control w-100" id="enddate" name="targetdate">
            </div>
        </div>

        <div class="form-title mt-5 fw-bold fs-4">
            Official Poster
        </div>

        <div class="mb-5 mt-2 py-1">
            <label for="officialposter" class="form-label fst-italic fw-lighter opacity-75">Upload a photo. (.jpg .png)</label>
            <input class="form-control form-control-sm w-25" id="officialposter" type="file"/>
        </div>

        <div class="form-title fw-bold fs-4">
            Photos
        </div>

        <div class="mb-5 mt-2 py-1">
            <label for="photos" class="form-label fst-italic fw-lighter opacity-75">Upload a photo. (.jpg .png)</label>
            <input class="form-control form-control-sm w-25" id="photos" type="file"/>
        </div>

        <a href="#" class="btn btn-primary mt-5" type="submit">Submit</a>



      </div>
</div>
@endsection
