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
                    <li class="breadcrumb-item active"><a href="{{ route('master-data.departements.index') }}">{{ ($breadcrumb ?? '') }}</a></li>
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
                        <div class="col-lg-6 col-md-6 col-sm-6 mt-1 text-white" style="font-size:1.2rem;">
                            <span class="tx-bold tx-dark text-white text-lg">
                                <i class="far fa-building text-lg"></i>
                                Departements List
                            </span>
                        </div>

                        @can('departement-create')
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end">
                            <a href="{{ route('master-data.departements.create') }}" class="btn btn-sm btn-primary">
                                Add New
                            </a>
                        </div>
                        @endcan
                    </div>

                    <div class="row">
                        <div class="col-6">
                            @include('components.flash-message')
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover d-none" id="departementTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th width='40%'>Name</th>
                                    <th width='40%'>Permission</th>
                                    @if(auth()->user()->can('departement-delete') || auth()->user()->can('departement-edit'))
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($departements as $departement)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $departement->name }}</td>
                                    <td>
                                        <button onclick="detailModal('Permission User', 'departements/' + {{ $departement->id }}, 'small')" class="btn btn-sm btn-primary">
                                            <i data-feather="alert-circle"></i> Show Permissions
                                        </button>
                                    </td>
                                    @if(auth()->user()->can('departement-delete') || auth()->user()->can('departement-edit'))
                                    <td>
                                        <div class="btn-group-sm">
                                            @can('departement-edit')
                                            <a href="{{ route('master-data.departements.edit', $departement->id) }}" class="btn btn-warning text-white">
                                                <i class="feather-20" data-feather="edit"></i>
                                            </a>
                                            @endcan

                                            @can('departement-delete')
                                            <a href="#" class="btn btn-danger f-12" onclick="modalDelete('Departement', '{{ $departement->name }}', '/master-data/departements/' + {{ $departement->id }}, '/master-data/departements/')">
                                                <i class="feather-20" data-feather="trash-2"></i>
                                            </a>
                                            @endcan
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
    </div>

    {{-- Modal --}}
    @foreach ($departements as $departement)
    <div class="modal fade w-500" id="showModal{{ $departement->id }}" tabindex="-1" role="dialog"
        aria-labelledby="ShowPermission" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Permission {{ $departement->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <ul>
                        @foreach ($departement->permissions as $permission)
                        <li>{{ $loop->iteration . '. ' . $permission->name }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- End Modal --}}

@endsection

@section('script')

@endsection
