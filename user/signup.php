<?php

include('../config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['name'];
    $phone = $_POST["phone"];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $y = $_POST['year'];
    $d = $_POST['date'];
    $m = $_POST['month'];




    if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
        echo "<script>
alert('Only alphabets and whitespaces are allowed in name!!');

</script>";
    } else {
        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
        if (!preg_match($pattern, $email)) {
            $ErrMsg = "Email is not valid.";
            echo "<script>
alert('Email address not valid!');

</script>";
        } else {

            $age = date("Y") - $y;
            $dob = date("Y-m-d", strtotime($y . '-' . $m . '-' . $d));

            if ($password == $cpassword) {
                $dup = mysqli_query($conn, "SELECT * FROM patients_info WHERE patient_email='$email' ");
                if (mysqli_num_rows($dup) > 0) {
                    echo "<script>alert('Oops! Email already exist.')</script>";

                } else {

                    $insert = "INSERT INTO patients_info(patient_name, patient_phone, patient_dob, patient_address, patient_age, patient_gender, patient_email, 
          patient_password) VALUES ('$username','$phone', '$dob' ,'$address','$age','$gender','$email','$password')";
                    if (mysqli_query($conn, $insert)) {
                        $_SESSION['login_user'] = $email;

                        echo "<script> alert('Account created.')</script>";

                        header("Location: department.php");
                    } else {
                        echo "<script> alert('Oops! Something went wrong.')</script>";
                    }
                }
            } else {
                echo "<script> alert('Password not matched.')</script>";
            }
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewpoint" content="width-device-width, initial-scale=1.0">
    <title>Online Health Appointment System</title>
    <link rel="stylesheet" href="../style1.css">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

    </style>
</head>

<body>


    <section class="header">
        <nav>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="">ABOUT US</a></li>
                    <li><a href="">CONTACT US</a></li>
                    <li><a href="login.php">LOG IN</a></li>
                </ul>
            </div>
        </nav>

        <form name="signp" method="POST" action="">
            <div class="Loginformcontainer">
                <h1>A & S HOSPITAL</h1><br>


                <div class="input-name">
                    <i class="fa fa-user icon"></i>
                    <input type="text" name="name" placeholder=" Enter your  name" required class="input-field">
                </div>


                <div class="input-icons">
                    <i class="fa fa-phone icon"></i>
                    <input type="tel" name="phone" pattern="[0-9]{10}" placeholder=" Enter your phone number"
                        class="input-field" required>
                </div>


                <div class="input-icons">
                    <i class="fa fa-map-marker icon"></i>
                    <input type="text" name="address" placeholder=" Enter your address" required class="input-field">
                </div>


                <div class="input-icons">
                    DOB: &nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="month">
                        <option selected="true" disabled="disabled">Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>

                    </select>

                    <select name="date">
                        <option selected="true" disabled="disabled">Date</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    <select name="year">
                        <option selected="true" disabled="disabled">Year</option>
                        <?php for ($i = date('Y'); $i >= 1970; $i--): ?>
                            <option value="<?php echo $i; ?>">
                                <?php echo $i; ?>
                            </option>
                        <?php endfor; ?>
                    </select>


                    <div class="input-icons"><br>
                        Gender:
                        <input type="radio" id="gender" name="gender" value="male" />Male
                        <input type="radio" id="gender" name="gender" value="female" /> Female
                        <input type="radio" id="gender" name="gender" value="Other" />Other
                    </div>


                    <div class="input-icons">
                        <i class="fa fa-envelope icon"></i>
                        <input type="email" name="email" placeholder=" Email" required class="input-field">
                    </div>


                    <div class="input-icons">
                        <i class="fa fa-lock icon"></i>
                        <input type="password" name="password" placeholder=" Password" required class="input-field">
                    </div>


                    <div class="input-icons">
                        <i class="fa fa-lock icon"></i>
                        <input type="password" name="cpassword" placeholder="Confirm password" required
                            class="input-field">
                    </div>


                    <div class="input-button">
                        <button name="submit" class="Signupbutton">Create Account</button><br><br>
                        <p class="Signup">Already have an account?<a href="login.php">Log in</a></p>
                    </div>
                </div>
        </form>
    </section>

</body>

</html>