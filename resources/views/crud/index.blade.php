@extends('skeleton.layout')
@section('styles')

@endsection

@section('content')
    <div class="mt-4">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-info waves-effect bg-gradient">
                    <i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add User
                </a>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                    <tr>
                        <th>SL</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>AVATAR</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th width="3%">{{ $loop->iteration }}</th>
                            <td width="27%">{{ $user->name }}</td>
                            <td width="40%">{{ $user->email }}</td>
                            <td width="30%">
                                <img src="{{ asset('$user->avatar') }}" alt="Image" class="object-fit-cover border rounded" width="40px">
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
