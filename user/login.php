<!DOCTYPE html>
<html>

<head>
    <meta name="viewpoint" content="width-device-width, initial-scale=1.0">
    <title>Online Health Appointment System</title>
    <link rel="stylesheet" href="../style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>

    <?php
    include 'header.html';
    ?>
    <form name="login" method="POST" action="../config.php">
        <div class="Loginformcontainer">
            <h1>A & S HOSPITAL</h1><br>

            <div class="email">
                <i class="fa fa-user icon"></i>
                <input type="email" name="email" placeholder=" &nbsp Username" required>

            </div>
            <div class="password">
                <i class="fa fa-lock icon"></i>
                <input type="password" name="psw" placeholder=" &nbsp Password" required>

            </div>
            <button class="LoginButton" name="login">LOGIN</button>
            <p class="Signup">Don't have an account?<a href="signup.php">Sign Up</a></p>

        </div>
    </form>
    </section>


</body>

</html>