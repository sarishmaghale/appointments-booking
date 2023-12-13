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
        <h3> Delete Doctor from the database</h3>

        <form method="POST">
            <label>Doctor Name:</label>
            <input type="text" name="doctor_name"><br />
            <label>Doctor Specialization:</label>
            <select name="doctor_specialization">
                <option value="#">Department</option>
                <option value="#">general medicine</option>
                <option value="#">cardiology</option>
                <option value="#">dermatology</option>
                <option value="#">dental</option>
                <option value="#">ent</option>
                <option value="#">gyanecology</option>
                <option value="#">neurology</option>
            </select><br />
            <label> Doctor id:</label>
            <input type="text" name="doctor_id" required><br />


            <button name="delete">DELETE</button>
    </div>
    </div>
    </form>
</body>

</html>
<?php
include('../config.php');
if (isset($_POST['delete'])) {


    $doctor_name = $_POST['doctor_name'];
    $doctor_specialization = $_POST['doctor_specialization'];
    $doctor_id = $_POST['doctor_id'];

    $dup = mysqli_query($conn, "SELECT * FROM doctors_info WHERE doctor_id='$doctor_id' ");
    if (mysqli_num_rows($dup) == 0) {
        echo "<script>alert('Oops!Given ID doesnot exist!')</script>";

    } else {

        $delete = mysqli_query($conn, "DELETE FROM doctors_info where doctor_id='$doctor_id' ");
        if ($delete) {
            echo " <script> alert('Successfully deleted!')</script>";

        }
    }
}
?>