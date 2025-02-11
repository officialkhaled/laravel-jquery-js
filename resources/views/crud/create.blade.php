@extends('skeleton.layout')

@section('styles')

@endsection

@section('content')
    <div class="mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="form-label">Image</label>
                    <input class="form-control" type="file" id="avatar" name="avatar" onchange="previewAvatar(event)">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group d-flex justify-content-center">
                    <label for="exampleFormControlInput1" class="form-label">&nbsp;</label>
                    <img src="{{ asset('no_image.jpg') }}" alt="Image" id="avatar_preview"
                         class="card card-body object-fit-cover" width="60%">
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12 d-flex justify-content-center gap-1">
                <button type="submit" class="btn btn-sm btn-success waves-effect bg-gradient">
                    <i class="fa-solid fa-floppy-disk opacity-75"></i>&nbsp;&nbsp;Save
                </button>
                <button type="button" class="btn btn-sm btn-warning waves-effect bg-gradient">
                    <i class="fa-solid fa-arrows-rotate opacity-75"></i>&nbsp;&nbsp;Refresh
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
