@extends('skeleton.layout')

@section('styles')

@endsection

@section('content')
    <div class="mt-4">
        <form action="{{ route('user.image-upload.store') }}" method="POST" id="image-upload-form" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control" type="text" id="title" name="title" placeholder="Title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image_path" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image_path" name="image_path" onchange="previewAvatar(event)">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        <div class="form-group" style="width: 720px;">
                            <img src="{{ asset('no_image.jpg') }}" alt="Image" id="avatar_preview"
                                 class="object-fit-cover" style="width: 720px; border-radius: 8px; border: solid 2px #F2F2F2;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                @include('skeleton.components.btn-group', ['name' => 'Save', 'icon' => 'floppy-disk'])
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
            $('#image-upload-form').on("submit", function (event) {
                event.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('user.image-upload.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('.text-danger').html('');
                    },
                    success: function (response) {
                        toastr.success('Image Uploaded Successfully!', 'Success', {timeOut: 2000});
                        setTimeout(function () {
                            window.location.href = "{{ route('user.image-upload.index') }}";
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
