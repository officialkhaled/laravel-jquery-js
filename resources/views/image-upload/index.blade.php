@extends('skeleton.layout')
@section('content')
    <div class="mt-4">
        @if(session('success'))
            <div class="alert alert-success" style="text-align: right;">
                {{ session('success') }}
            </div>
        @endif

        <div class="row" style="height: 100vh;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="fw-bold">Images</span>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th width="8%" class="text-center">SL</th>
                                <th width="25%">TITLE</th>
                                <th width="60%" class="text-center">IMAGE</th>
                                <th width="7%" class="text-center">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($photos as $photo)
                                <tr>
                                    <th class="text-center" style="vertical-align: middle;">{{ $loop->iteration }}</th>
                                    <td style="vertical-align: middle;">{{ $photo->title }}</td>
                                    <td class="text-center">
                                        <img src="{{ $photo->image_path ? ('/storage' . asset($photo->image_path)) : asset('no_image.jpg') }}" alt="Image"
                                             class="object-fit-cover border rounded" width="60px" height="60px">
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('photo.image-upload.edit', $photo->id) }}" class="btn btn-sm btn-success"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i class="fa-solid fa-edit opacity-75"></i>
                                            </a>
                                            <form action="{{ route('photo.image-upload.delete', $photo->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <i class="fa-solid fa-trash opacity-75"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">
                                        No Data Found!
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
