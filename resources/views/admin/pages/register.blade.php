@extends('admin.layouts.app')

@section('main-section')
<div class="row">
    <div class="col-md-8 offset-md-2">
        
        <!-- Login Tab Content -->
        <div class="account-content">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 col-lg-6 login-left">
                    <img src="{{ asset('admin/assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure Login">	
                </div>
                <div class="col-md-12 col-lg-6 login-right">
                    <div class="login-header">
                        <h3>Register <span>Doccure</span></h3>
                    </div>
                    <form action="/register" method="POST">
                        @csrf
                        <div class="form-group form-focus">
                            <input name="name" type="text" class="form-control floating">
                            <label class="focus-label">Name</label>
                        </div>
                        <div class="form-group form-focus">
                            <input name="email" type="email" class="form-control floating">
                            <label class="focus-label">Email</label>
                        </div>
                        <div class="form-group form-focus">
                            <input name="cell" type="text" class="form-control floating">
                            <label class="focus-label">Cell</label>
                        </div>
                        <div class="form-group form-focus">
                            <input name="password" type="password" class="form-control floating">
                            <label class="focus-label">Password</label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Register</button>
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>
                        <div class="row form-row social-login">
                            <div class="col-6">
                                <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
                            </div>
                        </div>
                        <div class="text-center dont-have">Already have an account? <a href="{{url('login')}}">Login</a></div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Login Tab Content -->
            
    </div>
</div>
@endsection