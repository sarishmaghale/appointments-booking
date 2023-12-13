<?php

include('../config.php');

$_SESSION['department'] = 'dental';
$category = 'dental';



if (isset($_POST['submit'])) {

  if (empty($_POST["setappcs"])) {
    echo "<script>alert('Please select time')</script>";
  } else {
    $pid = $_SESSION['user_id'];
    $today_date = date("Y-m-d");
    $booking_time = $_POST['setappcs'];
    $description = $_POST['description'];
    $doctor_id = $_POST["doctor_id"];
    $_SESSION['time'] = $time;
    $result = mysqli_query($conn, "SELECT * FROM appointments where  created_date='$today_date'AND doctor_id='$doctor_id' AND
          patient_id='" . $_SESSION['user_id'] . "' ");
    $checkresult = mysqli_num_rows($result);
    if ($checkresult > 0) {
      echo "<script>alert('You already booked the ticket!')</script>";
    } else {
      $sql = mysqli_query($conn, "SELECT * from appointments where created_date='$today_date' and doctor_id='$doctor_id'
         and booked_time= '$booking_time' ");

      $sql_result = mysqli_num_rows($sql);
      if ($sql_result > 0) {
        echo "<script>alert('Sorry, The selected time is already booked')</script>";
      } else {

        $insert = "INSERT INTO appointments ( patient_id, doctor_id, description, created_date, booked_time)
                Values ('$pid' ,'$doctor_id' , '$description', '$today_date', '$booking_time')";

        if (mysqli_query($conn, $insert)) {
          echo " alert('booked')";

          header("Location: appointment.php");
        } else {
          echo "<script> alert('Oops! Something went wrong.')</script>";
        }
      }
    }
  }

}


?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewpoint" content="width-device-width, initial-scale=1.0">
  <title> Online Health Appointment System</title>
  <link rel="stylesheet" href="../style3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <style>
    textarea {
      resize: none;
      text-align: center;

    }
  </style>
</head>

<body>


  <?php
  include 'header2.php';
  ?>

  <div class="topic">
    <h1> <img src="../images/dental.png" height="50px">DENTAL</h1>
  </div>

  <div class="doctors">

    <?php
    $sql = "SELECT * FROM doctors_info WHERE doctor_specialization='$category'";
    $all_doctors = $conn->query($sql);
    ?>
    <?php
    if ($all_doctors) {
      while ($row = mysqli_fetch_assoc($all_doctors)) {

        ?>
        <div class="doc-menu">
          <img src="<?php echo $row["photo"]; ?>" alt="" height="200mm" width="250mm">


          <div class="btn-one">
            <button class="drop"><i class="fas fa-bars"></i></button>
            <div class="doc-name">
              Dr.
              <?php echo $row["doctor_name"]; ?>

            </div>
            <div class="info-box">
              <p>Name:
                <?php echo $row["doctor_name"]; ?><br>
                Every
                <?php echo $row["day_from"]; ?>-
                <?php echo $row["day_to"]; ?>
              <form name="gm" method="POST">
                <input type="hidden" value="<?php echo $row["doctor_id"]; ?>" name="doctor_id">
                <div class="custom-select">
                  <select name="setappcs" required></p>
                    <option selected="true" disabled="disabled">Set Appointment</option>
                    <?php

                    $mark = explode(',', $row["time"]);

                    foreach ($mark as $out) {
                      ?>
                      <option value="<?php echo $out; ?>">
                        <?php echo $out; ?>
                      </option>
                      <?php
                    }
                    ?>
                  </select>
                  <br /><textarea name="description" rows="3" cols="24" placeholder="specify your problem"></textarea>
                </div>
                <button class="submit" name="submit">BOOK</button>
            </div>
          </div>
        </div>
        </form>

        <?php
      }
    } ?>

  </div>