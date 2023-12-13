<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.css">
    <style>
        button {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            border: 1px solid #fff;
            padding: 12px 34px;
            font-size: 13px;
            background: transparent;
            position: relative;
            cursor: pointer;
        }

        button:hover {
            border: 1px solid #f44336;
            background: #f44336;
            transition: 1s;
        }
    </style>
</head>

<body>
    <?php
    include 'main.php';
    ?>
    <div class="main-content">


        <form method="POST" enctype="multipart/form-data">
            <label>Doctor Name:</label>
            <input type="text" name="doctor_name"><br />
            <label>Doctor Specialization:</label>
            <select name="doctor_specialization">

                <option value="general medicine">general medicine</option>
                <option value="cardiology">cardiology</option>
                <option value="dermatology">dermatology</option>
                <option value="dental">dental</option>
                <option value="ent">ent</option>
                <option value="gynaecology">gyanecology</option>
                <option value="neurology">neurology</option>
            </select><br />
            <label>Doctor phone:</label>
            <input type="tel" name="doctor_phone" pattern="[0-9]{10}"><br />
            <label> Doctor email:</label>
            <input type="email" name="doctor_email"><br />
            <label>Doctor password:</label>
            <input type="password" name="doctor_password"><br />
            <label> Doctor available Day:</label>
            <input type="text" name="day_from" placeholder="from"> <input type="text" name="day_to"
                placeholder="to"><br />
            <label>Choose Image:</label>
            <input type="file" name="photo" accept="image/*">
            <br />
            <label> Doctor available Time:</label><br />
            &nbsp;&nbsp;&nbsp; <input type="checkbox" name="time[]" value="10A.M - 11A.M."> 10A.M - 11A.M.
            &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="time[]" value="11A.M - 12 A.M."> 11A.M - 12 A.M &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="time[]" value="12A.M - 1P.M."> 12A.M - 1P.M.&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="time[]" value="1P.M - 2P.M."> 1P.M - 2P.M. <br />
            &nbsp;&nbsp;&nbsp; <input type="checkbox" name="time[]" value="2P.M - 3P.M."> 2P.M - 3P.M.
            &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="time[]" value="3P.M - 4P.M."> 3P.M - 4P.M. &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="time[]" value="4P.M - 5P.M."> 4P.M - 5P.M. &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="time[]" value="5P.M - 6P.M."> 5P.M - 6P.M.<br />

            <button name="submit">INSERT</button>
    </div>
    </div>
    </form>
</body>

</html>
<?php
include('../config.php');
if (isset($_POST['submit'])) {
    $doctor_name = $_POST['doctor_name'];
    $doctor_specialization = $_POST['doctor_specialization'];
    $doctor_phone = $_POST['doctor_phone'];
    $doctor_email = $_POST['doctor_email'];
    $doctor_password = $_POST['doctor_password'];
    $day_from = $_POST['day_from'];
    $day_to = $_POST['day_to'];
    $time = $_POST['time'];
    $time_string = implode(",", $time);
    $photo = $_POST['photo'];
    $name = $_FILES['photo']['name'];
    $temp = $_FILES['photo']['tmp_name'];


    $location = "../images/";
    $image = $location . $name;

    $target_dir = "../images/";
    $finalImage = $target_dir . $name;

    move_uploaded_file($temp, $target_dir . $name);

    $extension = substr($name, strlen($name) - 4, strlen($name));
    // allowed extensions
    $allowed_extensions = array(".jpg", "jpeg", ".png");
    $dup = mysqli_query($conn, "SELECT * FROM doctors_info WHERE doctor_email='$doctor_email' ");
    if (mysqli_num_rows($dup) > 0) {
        echo "<script>alert('Oops! Email already exist.')</script>";

    } else {
        $insert = mysqli_query($conn, "INSERT INTO `doctors_info`( `doctor_name`, `doctor_specialization`, `doctor_phone`, `doctor_email`,
         `day_from`, `day_to`, `time`, `doctor_password`, `photo`)
         VALUES ('$doctor_name','$doctor_specialization','$doctor_phone','$doctor_email',
         '$day_from','$day_to' , '$time_string' ,'$doctor_password', '$image')");

        if ($insert) {
            $fetch = mysqli_query($conn, "SELECT * from doctors_info WHERE doctor_email='$doctor_email' ");
            $get_data = mysqli_fetch_array($fetch);
            $doctor_id = $get_data["doctor_id"];
            echo "Doctor Id is $doctor_id";

        } else {
            echo "<script>alert('wrong')</script>";
        }
    }
}
?>