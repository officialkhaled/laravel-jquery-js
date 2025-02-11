@extends('skeleton.layout')
@section('styles')

@endsection

@section('content')
    <div class="mt-4">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead class="table-info">
                    <tr>
                        <th width="5%" class="text-center">SL</th>
                        <th width="25%">NAME</th>
                        <th width="35%">EMAIL</th>
                        <th width="30%" class="text-center">AVATAR</th>
                        <th width="5%" class="text-center">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th class="text-center" style="vertical-align: middle;">{{ $loop->iteration }}</th>
                            <td style="vertical-align: middle;">{{ $user->name }}</td>
                            <td style="vertical-align: middle;">{{ $user->email }}</td>
                            <td class="text-center">
                                <img src="{{ '/storage' . asset($user->avatar) }}" alt="Image" class="object-fit-cover border rounded" width="70px">
                            </td>
                            <td style="vertical-align: middle;">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-success waves-effect bg-gradient"
                                       data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <i class="fa-solid fa-edit opacity-75"></i>
                                    </a>
                                    <form action="{{ route('user.delete', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-danger waves-effect bg-gradient" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <i class="fa-solid fa-trash opacity-75"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
