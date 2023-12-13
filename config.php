<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "project";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script> alert('Connection falied.')</script>");
} else {
    session_start();
}

?>
<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
if (isset($_POST['login'])) {
    $username = $_POST['email'];
    $password = $_POST['psw'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM patients_info WHERE patient_email='$username' AND 
patient_password='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    $asql = "SELECT * FROM admin WHERE admin_email='$username' AND 
admin_password='$password'";
    $aresult = mysqli_query($conn, $asql);
    $arow = mysqli_fetch_array($aresult, MYSQLI_ASSOC);
    $acount = mysqli_num_rows($aresult);

    $dsql = "SELECT * FROM doctors_info WHERE doctor_email='$username' AND 
doctor_password='$password'";
    $dresult = mysqli_query($conn, $dsql);
    $drow = mysqli_fetch_array($dresult, MYSQLI_ASSOC);
    $dcount = mysqli_num_rows($dresult);
    if ($count == 1) {



        $_SESSION['login_user'] = $username;

        echo "<script> alert('Login Successful')</script>";
        header("Location: user/department.php");
    } else if ($acount == 1) {
        $_SESSION['login_user'] = $username;

        echo "<script> alert('Login Successful')</script>";
        header("Location: admin/main.php");
    } else if ($dcount == 1) {
        $_SESSION['login_user'] = $username;

        echo "<script> alert('Login Successful')</script>";
        header("Location: doctor/doc_app.php");
    } else {
        echo "<script> alert('Email or password is invalid')</script>";
    }
}
?>
<?php



$getid = mysqli_query($conn, "SELECT * from patients_info WHERE patient_email='" . $_SESSION['login_user'] . "'");
$ide = mysqli_fetch_array($getid);
$id = $ide["patient_id"];
$_SESSION['user_id'] = $id;
?>

<?php

$getide = mysqli_query($conn, "SELECT * FROM doctors_info WHERE doctor_email= '" . $_SESSION['login_user'] . "'");
$ids = mysqli_fetch_array($getide);
$idc = $ids["doctor_id"];
$_SESSION['doctor_id'] = $idc;
?>




<?php

$fetch = mysqli_query($conn, "SELECT * FROM patients_info where patient_email= '" . $_SESSION['login_user'] . "'");
$data = mysqli_fetch_assoc($fetch);
$pid = $data["patient_id"];
$pname = $data["patient_name"];
$_SESSION['pname'] = $pname;
$page = $data["patient_age"];
$_SESSION['page'] = $page;
$pphone = $data["patient_phone"];
$_SESSION['pphone'] = $pphone;
$pgender = $data["patient_gender"];
$_SESSION['pgender'] = $pgender;
$paddress = $data["patient_address"];
$_SESSION['paddress'] = $paddress;
$pdob = $data["patient_dob"];
$_SESSION['pdob'] = $pdob;
$today_date = date('Y/m/d');

?>