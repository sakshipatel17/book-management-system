<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">


    <!--google fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <!--css link-->
    <link href="style.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .myBackground {
            background-image: url('background2.jpg');
            height: 12450px;
            width: 1500px;
        }
    </style>
</head>

<body>
    <script>
        var msg = "{{Session::get('success_csv')}}";
        var exist = "{{Session::has('success_csv')}}";
        if (exist) {
            alert(msg);
        }
    </script>
    <div class="wrapper">
        <div id="content">
            <!--top--navbar----design--------->
            <div class="top-navbar">
                <nav class="navbar  navbar-expand-lg">
                    <button type="button" id="sidebar-collapse" class="d-xl-block d-lg-block d-md-none d-none">
                        <span class="material-icons">arrow_back_ios</span>
                    </button>

                    <a class="navbar-brand" href="#">Dashboard</a>
                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
                        <span class="material-icons">more_vert</span>
                    </button>
                    <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarcollapse">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="material-icons"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="material-icons"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><span class="material-icons"></span></a>
                            </li>
                        </ul>
                    </div>
                    @if (session()->get('session_admin_name'))
                    <?php
                    $img = session()->get('session_admin_photo');
                    ?>
                    <a href="admin_change_pwd">
                        <img src="{{asset('uploads/' . $img)}}" alt="profile" style="height:50px;width:50px;border-style:solid;border-radius:50%" />
                    </a>
                    Welcome {{session()->get('session_admin_name');}}
                    <a href="/logout_admin" class="nav-item nav-link" style="color:white;font-weight:bolder">Logout</a>
                    @else
                    <a style='color:navy' href="#">Welcome Guest</a>
                    <a href="signin" class="nav-item nav-link">Login</a>
                    <a href="signup" class="nav-item nav-link">Register</a>
                    @endif
                </nav>
            </div>
            <div class="body-overlay">
                <nav id="sidebar">
                    <div class="sidebar-header">
                        <h2><span>Book Store</h2>
                        <br><br><br><br><br><br>
                        <h3>
                            <a href="admin_author">Authors</a>
                            <br><br>
                            <a href="admin_category">Categories</a>
                            <br><br>
                            <a href="admin_book">Books</a>
                            <br><br>
                            <a href="admin_feedback">Feedbacks</a>
                            <br><br>
                            <a href="admin_backup_csv">Backup 2 CSV</a>
                            <br><br>
                            <a href="admin_change_pwd">Change Password</a>
                        </h3>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="myBackground">