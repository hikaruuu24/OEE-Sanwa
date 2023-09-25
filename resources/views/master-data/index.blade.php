@extends('layouts.app')

@push('style')
   <style>
       .master-data {
           cursor: pointer;
       }

       .master-data:hover {
            box-shadow: 0px 0px 33px -14px rgba(0,0,0,0.75);
            -webkit-box-shadow: 0px 0px 33px -14px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 33px -14px rgba(0,0,0,0.75);
            border-left: 4px solid rgb(0, 98, 128);
            transition: 0.1s;
       }
   </style>
@endpush

@section('breadcrumb')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ ($breadcrumb ?? '') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">home</li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item active"><a href="{{ route('master-data.index') }}">{{ ($breadcrumb ?? '') }}</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-12 col-md-6">
        <div class="row">
            @if(auth()->user()->can('departement-list'))
                <div class="col-md-4 col-sm-6 col-12 p-1" onclick="location.href='{{ route('master-data.departements.index') }}';">
                    <div class="card master-data style--radius15">
                        <div class="card-body d-flex justify-content-start align-items-center">
                            <div style="padding-left: 10px;">
                                <img src="{{ asset('img/icon/departement.png') }}" width="60" alt="">
                            </div>
                            <div style="padding-left: 20px;">
                                <h5 class="card-title">Departement</h5>
                                <p class="card-text">Create, read, update, delete departement and privileges.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(auth()->user()->can('user-list'))
                <div class="col-md-4 col-sm-6 col-12 p-1" onclick="location.href='{{ route('master-data.users.index') }}';">
                    <div class="card master-data style--radius15">
                        <div class="card-body d-flex justify-content-start align-items-center">
                            <div style="padding-left: 10px;">
                                <img src="{{ asset('img/icon/user.png') }}" width="60" alt="">
                            </div>
                            <div style="padding-left: 20px;">
                                <h5 class="card-title">User</h5>
                                <p class="card-text">Create, read, update, and delete User.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush
