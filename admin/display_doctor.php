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
    <form method="POST">
      ENTER DEPARTMENT : <Input type='text' name='department'>
      <button name='display_dpt'>OK</button><br />
      ENTER Doctor ID : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <Input type='text' name='id'> &nbsp;&nbsp;
      <button name='display_id'>OK</button><br />
      <?php
      include('../config.php');
      if (isset($_POST['display_dpt'])) {
        echo "<br><br> DOCTOR'S INFO";
        $department = $_POST['department'];
        echo "<table  border=1, border-collapse=collapse>
    <tr> <th>NAME:</th>
    <th>ID</th>
    <th>Available day</th>
    <th> AVAILABLE time</th>
    </tr>";
        $sql = mysqli_query($conn, "SELECT * FROM doctors_info where doctor_specialization ='$department' ");
        while ($row = mysqli_fetch_array($sql)) {
          echo "<tr>
        <td>" . $row['doctor_name'] . "</td>
        <td>" . $row['doctor_id'] . "</td>
        <td>" . $row['doctor_available'] . "</td>
        <td>" . $row['doctor_availability'] . "</td>
        </tr>";




        }
        "</table>";
      }

      if (isset($_POST['display_id'])) {
        echo "<br><br> DOCTOR'S INFO";
        $id = $_POST['id'];
        echo "<table  border=1, border-collapse=collapse>
        <tr> <th>NAME:</th>
         <th>Avail. Day:</th>
        <th>Avail. Time:</th>
        <th>Email:</th>
        <th>Password:</th>
        
        </tr>";
        $sql = mysqli_query($conn, "SELECT * FROM doctors_info where doctor_id ='$id' ");
        while ($row = mysqli_fetch_array($sql)) {
          echo "<tr>
            <td>" . $row['doctor_name'] . "</td>
            <td>" . $row['doctor_available'] . "</td>
            <td>" . $row['doctor_availability'] . "</td>
            <td>" . $row['doctor_email'] . "</td>
            <td>" . $row['doctor_password'] . "</td>
            
            </tr>";




        }
        "</table>";
      }
      ?>
  </div>
  </div>
  </form>
</body>

</html>