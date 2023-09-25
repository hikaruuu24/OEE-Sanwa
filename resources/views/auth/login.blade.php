<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>
    <!-- vendor css -->
    <link href="{{ asset('auth/') }}/lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('auth/') }}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('auth/') }}/css/bracket.css">
    <link rel="stylesheet" href="{{ asset('auth/') }}/css/custom.css">
  
</head>

<body>
    <div class="d-flex align-items-center justify-content-center ht-100v">
        {{-- <img src="{{asset('img/bg-telkom.png')}}" class="pos-absolute a-0 wd-100p ht-100p object-fit-cover" alt=""> --}}
        <div class="overlay-body d-flex align-items-center justify-content-center tx-black">
            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 rounded-30 bg-white shadow-lg">
                <img src="{{asset('img/oee.jpg')}}" width="230" class="img-fluid d-block mx-auto" alt="">
                <div class=" tx-center tx-16 mb-2">
                    <span class="text-secondary d-block" style="font-weight: 600;">Overall Equipment Effectiveness</span>
                    <span class="text-secondary" style="font-weight: 600;">(OEE)</span>
                </div>

                @if(session()->has('validate'))
                <span class="text-danger" role="alert">
                    <strong>{{ session()->get('validate') }}</strong>
                </span>

                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} " name="username" value="{{ old('username') }}" placeholder="Enter your Email / Username" required autofocus>

                        @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                        {{-- <input type="text" class="form-control fc-outline-dark" placeholder="Enter your username"> --}}
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}  " name="password" placeholder="Enter your password">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div><!-- form-group -->

                    <div class="form-group row">
                        <div class="col-md-12  ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>

                </form>
            </div><!-- login-wrapper -->
        </div><!-- overlay-body -->
    </div><!-- d-flex -->
</body>

</html>