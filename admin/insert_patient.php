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
        <h3> Add Patient to the database</h3>

        <form method="POST">
            <label>Patient Name:</label>
            <input type="text" name="patient_name"><br />
            <label>Patient phone:</label>
            <input type="tel" name="patient_phone" pattern="[0-9]{10}"><br />
            <label>Patient Address :</label>
            <input type="text" name="patient_address"><br />
            <label>Date of Birth :</label>
            <select name="month">
                <option value="#">Month</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>

            </select>

            <select name="date">
                <option value="#">Date</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
            <select name="year">
                <option value="#">Year</option>
                <?php for ($i = date('Y'); $i >= 1970; $i--): ?>
                    <option value="<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </option>
                <?php endfor; ?>
            </select><br />

            <label>
                Gender: </label>
            <input type="radio" id="gender" name="gender" value="male" />Male
            <input type="radio" id="gender" name="gender" value="female" /> Female
            <input type="radio" id="gender" name="gender" value="Other" />Other
            <br />

            <label> Patient email:</label>
            <input type="email" name="patient_email"><br />
            <label>Patient password:</label>
            <input type="password" name="patient_password"><br />


            <button name="submit">INSERT</button>
    </div>
    </div>
    </form>
</body>

</html>
<?php
include('../config.php');
if (isset($_POST['submit'])) {
    $patient_name = $_POST['patient_name'];
    $patient_address = $_POST['patient_address'];
    $patient_phone = $_POST['patient_phone'];
    $patient_email = $_POST['patient_email'];
    $patient_password = $_POST['patient_password'];
    $gender = $_POST['gender'];
    $y = $_POST['year'];
    $d = $_POST['date'];
    $m = $_POST['month'];
    $age = date("Y") - $y;
    $dob = date("Y-m-d", strtotime($y . '-' . $m . '-' . $d));
    $dup = mysqli_query($conn, "SELECT * FROM patients_info WHERE patient_email='$patient_email' ");
    if (mysqli_num_rows($dup) > 0) {
        echo "<script>alert('Oops! Email already exist.')</script>";

    } else {

        $insert = "INSERT INTO patients_info(patient_name, patient_phone, patient_dob, patient_address, patient_age, patient_gender, patient_email, 
        patient_password) VALUES ('$patient_name','$patient_phone', '$dob' ,'$patient_address','$age',
        '$gender','$patient_email','$patient_password')";
        if (mysqli_query($conn, $insert)) {

            $res = "SELECT patient_id FROM patients_info WHERE patient_email='$patient_email'";
            $r = mysqli_query($conn, $res);
            while ($row = mysqli_fetch_array($r)) {
                $patient_id = $row['patient_id'];
            }
            echo "<script> alert('Account successfully created.')</script>";
            echo "<script> alert('Your ID is $patient_id')</script>";
        }
    }
}
?>