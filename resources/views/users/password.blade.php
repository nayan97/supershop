@extends('home.layouts.app')

@section('home-main')
<hr>
<section class="my-account container">
  <h2 class="page-title">Account Details</h2>
  <div class="row">
    <div class="col-lg-3">
      <ul class="account-nav">
        <li><a href="{{route ('user.index')}}" class="btn btn-sm">Profile</a></li>
        <li><a href="{{route ('user.password')}}" class="btn btn-sm">Password</a></li>
        {{-- <li><a href="account-address.html" class="menu-link menu-link_us-s">Addresses</a></li>
        <li><a href="account-details.html" class="menu-link menu-link_us-s">Account Details</a></li> --}}
        <li><a href="{{route('wishlist.show')}}" class="btn btn-sm">Wishlist</a></li>
        <li>    
            <a class="btn btn-sm" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
        </li>
      </ul>
    </div>
    <div class="col-lg-9">
      <div class="page-content my-account__edit">
        <div class="my-account__edit-form">
          <form name="account_edit_form" action="{{ route('password.update', $users->id)}}" method="POST" class="needs-validation" novalidate="">
            @csrf

            @include('validate.error')
            @include('validate.success')
            
            <div class="row">
              <div class="col-md-12">
                <div class="my-3">
                  <h5 class="text-uppercase mb-0">Password Change</h5>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old password" required="">
                  <label for="old_password">Old password</label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <input type="password" class="form-control" id="new_password" name="password" placeholder="New password" required="">
                  <label for="account_new_password">New password</label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <input type="password" class="form-control" cfpwd="" data-cf-pwd="#new_password" id="new_password_confirmation" name="password_confirmation" placeholder="Confirm new password" required="">
                  <label for="new_password_confirmation">Confirm new password</label>
                  <div class="invalid-feedback">Passwords did not match!</div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="my-3">
                  <button type="submit" class="btn site-btn">Save Changes</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection