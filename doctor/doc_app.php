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

</head>

<body>
    <form method="POST">
        <nav>
            <div class="nav-links">
                <ul>
                    <li><input type="date" name="date" placeholder="Select date"></li>
                    <li><button name="filter" class="filter">Search</button></li>
                    <li><a href="">Appointments</a></li>

                    <li><a href="../logout.php">LOG OUT</a></li>
                </ul>
            </div>
        </nav>



        <table id="list">


            <tr>
                <th> Time</th>
                <th>Patient Name </th>

                <th> Problem</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Phone NO.</th>
                <th>Address</th>
                <th>Feedback</th>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($display)) {
                $patient_id = $row['patient_id'];
                $dis = mysqli_query($conn, "SELECT * FROM patients_info WHERE patient_id='$patient_id'");
                while ($rowe = mysqli_fetch_array($dis)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row["booked_time"]; ?>
                        </td>
                        <td>
                            <?php echo $rowe["patient_name"]; ?>
                        </td>
                        <td>
                            <?php echo $row["description"]; ?>
                        </td>


                        <td>
                            <?php echo $rowe["patient_age"]; ?>
                        </td>
                        <td>
                            <?php echo $rowe["patient_gender"]; ?>
                        </td>
                        <td>
                            <?php echo $rowe["patient_phone"]; ?>
                        </td>
                        <td>
                            <?php echo $rowe["patient_address"]; ?>
                        </td>
                        <td>
                            <?php echo wordwrap($row["feedback"], 30, '<br>'); ?>&nbsp;&nbsp;<button class="btn-primary btn"> <a
                                    href="feedback.php?id=<?php echo $row['patient_id']; ?>" class="text-white"> Edit Feedback
                                </a> </button>
                        </td>


                    </tr>
                    <?php
                    $i++;
                }
            }

            ?>
            <script type="text/javascript">

                $(document).ready(function () {
                    $('#tabledata').DataTable();
                })

            </script>
        </table>


    </form>
    <?php
    if (isset($_POST['filter'])) {

        $date1 = $_POST['date'];
        $date = date("Y-m-d", strtotime($date1));
        $display1 = mysqli_query($conn, "SELECT * FROM appointments where created_date= '$date' and
     doctor_id= '" . $_SESSION['doctor_id'] . "' 
      ");

        echo "<br/><br/><br/><h2> APPOINTMENT OF $date : </h2>";
        echo "<table id='list'>
        <tr>
                    <th> Time</th>
                    <th>Patient Name</th>
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
                echo "<tr><td>" . $row1['booked_time'] . "</td><td>" . $exo['patient_name'] . "</td><td>" . $row1['patient_id'] . "</td>
            <td>" . $exo['patient_age'] . "</td><td>" . $exo['patient_gender'] . "</td> <td>" . $exo['patient_phone'] . "</td>
            <td>" . $exo['patient_address'] . "</td><td>" . $row1['feedback'] . "</td></tr>";
                $i++;
            }
        }

        echo "</table>";

    }
    ?>