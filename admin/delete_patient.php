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
        <h3> Delete patient from the database</h3>

        <form method="POST">
            <label>Patient Name:</label>
            <input type="text" name="patient_name"><br />
            <label> Patient email:</label>
            <input type="text" name="patient_email"><br />
            <label> Patient id:</label>
            <input type="text" name="patient_id"><br />


            <button name="delete">DELETE</button>
    </div>
    </div>
    </form>
</body>

</html>
<?php
include('../config.php');
if (isset($_POST['delete'])) {


    $patient_name = $_POST['patient_name'];
    $patient_email = $_POST['patient_email'];
    $patient_id = $_POST['patient_id'];

    $dup = mysqli_query($conn, "SELECT * FROM patients_info WHERE patient_id='$patient_id' OR patient_email='$patient_email' ");
    if (mysqli_num_rows($dup) == 0) {
        echo "<script>alert('Oops!Given ID doesnot exist!')</script>";

    } else {

        $delete = mysqli_query($conn, "DELETE FROM patients_info where patient_id='$patient_id' OR patient_email='$patient_email'");
        if ($delete) {
            echo " <script> alert('Successfully deleted!')</script>";

        }
    }
}
?>