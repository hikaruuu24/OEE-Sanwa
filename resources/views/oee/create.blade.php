@extends('layouts.app')

@section('style')

@endsection

@section('content')
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card style--radius15">
            <div class="card-header text-center style--head--card1">
                <h5 class="card-title text-white">{{$page_title}}</h5>
            </div>

            <form action="{{ route('oee.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                    <div class="card-body">

                        @include('components.form-message')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}"  placeholder="Enter name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}"  placeholder="Enter date">
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="total">Total Production</label>
                                    <input type="number" class="form-control @error('total') is-invalid @enderror" id="total" name="total" value="{{ old('total') }}"  placeholder="Enter total">
                                    @error('total')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="good">Good Product</label>
                                    <input type="number" class="form-control @error('good') is-invalid @enderror" id="good" name="good" value="{{ old('good') }}"  placeholder="Enter good">
                                    @error('good')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="reject">Reject Product</label>
                                    <input type="number" class="form-control @error('reject') is-invalid @enderror" id="reject" name="reject" value="{{ old('reject') }}"  placeholder="Enter reject">
                                    @error('reject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="downtime">Downtime</label>
                                    <input type="number" class="form-control @error('downtime') is-invalid @enderror" id="downtime" name="downtime" value="{{ old('downtime') }}"  placeholder="Enter downtime">
                                    @error('downtime')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="time_from">Production Time (From)</label>
                                    <input type="time" class="form-control @error('time_from') is-invalid @enderror" id="time_from" name="time_from" value="{{ old('time_from') }}"  placeholder="Enter time_from">
                                    @error('time_from')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="time_to">Production Time (To)</label>
                                    <input type="time" class="form-control @error('time_to') is-invalid @enderror" id="time_to" name="time_to" value="{{ old('time_to') }}"  placeholder="Enter time_to">
                                    @error('time_to')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="production_time">Total Production Time</label>
                                    <input type="number" readonly class="form-control @error('production_time') is-invalid @enderror" id="production_time" name="production_time" value="{{ old('production_time') }}"  placeholder="0">
                                    @error('production_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="production_time">Description <small>(optional)</small></label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                                    @error('production_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer style--foot--card1">
                        <button type="submit" class="btn btn-success btn-footer">Add</button>
                        <a href="{{ route('oee.index') }}" class="btn btn-danger btn-footer">Back</a>
                    </div>
                </form>
            </div>
    </div>
</div>
@endsection

@section('script')

@endsection
