<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register patient</title>
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
                    <a href="patient.php" class="nav-link nav-item">Addpatient</a>
                </li>
                <li class="nav-item">
                    <a href="stafflogin.php" class="nav-item nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container justify-content-center">
        <h3 class="display-4 text-center mt-5 pt-5 pb-5">Patient Details</h3>
        <table class="table table-hover table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Patient_Name</th>
                    <th scope="col">Phone_number</th>
                    <th scope="col">Date-of-birth</th>
                    <th scope="col">Age</th>
                    <th scope="col">Admitted</th>
                </tr>
            </thead>
            <tbody>
                    <?php 
                    require_once 'config.php';

                    $sql = "SELECT * FROM `patient`";
                    $result = mysqli_query($link, $sql);
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr><th scope='col'>".$row['id']."</th>";
                        echo "<td scope='col'>".$row['name']."</td>";
                        echo "<td scope='col'>".$row['phone_number']."</td>";
                        echo "<td scope='col'>".$row['DOB']."</td>";
                        echo "<td scope='col'>".$row['Age']."</td>";
                        echo "<td scope='col'>".$row['Admitted']."</td>";
                        echo "</tr>";
                    }
                    mysqli_close($link);
                    ?>
            </tbody>
        </table>
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