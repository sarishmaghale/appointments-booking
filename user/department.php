<?php

include('../config.php');


?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewpoint" content="width-device-width, initial-scale=1.0">
    <title> Online Health Appointment System</title>
    <link rel="stylesheet" href="../style2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



</head>

<body>
    <?php
    include 'header2.php';
    ?>





    <div class="sub_header">
        <div class="slider">
            <ul class="slides">
                <li class="slide"><img src="../images/img1.jpg" width="700px" height="250px" alt="" /></li>
                <li class="slide"><img src="../images/img5.jpg" width="700px" height="250px" alt="" /></li>
                <li class="slide"><img src="../images/img6.jpg" width="700px" height="250px" alt="" /></li>
            </ul>
        </div>



    </div>
    <script src="jquery.min.js"></script>
    <script>
        var currentSlide = 1;
        var $slider = $(".slides");
        var slideCount = $slider.children().length;
        var slideTime = 2000;
        var animationTime = 1000;

        setInterval(function () {
            $slider.animate({
                marginLeft: '-=700px'
            }, animationTime, function () {
                currentSlide++;
                if (currentSlide == slideCount) {
                    currentSlide = 1;
                    $(this).css("margin-left", "0px");
                }
            })
        }, slideTime);
    </script>


    <p></p>
    <div class="choose">

        <button type="button" class="button">
            <span class="button_icon">
                <img src="../images/endocrine.png" height="50px">
            </span>
            <span class="button_text"><a href="general_medicine.php">General medicine</a></span>
        </button><br>


        <button type="button" class="button">
            <span class="button_icon">
                <img src="../images/cardiology.png" height="50px">
            </span>
            <span class="button_text"><a href="cardiology.php">Cardiology</a></span>
        </button>

        <button type="button" class="button">
            <span class="button_icon">
                <img src="../images/skin.png" height="50px">
            </span>
            <span class="button_text"><a href="dermatology.php">Dermatology</a></span>

        </button>

        <button type="button" class="button">
            <span class="button_icon">
                <img src="../images/dental.png" height="50px">
            </span>
            <span class="button_text"><a href="dental.php">Dental</a></span>
        </button>

        <button type="button" class="button">
            <span class="button_icon">
                <img src="../images/ent.png" height="50px">
            </span>
            <span class="button_text"><a href="ent.php">ENT</a></span>
        </button>

        <button type="button" class="button">
            <span class="button_icon">
                <img src="../images/gyane.png" height="50px">
            </span>
            <span class="button_text"><a href="gynaecology.php">Gynaecology</a></span>
        </button>

        <button type="button" class="button">
            <span class="button_icon">
                <img src="../images/neurology.png" height="50px">
            </span>
            <span class="button_text"><a href="neurology.php">Neurology</a></span>
        </button>

    </div>
    </div>
</body>

</html>