@extends('skeleton.layout')

@section('styles')

@endsection

@section('content')
    <div class="mt-4">
        <form action="{{ route('user.store') }}" method="POST" id="user-form" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                        <span class="name-error text-danger"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        <span class="email-error text-danger"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <span class="password-error text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="avatar" class="form-label">Image</label>
                        <input class="form-control" type="file" id="avatar" name="avatar" onchange="previewAvatar(event)">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group d-flex justify-content-center">
                        <label class="form-label">&nbsp;</label>
                        <img src="{{ asset('no_image.jpg') }}" alt="Image" id="avatar_preview"
                             class="card card-body object-fit-cover" width="60%">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12 d-flex justify-content-center gap-1">
                    <button type="submit" class="btn btn-sm btn-success" id="submit-btn">
                        <i class="fa-solid fa-floppy-disk opacity-75"></i>&nbsp;&nbsp;Save
                    </button>
                    <button type="button" class="btn btn-sm btn-warning" onclick="pageRefresh()">
                        <i class="fa-solid fa-arrows-rotate opacity-75"></i>&nbsp;&nbsp;Refresh
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        const name = $('#name');
        const email = $('#email');
        const password = $('#password');
        const avatar = $('#avatar');
        const avatarPreview = $('#avatar_preview');

        $(document).ready(function () {
            $('#user-form').on("submit", function (event) {
                event.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('user.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('.text-danger').html('');
                    },
                    success: function (response) {
                        toastr.success('User Updated Successfully!', 'Success', {timeOut: 2000});
                        setTimeout(function () {
                            window.location.href = "{{ route('user.index') }}";
                        }, 1500);
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            toastr.remove();
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function (key, value) {
                                $('.' + key + '-error').html(`${value[0]}`);
                                toastr.warning(value, 'Error', {timeOut: 2000});
                            });
                        } else {
                            alert("Something went wrong! Please try again.");
                        }
                    }
                });
            });
        });
    </script>
@endsection
