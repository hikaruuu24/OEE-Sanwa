@extends('layouts.app')

@section('style')
<style>
    .pointer {
        cursor: pointer;
    }
</style>
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
                    <li class="breadcrumb-item active"><a href="{{ route('history-log.index') }}">{{ ($breadcrumb ?? '') }}</a></li>
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
                    <div class="col-6">
                        <span class="tx-bold text-lg text-white" style="font-size:1.2rem;">
                        <i class="mdi mdi-history text-lg"></i>&nbsp;
                        History
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        @include('components.flash-message')
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="HistoryTable" class="table d-none table-hover table-responsive-xl">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Action</th>
                            <th>Departement</th>
                            <th>Datetime</th>
                            @if(auth()->user()->can('history-log-delete'))
                            <th>Delete</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $l)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $l->user->username }}</td>
                            <td>{{ $l->type }}</td>
                            <td>{{ $l->user->getRoleNames()[0] }}</td>
                            <td>{{ $l->datetime }}</td>
                            @if(auth()->user()->can('history-log-delete'))
                            <td>
                                @can('history-log-delete')
                                <a href="#" class="btn btn-danger f-12" onclick="modalDelete('History Log', '{{ $l->user->username }}', 'history-log/' + {{ $l->id }}, '/history-log/')">
                                    <i class="feather-20" data-feather="trash-2"></i>
                                </a>
                                @endcan
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
