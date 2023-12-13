<?php

include('../config.php');

$today_date = date('Y/m/d');
$display = mysqli_query($conn, "SELECT * FROM appointments where created_date= '$today_date' and
     doctor_id= '" . $_SESSION['doctor_id'] . "' 
      ");

$id = $_SESSION['doctor_id'];

?>


<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="../style3.css">
    <style>
        #date {
            margin-top: 25px;
            margin-left: 30px;
            padding: 10px;
            width: 200px;
            height: 30px;
        }

        #filter {
            width: 100px;
            height: 30px;
            margin-left: 30px;
        }
    </style>

</head>

<body>
    <form method="POST">
        <nav>
            <div class="nav-links">
                <ul>
                    <li><a href="doc_app.php">Back</a></li>
                    <li><a href="search_aptmnt.php">Appointments</a></li>
                    <li><a href="">PROFILE</a></li>
                    <li><a href="doctor_login.php">LOG OUT</a></li>
                </ul>
            </div>
        </nav>

        <input type="date" name="date" id="date" placeholder="Select date">
        <button name="filter" class="filter" id="filter">Search</button>
    </form>

    <?php
    if (isset($_POST['filter'])) {

        $date1 = $_POST['date'];
        $date = date("Y-m-d", strtotime($date1));
        $display1 = mysqli_query($conn, "SELECT * FROM appointments where created_date= '$date' and
     doctor_id= '" . $_SESSION['doctor_id'] . "' 
      ");
        echo "<br/><h2> APPOINTMENT OF $date : </h2>";
        echo "<table id='list'>
        <tr>
                    <th> Time</th>
                    <th>Patient Name</th>
                    <th>Problem</th>
                    <th> ID</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Phone NO.</th>
                    <th>Address</th>
                    <th>Feedback</th>
        </tr>";
        $i = 0;
        while ($row1 = mysqli_fetch_array($display1)) {
            $patient_id = $row1['patient_id'];
            $ex = mysqli_query($conn, "SELECT * FROM patients_info WHERE patient_id='$patient_id'");
            while ($exo = mysqli_fetch_array($ex)) {
                echo "<tr><td>" . $row1['booked_time'] . "</td><td>" . $exo['patient_name'] . "</td><td>" . $exo['description'] . "</td><td>" . $exo['patient_id'] . "</td>
            <td>" . $exo['patient_age'] . "</td><td>" . $exo['patient_gender'] . "</td> <td>" . $exo['patient_phone'] . "</td>
            <td>" . $exo['patient_address'] . "</td><td> <input type='text' name='feeedback' >Feeback<button name='ok'>OK</button></td></tr>";
                $i++;
            }
        }

        echo "</table>";

    }
    ?>