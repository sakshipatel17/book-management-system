@extends('admin.layouts.main')
@section('content')

<div class="main-w3layouts wrapper">
  <h1 style="margin-left:400px;margin-right:400px;padding:20px;border-radius:60px;background-color:#D19C97;color:navy;font-weight:bold;font-family:times;">
    Reset Admin Password
  </h1>
  <div class="main-agileinfo">
    <div class="agileits-top" style="background-color:#D19C97;">
      <form class="login100-form validate-form" method="post" action="admin_update_pwd">
        @csrf
        <div class="wrap-input100 validate-input" data-validate="Email Id is required">
          <label>Email ID : </label>
          <input class="input100" type="text" name="email" placeholder="Email Id Please" required>
          @error('email')
          <div class="alert alert-danger mt-1 mb-1">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="wrap-input100 validate-input" data-validate="Password is required">
          <label>New Password : </label>
          <input class="input100" type="password" name="password" placeholder="Password" required>
          @error('password')
          <div class="alert alert-danger mt-1 mb-1">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="wrap-input100 validate-input" data-validate="Re Password is required">
          <label>Retype Password : </label>
          <input class="input100" type="password" name="repassword" placeholder="Retype Password" required>
          @error('repassword')
          <div class="alert alert-danger mt-1 mb-1">
            {{ $message }}
          </div>
          @enderror
        </div>

        <input type="submit" value="Reset Password" style="background-color:navy;color:white;border-radius:18px;">
      </form>
    </div>
  </div>
</div>
@endsection