@extends('layouts.app')

@section('style')

@endsection

@section('breadcrumb')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ ($breadcrumb ?? '') }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">home</li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item"><a href="{{ route('master-data.index') }}">Master Data</a></li>
                    <li class="breadcrumb-item">/</li>
                    <li class="breadcrumb-item active"><a href="{{ route('master-data.users.index') }}">{{ ($breadcrumb ?? '') }}</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-12">
        <div class="card style--radius15">
            <div class="card-header style--head--card1">
                <div class="row">
                    <div class="col-6 mt-1">
                        <span class="tx-bold text-lg text-white" style="font-size:1.2rem;">
                            <i class="far fa-user text-lg"></i>
                            Users List
                        </span>
                    </div>

                    @can('user-create')
                    <div class="col-6 d-flex justify-content-end">
                        <a href="{{ route('master-data.users.create') }}" class="btn btn-sm btn-primary">
                            Add New
                        </a>
                    </div>
                    @endcan
                </div>

            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        @include('components.flash-message')
                    </div>
                </div>
                <table id="userTable" class="table d-none table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            @if(auth()->user()->can('user-delete') || auth()->user()->can('user-edit'))
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('img/users/'.($user->avatar ?? 'user.png')) }}" width="40px" class="img-circle">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username.'('. $user->getRoleNames()[0] .')'}}</td>
                            <td>{{ $user->email }}</td>
                            @if(auth()->user()->can('user-delete') || auth()->user()->can('user-edit'))
                            <td>
                                <div class="btn-group-sm">
                                    @can('user-edit')
                                    <a href="{{ route('master-data.users.edit', $user->id) }}" class="btn btn-warning text-white">
                                        <i class="feather-20" data-feather="edit"></i>
                                    </a>
                                    @endcan
                                    @if(auth()->user()->can('user-delete') && Auth::user()->id != $user->id)
                                    <a href="#" class="btn btn-danger f-12" onclick="modalDelete('User', '{{ $user->username }}', '/master-data/users/' + {{ $user->id }}, '/master-data/users/')">
                                        <i class="feather-20" data-feather="trash-2"></i>
                                    </a>
                                    @endif
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
