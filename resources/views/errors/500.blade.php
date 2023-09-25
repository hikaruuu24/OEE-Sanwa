@extends('layouts.app')



@section('content')
<!-- start page title -->
<div class="row">
    {{-- List Macine --}}
    <div class="col-lg-12">
        <div class="error-404 d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="card py-5">
                    <div class="row g-0">
                        <div class="col-xl-5">
                            <div class="card-body p-4">
                                <h1 class="display-1"><span class="text-dark">5</span><span
                                        class="text-dark">0</span><span class="text-dark">0</span></h1>
                                <h2 class="font-weight-bold display-4">Sorry, unexpected error</h2>
                                {{-- <p>Looks like you are lost!
                                    <br>May be you are not connected to the internet!</p> --}}
                                <div class="mt-5"> <a href="{{route('dashboard.index')}}"
                                        class="btn btn-lg btn-primary px-md-5 radius-30">Go Home</a>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <img src="{{asset('telkom/assets/images/error/505-error.png')}}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>

    </div>

</div>
<!-- end page title -->
@endsection
