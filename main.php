<?php
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>ProRealEstate</title>
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="img/logo.png" class="logo">
            <ul>
                <li><a href="main.php">Home</a></li>
                <li><a href="agents.php">Agents</a></li>
                <li><a href="contactUs.php">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="slideshow-wrapper">
                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="img/theHouse.jpg" style="width:100%">
                        
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="img/img2.jpg" style="width:100%">
                       
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="img/img3.jpeg" style="width:100%">
                      
                    </div>

                    
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>

               
                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>

        </div>




    <script>

        let slideIndex = 0;
        showSlides();


        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000);
        }

    </script>




</body>

</html>