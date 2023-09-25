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
                    <li class="breadcrumb-item active"><a href="{{ route('master-data.departements.index') }}">Departements</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row mt-4">
    <div class="col-lg-6 col-xl-6 col-sm-12">
        <div class="card card-primary style--radius15">
            <div class="card-header text-center style--head--card1">
                <h5 class="card-title text-white">Add Departement</h5>
            </div>
            <form method="POST" action="{{ route('master-data.departements.store') }}" novalidate>
                @csrf
                <div class="card-body">

                    @include('components.form-message')

                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="name" required value="{{ old('name') }}">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Permissions</label> <br>
                        <small>Select All</small>
                        <input type="checkbox" id="checkbox">

                        <div class="select2-purple">
                            <select class="select2" name="permissions[]" id="e1" data-placeholder="Select The Permissions" multiple data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach ($permissions as $permission)
                                    <option value="{{$permission->id}}"
                                        @foreach (old('permissions') ?? [] as $id)
                                            @if ($id == $permission->id)
                                                {{ ' selected' }}
                                            @endif
                                        @endforeach>
                                        {{$permission->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @error('permissions')
                            <span class="text-danger text-sm">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer style--foot--card1">
                    <button type="submit" class="btn btn-success btn-footer">Add</button>
                    <a href="{{ route('master-data.departements.index') }}" class="btn btn-danger btn-footer">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
