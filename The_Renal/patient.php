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
                    <a href="patientdetails.php" class="nav-link nav-item">Displaypatient</a>
                </li>
                <li class="nav-item">
                    <a href="stafflogin.php" class="nav-item nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="form" class="container justify-content-center">
        <h2 class="display-4 text-center">Registering patient</h2>
        <form action="addpatient.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-6">
                    <label for="name">name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="name of the patient">
                </div>
                <div class="form-group col-md-3"></div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-6">
                    <label for="phonenumber">phonenumber</label>
                    <input type="text" class="form-control" name="phonenumber" id="phonenumber" placeholder="phonenumber of the patient">
                </div>
                <div class="form-group col-md-3"></div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-6">
                    <label for="dob">date-of-birth</label>
                    <input type="date" class="form-control" name="dob" id="dob" placeholder="date of birth of the patient" onclick="presentdate()" onchange="calcage()">
                </div>
                <div class="form-group col-md-3"></div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-6">
                    <label for="age">Age</label>
                    <input type="number" class="form-control"  value="<?php echo $info;?>" name="age" id="age" placeholder="age of patient" readonly>
                </div>
                <div class="form-group col-md-3"></div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-6">
                    <button class="btn btn-primary btn-block">Add</button>
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

        function presentdate() {
            function currentDate() {
                let currentdate = new Date();
                let year = currentdate.getUTCFullYear();
                let month = currentdate.getUTCMonth() + 1;
                if(month < 10){
                    month = '0' + month;
                }
                let date = currentdate.getUTCDate();
                if(date < 10){
                    month = '0' + date;
                }
                return year+'-'+month+'-'+date;
            }
            const date = currentDate();
            document.querySelector('input[type = date]').max = date;
        }

        function calcage() {
            var userinput = document.getElementById("dob").value;
            var dob = new Date(userinput);
            if(userinput==null || userinput=='') {
                alert('Please select date of birth!!!'); 
                return false; 
            } else {
                
                var month_diff = Date.now() - dob.getTime();
                var age_dt = new Date(month_diff); 
                var year = age_dt.getUTCFullYear();
                var age = Math.abs(year - 1970);
                return document.getElementById("age").value =  age;
            }
        }
    </script>
</body>
</html>