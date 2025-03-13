@extends('skeleton.layout')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="mt-4">
        <form action="{{ route('user.image-upload.store') }}" method="POST" id="image-upload-form" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input class="form-control" type="text" id="title" name="title" placeholder="Title">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="image_path" class="form-label">Image</label>
                        <input type="file" class="my-pond form-control" name="image_path"/>
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
        $(document).ready(function () {
            $.fn.filepond.registerPlugin(FilePondPluginImagePreview);

            $('.my-pond').filepond({
                allowMultiple: true,
                credits: false,
                labelIdle: 'Drag & Drop your files or <span class="filepond--label-action">Browse</span>',

                server: {
                    process: {
                        url: '/user/image-upload',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        withCredentials: false,
                        onload: (response) => {
                            console.log('File uploaded:', JSON.parse(response));
                        },
                        onerror: (response) => {
                            console.error('Upload failed:', response);
                        }
                    }
                }
            });
        });

    </script>
@endsection
