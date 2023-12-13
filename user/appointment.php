<?php
include('../config.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewpoint" content="width-device-width, initial-scale=1.0">
    <title> Online Health Appointment System</title>
    <link rel="stylesheet" href="../style3.css">
</head>

<body>
    <form method="post">
        <?php
        include 'header2.php';
        ?>

        <div class="welcome"><br />
            <h2> Appointment booked!! </h2>
            <div class="app-info">

                <?php
                $_SESSION['user_id'] = $pid;
                $data1 = mysqli_query($conn, "SELECT * FROM appointments where  created_date='$today_date' AND
                patient_id='" . $_SESSION['user_id'] . "' ");
                $result = mysqli_num_rows($data1);
                if ($result == 0) {

                    echo "No any appointment at the moment!";
                } else {

                    while ($info = mysqli_fetch_array($data1)) {
                        $patient_id = $info['patient_id'];
                        $doctor_id = $info['doctor_id'];
                        $data3 = mysqli_query($conn, "SELECT * FROM patients_info WHERE patient_id='$patient_id'");
                        while ($info3 = mysqli_fetch_array($data3)) {
                            $data2 = mysqli_query($conn, "SELECT * FROM doctors_info where  doctor_id='$doctor_id' ");
                            while ($info2 = mysqli_fetch_array($data2)) {

                                ?>
                                <h3>
                                    <?php echo $info['created_date'] ?>
                                </h3>
                                <h2>Appointment info</h2>
                                <br />
                                Patient Name:
                                <?php echo $info3['patient_name'] ?><br />
                                Department:
                                <?php echo $info2['doctor_specialization'] ?><br />
                                Doctor Name:
                                <?php echo $info2['doctor_name'] ?><br />
                                Booked Time:
                                <?php echo $info['booked_time'] ?><br />
                                <?php
                                if (empty($info['feedback'])) { ?>
                                    <button type='submit' name='cancel'>CANCEL</button><br />
                                    <?php
                                } else { ?>
                                    <br />
                                    <h3>Presciption/Feedback:</h3><br />
                                    <?php echo $info['feedback'] ?><br />
                                    <?php
                                }
                            }
                        }
                    }
                }
                ?>
                <?php

                if (isset($_POST['cancel'])) {
                    $cancel = "DELETE FROM appointments where  patient_id= '" . $_SESSION['user_id'] . "'";
                    if (mysqli_query($conn, $cancel)) {
                        echo "Appointment cancelled!";

                    }
                }


                ?>
            </div>
        </div>
        <div class="profilecontainer">

            <h1>ID NO:
                <?php echo $_SESSION['user_id'] ?>
            </h1><br />
            <a href="appointment.php">MY APPOINTMENT</a>
            Name:
            <span class="input-icons">
                <i class="fa fa-pencil icon"></i>
                <input type="text" name="name" placeholder="<?php echo $_SESSION['pname'] ?>"><br />
            </span>

            Phone:
            <div class="input-icons">
                <i class="fa fa-pencil icon"></i>
                <input type="tel" name="phone" pattern="[0-9]{10}" placeholder="<?php echo $_SESSION['pphone'] ?>"><br />
            </div>

            Address:
            <div class="input-icons">
                <i class="fa fa-pencil icon"></i>
                <input type="text" name="address" placeholder="<?php echo $_SESSION['paddress'] ?>"><br />
            </div>

            Email address:
            <div class="input-info">
                <?php echo $_SESSION['login_user'] ?><br />
            </div>

            Date of Birth:
            <div class="input-icons">
                <i class="fa fa-pencil icon"></i>
                <input type="text" name="dob" placeholder="<?php echo $_SESSION['pdob'] ?>"><br />
            </div>

            <button class="save-btn" name="save-btn">Save</button>
            <?php
            if (isset($_POST['save-btn'])) {
                $new_name = $_POST['name'];
                $new_phone = $_POST['phone'];
                $new_address = $_POST['address'];
                $new_dob = $_POST['dob'];
                if (empty($new_name)) {
                    $new_name = $_SESSION['pname'];
                }
                if (empty($new_phone)) {
                    $new_phone = $_SESSION['pphone'];
                }
                if (empty($new_address)) {
                    $new_address = $_SESSION['paddress'];
                }
                if (empty($new_dob)) {
                    $new_dob = $_SESSION['pdob'];
                }
                $currentDate = date("d-m-Y");
                $age = date_diff(date_create($new_dob), date_create($currentDate));

                $new_age = $age->format("%y");

                $update = "UPDATE patients_info
    set patient_name= '$new_name' , patient_phone ='$new_phone', patient_address='$new_address', patient_dob='$new_dob'
    , patient_age='$new_age'
    where patient_email= '" . $_SESSION['login_user'] . "'";
                if (mysqli_query($conn, $update)) {
                    echo "Successfully update";
                }
            }

            ?>
        </div>

        </div>

    </form>
</body>

</html>