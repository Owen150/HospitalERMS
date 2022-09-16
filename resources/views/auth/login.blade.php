
@extends('template.auth')

@section('content')

<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
            <div class="row">
                
                <div class="col-6 text-start">
                  <img src="./images/WKMHLogo.png" style="width: 8%;">
                </div>


                <div class="col-6 text-end mt-2">
                    <h6 class="font-weight-bolder">
                        <span id="time"></span>
                    </h6>
                </div>
                
            </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card mt-9 mb-8">
                <div class="card-header pb-0 text-center bg-transparent">
                  <h3 class="font-weight-bolder">Welcome back</h3>
                </div>
                <div class="card-body">
                  <form role="form" method="post" action="{{ route('login') }}">
                                @csrf

                            <label>Email Address</label>
                            <div class="form-group mb-3">
                                <input id="email" class="form-control @error('email') border-danger @enderror"
                                    type="email" placeholder="Email Address" name="email" autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                            
                            </div>

                            <label>Password</label>
                            <div class="form-group mb-3">
                                <input id="password" placeholder="Password"
                                    class="form-control @error('password') border-danger @enderror" type="password" name="password" autocomplete="current-password">
                                    @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{--
                                @if (Route::has('password.request'))
                                    <br> <a class="text-decoration-none" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                @endif
                                --}}
                            </div>

                            <!--Remember Me-->
                            
                            <!--End of Remember Me-->
                            
                            <div class="div text-center">
                                <input class="form-control btn bg-gradient-dark w-50 mt-4 mb-0" value="Login"
                                type="submit" name="">
                            </div>
                    

                        </form>
                </div>
            
              </div>
            </div>

            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('./images/WKMHLogo.png'); background-size: contain; background-color:rgb(46, 7, 83);"></div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </main> 
</div>

@endsection