<!DOCTYPE html>
<html>

<head>
    <title>Online Book Hub-Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
        
            function myFunction() {
         alert("registation successfully!");
}

    </script>
    <link href="style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <div class="main-w3layouts wrapper">
        <h1>Sign Up Please</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="register_user" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" placeholder="Username" value="{{old('name')}}" required><br>
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">
                    {{ $message }}
                    </div>
                    @enderror
                    <input type="email" name="email" placeholder="Email" value="{{old('email')}}" required><br>
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="password" name="password" placeholder="Password" value="{{old('password')}}" required><br>
                    @error('password')
                    <div class="alert alert-danger mt-1 mb-1">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="phone" placeholder="Contact #" value="{{old('phone')}}" required><br>
                    @error('phone')
                    <div class="alert alert-danger mt-1 mb-1">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="address1" placeholder="Address1" value="{{old('address1')}}" required><br>
                    @error('address1')
                    <div class="alert alert-danger mt-1 mb-1">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="address2" placeholder="Address2" value="{{old('address2')}}" required><br>
                    @error('address2')
                    <div class="alert alert-danger mt-1 mb-1">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="city" placeholder="city" value="{{old('city')}}" required><br>
                    @error('city')
                    <div class="alert alert-danger mt-1 mb-1">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="state" placeholder="state" value="{{old('state')}}" required><br>
                    @error('state')
                    <div class="alert alert-danger mt-1 mb-1">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" name="zip" placeholder="zip" value="{{old('zip')}}" required><br>
                    @error('zip')
                    <div class="alert alert-danger mt-1 mb-1">
                        {{ $message }}
                    </div>
                    @enderror

                    <input type="file" name="image" placeholder="Passport Photo"><br>
                    @error('image')
                    <div class="alert alert-danger mt-1 mb-1">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="submit" value="Register Me"  onclick="myFunction()">
                </form>
                <p>Already have an Account? <a href="register_user"> Login Now!</a></p>
            </div>
        </div>
        <!-- copyright -->
        <div class="colorlibcopy-agile">
            <p>© Design by : Dhrumi-Sakshi-drashti</p>
        </div>
        <!-- //copyright -->
        <ul class="colorlib-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!-- //main -->
</body>

</html>