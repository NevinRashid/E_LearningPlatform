@extends('layouts.app')

@section('content')
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="../../assets/images/logo.svg">
                        </div>
                        <h4>New here?</h4>
                        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                        <form method="POST" action="{{ route('register') }}" class="pt-3">
                            @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg  @error('name') is-invalid @enderror" name="name" id="exampleInputUsername1" value="{{ old('name') }}" placeholder="Username">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" id="exampleInputEmail1"  value="{{ old('email') }}" required placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required id="exampleInputPassword1" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" name="password_confirmation" required id="exampleInputPassword1" placeholder="confirmed password">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="phone">
                        </div>
                        <div class="mt-3 d-grid gap-2">
                            <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN UP</button>
                        </div>
                        <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
        <!-- page-body-wrapper ends -->
</div>
@endsection
