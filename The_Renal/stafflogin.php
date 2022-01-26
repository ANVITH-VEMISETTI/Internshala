<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <nav id="mainNavbar" class="navbar navbar-dark navbar-expand-md py-0 fixed-top">
        <a href="index.html" class="navbar-brand">VEMISETTI HOSPITALS</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navlinks" aria-label="Toggle Navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navlinks">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.html" class="nav-item nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="stafflogin.php" class="nav-item nav-link">Staff</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="form" class="container justify-content-center">
        <h2 class="display-4 text-center">Staff Login Form</h2>
        <form action="staff.php" method= "post">
            <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="username">
                </div>
                <div class="form-group col-md-3"></div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-6">
                    <label for="pass">password</label>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="password">
                </div>
                <div class="form-group col-md-3"></div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-6">
                    <label for="branch">branch</label>
                    <select name="branch" id="branch" class="form-control">
                        <option value="" disabled selected>select branch</option>
                            <?php
                            include 'config.php';
                            $sid=$_GET['id'];
                            $sql = "SELECT * FROM branch ORDER BY name ASC";
                            $result=mysqli_query($link,$sql);
                            if(!$result)
                            {
                                echo "Error ".$sql."<br>".mysqli_error($conn);
                            }
                            while($rows = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo $rows['name'];?>">
                            <?php echo $rows['name'] ;?>
                        </option>
                        <?php 
                        } 
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3"></div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-6">
                    <button class="btn btn-primary btn-block">login</button>
                </div>
                <div class="form-group col-md-3"></div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script>
        $(function () {
            $(document).scroll(function () {
                var $nav = $("#mainNavbar");
                $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
            });
        });
    </script>
</body>

</html>
