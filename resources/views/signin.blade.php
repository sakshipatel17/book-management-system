<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login Please</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <script>
     function myFunction() {
         alert("Login successfully!");
}
    </script>
</head>

<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="{{url('loginimage.jpg')}}" alt="IMG">
        </div>
        <form class="login100-form validate-form" method="post" action="login_user">
          @csrf
          <span class="login100-form-title" style="font-weight:bolder;font-family:times;font-size:45px;color:navy;">
            Member Login
          </span>

          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="email" placeholder="Email" required\>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
            @error('email')
            <div class="alert alert-danger mt-1 mb-1">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password" placeholder="Password" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
            @error('password')
            <div class="alert alert-danger mt-1 mb-1">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" style="background-color:navy;color:white;" onclick="myFunction()">
              Login
            </button>
          </div>

          <div class="text-center p-t-12">
            <a class="txt2" href="forget_password" style="color:red;">
              <h6>Forget Password? Click Me..!!</h6>
            </a>
          </div>

          <div class="text-center p-t-136">
            <a class="txt2" href="signup" style="color:navy;">
              <h6>Don't have an account? Create it..!!</h6>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>




  <!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>

</html>