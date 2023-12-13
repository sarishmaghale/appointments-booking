<!DOCTYPE html>
<html>

<head>
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <style>
        textarea {
            font-size: 15px;
            height: 20mm;
            width: 100mm;
        }
    </style>

</head>

<body>

    <form method="POST">
        <nav>
            <div class="nav-links">
                <ul>

                    <li><a href="">Appointments</a></li>
                    <li><a href="">PROFILE</a></li>
                    <li><a href="doctor_login.php">LOG OUT</a></li>
                </ul>
            </div>
        </nav>

        <div class="auto">

            <br><br>
            <div class="card">

                <div class="card-header">
                    <table id='f'>
                        <h1 class="text-white"> Feedback Box</h1>
                </div><br>

                <?php

                include '../config.php';
                $id = $_GET['id'];
                $res = "SELECT * FROM patients_info WHERE patient_id =$id";
                $resq = mysqli_query($conn, $res);
                if ($resq) {
                    while ($row = mysqli_fetch_array($resq)) {
                        $pname = $row['patient_name'];
                        $page = $row['patient_age'];

                    }
                    ?>
                    <h3>Name:
                        <?php echo $pname ?>
                    </h3>
                    <h3>Age:
                        <?php echo $page ?>
                    </h3>
                    <br />
                    <label>
                        <h3> Presciption:</h3>
                    </label><br />
                    <textarea name="feedback" class="form-control"> </textarea> <br>



                    <button class="btn" name='done'> Submit </button><br>
                    </table>
                </div>

            </div>
        </form>
    </body>

    </html>

    <?php
                }
                if (isset($_POST['done'])) {


                    $feedback = $_POST['feedback'];

                    $q = "UPDATE appointments set feedback='$feedback' WHERE patient_id=$id ";
                    if (mysqli_query($conn, $q)) {
                        header('location:doc_app.php');
                    }
                }

                ?>