@extends('layouts.applogin')

@section('title', 'register')

@section('content')

<div class="register-box">
  <div class="card card-outline bg-white ">
    <div class="card-body">
    <div class="w-100">
        <div class="text-center">
          <a href="../public"><img src="https://www.zarla.com/images/zarla-construye-fcil-1x1-2400x2400-20220117-6yc9y3tj8fp769frrfbx.png?crop=1:1,smart&width=250&dpr=2" class="w-50" alt=""></a>
        </div>
      </div>
      <form method="POST" action="{{ route('register') }}">
      @csrf
        <div class="input-group mb-3" style="width:90%; margin:0 auto;border-bottom:2px solid #ff98a2;">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror bg-white border-0" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">
                 @error('name')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                 @enderror
          <div class="input-group-append">
            <div class="input-group-text bg-white border-0">
              <span class="fas fa-user text-danger "></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 " style="width:90%; margin:0 auto;border-bottom:2px solid #ff98a2;">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror bg-white border-0" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                 @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                @enderror
        
          <div class="input-group-append">
            <div class="input-group-text bg-white border-0">
              <span class="fas fa-envelope text-danger "></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3" style="width:90%; margin:0 auto; border-bottom:2px solid #ff98a2;">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror bg-white border-0" name="password" required autocomplete="new-password" placeholder="Password">
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
              
          <div class="input-group-append">
            <div class="input-group-text bg-white border-0">
              <span class="fas fa-lock text-danger"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3  " style="width:90%; margin:0 auto;border-bottom:2px solid #ff98a2;">
           <input id="password-confirm" type="password" class="form-control bg-white border-0" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
          <div class="input-group-append">
            <div class="input-group-text bg-white border-0">
              <span class="fas fa-lock text-danger "></span>
            </div>
          </div>
        </div>
      
        <div class="w-100 d-flex justify-content-center mt-4">
            <button type="submit" class="btn w-75 bg-danger">
                <b>{{ __('Create account') }}</b> 
            </button>
        </div>
      <div class="w-100 d-flex justify-content-center align-items-center mt-3">
        <div class="text-center mr-2">already have an account?</div>
        <a href="login"> 
          <div type="submit" class="btn w-100" style="background:#ff98a2; color:#000;">
                  <b>{{ __(' Sign in') }}</b>
          </div>
        </a>
      </div>
      </div>
      </form>


     
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>



@endsection
