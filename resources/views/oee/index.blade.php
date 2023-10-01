@extends('layouts.app')

@section('style')

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
                            {{$page_title}}
                        </span>
                    </div>

                    @can('user-create')
                    <div class="col-6 d-flex justify-content-end">
                        <a href="{{ route('oee.create') }}" class="btn btn-sm btn-primary">
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
                            <th>Tanggal</th>
                            <th>Name</th>
                            <th>Total Production</th>
                            <th>Good</th>
                            <th>Reject</th>
                            <th>Production Time</th>
                            <th>Downtime</th>
                            {{-- @if(auth()->user()->can('user-delete') || auth()->user()->can('user-edit')) --}}
                            <th>Action</th>
                            {{-- @endif --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($oee as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->date }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->total }}</td>
                            <td>{{ $data->good }}</td>
                            <td>{{ $data->reject }}</td>
                            <td>{{ $data->production_time }}</td>
                            <td>{{ $data->downtime }}</td>
                            <td>
                                <div class="btn-group-sm">
                                    {{-- @can('user-edit') --}}
                                    <a href="{{ route('oee.edit', $data->id) }}" class="btn btn-warning text-white">
                                        <i class="feather-20" data-feather="edit"></i>
                                    </a>
                                    {{-- @endcan --}}
                                    {{-- @if(auth()->user()->can('user-delete') && Auth::user()->id != $user->id) --}}
                                    <a href="#" class="btn btn-danger f-12" onclick="modalDelete('OEE', '{{ $data->name }}', 'oee/' + {{ $data->id }}, `{{route('oee.index')}}`)">
                                        <i class="feather-20" data-feather="trash-2"></i>
                                    </a>
                                    {{-- @endif --}}
                                </div>
                            </td>
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
