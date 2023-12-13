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

    input {
      height: 15mm;
      width: 30mm;
    }
  </style>
</head>

<body>
  <?php
  include 'main.php';
  ?>
  <div class="main-content">
    <form method="POST">
      <input type="date" name="date"> &nbsp; &nbsp;<button name="search">SEARCH</button>
      <?php
      include('../config.php');

      if (isset($_POST['search'])) {
        $date = $_POST['date'];
        $search = "SELECT * FROM appointments WHERE created_date= '$date'";
        if (mysqli_query($conn, $search)) {
          echo "<br><br> Appointments INFO";

          echo "<table  border=1, border-collapse=collapse>
    <tr> <th>Doctor ID</th>
    <th>Patient ID</th>
    <th>Name</th>
    <th>Problem</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Phone No</th>
    <th>Address</th>
    <th>Booked Time</th>
    </tr>";
          $result = mysqli_query($conn, $search);
          while ($row = mysqli_fetch_array($result)) {
            $pid = $row['patient_id'];
            $info = mysqli_query($conn, "SELECT * FROM patients_info WHERE patient_id= '$pid'");
            while ($fetch = mysqli_fetch_array($info)) {
              echo "<tr>
        <td>" . $row['doctor_id'] . "</td>
        <td>" . $row['patient_id'] . "</td>
        <td>" . $fetch['patient_name'] . "</td>
        <td>" . $row['description'] . "</td>
        <td>" . $fetch['patient_age'] . "</td>
        <td>" . $fetch['patient_gender'] . "</td>
        <td>" . $fetch['patient_phone'] . "</td>
        <td>" . $fetch['patient_address'] . "</td>
        <td>" . $row['booked_time'] . "</td>
        </tr>";




            }
            "</table>";
          }
        }
      }
      ?>
  </div>
  </div>
  </form>
</body>

</html>