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
      FILTER BY:
      <select name="choose">
        <option value="id">Patient ID</option>
        <option value="name">Name</option>
        <option value="address">Address</option>
        <option value="gender">Gender</option>
        <option value="age">Age</option>

        <option value="All">All</option>
      </select><br />
      Enter value:<br />
      <input type="text" name="value"><br />
      <button name='display'>OK</button><br />
      <?php
      include('../config.php');
      if (isset($_POST['display'])) {
        $choose = $_POST['choose'];
        echo "<br><br> Patient's INFO";
        echo "<table  border=1, border-collapse=collapse>
    <tr> <th>ID</th>
    <th>NAME:</th>
    <th>Gender</th>
    <th> Age</th>
    <th>Phone</th>
    <th> Address</th>
    <th>Email</th>
    
    </tr>";
        if ($choose == 'id') {
          $value = $_POST['value'];
          $sql = mysqli_query($conn, "SELECT * FROM patients_info where  patient_id='$value'  ");
          while ($row = mysqli_fetch_array($sql)) {
            echo "<tr>
        <td>" . $row['patient_id'] . "</td>
        <td>" . $row['patient_name'] . "</td>
        <td>" . $row['patient_gender'] . "</td>
        <td>" . $row['patient_age'] . "</td>
        <td>" . $row['patient_phone'] . "</td>
        <td>" . $row['patient_address'] . "</td>
        <td>" . $row['patient_email'] . "</td>
        </tr>";




          }
          "</table>";
        }

        if ($choose == 'name') {
          $value = $_POST['value'];
          $sql = mysqli_query($conn, "SELECT * FROM patients_info where  patient_name='$value'  ");
          while ($row = mysqli_fetch_array($sql)) {
            echo "<tr>
        <td>" . $row['patient_id'] . "</td>
        <td>" . $row['patient_name'] . "</td>
        <td>" . $row['patient_gender'] . "</td>
        <td>" . $row['patient_age'] . "</td>
        <td>" . $row['patient_phone'] . "</td>
        <td>" . $row['patient_address'] . "</td>
        <td>" . $row['patient_email'] . "</td>
        
        </tr>";




          }
          "</table>";
        }

        if ($choose == 'address') {
          $value = $_POST['value'];
          $sql = mysqli_query($conn, "SELECT * FROM patients_info where  patient_address='$value'  ");
          while ($row = mysqli_fetch_array($sql)) {
            echo "<tr>
        <td>" . $row['patient_id'] . "</td>
        <td>" . $row['patient_name'] . "</td>
        <td>" . $row['patient_gender'] . "</td>
        <td>" . $row['patient_age'] . "</td>
        <td>" . $row['patient_phone'] . "</td>
        <td>" . $row['patient_address'] . "</td>
        <td>" . $row['patient_email'] . "</td>
        </tr>";




          }
          "</table>";
        }

        if ($choose == 'gender') {
          $value = $_POST['value'];
          $sql = mysqli_query($conn, "SELECT * FROM patients_info where  patient_gender='$value' ");
          while ($row = mysqli_fetch_array($sql)) {
            echo "<tr>
        <td>" . $row['patient_id'] . "</td>
        <td>" . $row['patient_name'] . "</td>
        <td>" . $row['patient_gender'] . "</td>
        <td>" . $row['patient_age'] . "</td>
        <td>" . $row['patient_phone'] . "</td>
        <td>" . $row['patient_address'] . "</td>
        <td>" . $row['patient_email'] . "</td>
        </tr>";




          }
          "</table>";
        }

        if ($choose == 'age') {
          $value = $_POST['value'];
          $sql = mysqli_query($conn, "SELECT * FROM patients_info where  patient_age='$value'  ");
          while ($row = mysqli_fetch_array($sql)) {
            echo "<tr>
        <td>" . $row['patient_id'] . "</td>
        <td>" . $row['patient_name'] . "</td>
        <td>" . $row['patient_gender'] . "</td>
        <td>" . $row['patient_age'] . "</td>
        <td>" . $row['patient_phone'] . "</td>
        <td>" . $row['patient_address'] . "</td>
        <td>" . $row['patient_email'] . "</td>
        </tr>";




          }
          "</table>";
        }



        if ($choose == 'all') {
          ;
          $sql = mysqli_query($conn, "SELECT * FROM patients_info  ");
          while ($row = mysqli_fetch_array($sql)) {
            echo "<tr>
        <td>" . $row['patient_id'] . "</td>
        <td>" . $row['patient_name'] . "</td>
        <td>" . $row['patient_gender'] . "</td>
        <td>" . $row['patient_age'] . "</td>
        <td>" . $row['patient_phone'] . "</td>
        <td>" . $row['patient_address'] . "</td>
        <td>" . $row['patient_email'] . "</td>
        </tr>";




          }
          "</table>";
        }
      }


      ?>
  </div>
  </div>
  </form>
</body>

</html>