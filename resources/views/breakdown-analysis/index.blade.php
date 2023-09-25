@extends('layouts.app')

@push('style')
<style>
    .dot {
        height: 25px;
        width: 25px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
    }
</style>
@endpush


@section('content')
    <!-- start page title -->
    <div class="row">
        {{-- List Macine --}}
        @include('breakdown-analysis.machine')
    </div>
    <!-- end page title -->
@endsection


