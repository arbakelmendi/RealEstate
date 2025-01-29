<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link rel="stylesheet" href="styles/elmedina.css">
</head>
<body>
    <header>

            
        <div class="container">
            <ul>
                <li>
                    <a href="main.php" class="logo">
                        <div class="images">
                        <img src="./img/logo.png" class="logo-forLight" alt="Publius">
                        </div>
                        <h2>ProRealEstate.</h2>
                    </a>
                </li>
                <li>
                    <a href="main.php" class="nav-link">Home</a>
                </li>
                <li>
                    <a href="#" class="nav-link">Join</a>
                </li>
                <li>
                    <span class="nav-link theme-toggle">
                        <i class="fa-solid fa-sun"></i>
                    </span>
                </li>
            </ul>
        </div>
    </header>
    <main>
        <section class="contact">
            <div class="container">
                <div class="left">
                    <div class="form-wrapper">
                        <div class="contact-heading">
                            <h1>Find your home.</h1>
                            <p class="text">Or reach us via : <a href="gmail">ProRealEstate@gmail.com</a></p>
                        </div>

                        <form method="POST" action="contactUs.php" class="contact-form">
                            <div class="input-wrap">
                                <input class="contact-input" autocomplete="off" name="FirstName"
                                 type="text" required>
                                 <label>First Name</label>
                                 <i class="icon fa-solid fa-address-card"></i>
                            </div>

                            <div class="input-wrap">
                                <input class="contact-input" autocomplete="off" name="LastName"
                                 type="text" required>
                                 <label>Last Name</label>
                                 <i class="icon fa-solid fa-address-card"></i>
                            </div>

                            <div class="input-wrap w-100">
                                <input class="contact-input" autocomplete="off" name="Email"
                                 type="email" required>
                                 <label>Email</label>
                                 <i class="icon fa-solid fa-envelope"></i>
                            </div>
                            <div class="input-wrap textarea w-100">
                               <textarea name="Message" autocomplete="off" 
                               class="contact-input" required></textarea>
                                 <label>Message</label>
                                 <i class="icon fa-solid fa-inbox"></i>
                            </div>
                            <div class="contact-buttons">
                                <button class="btn upload">
                                    <span>
                                        <i class="fa-solid fa-paperclip"></i>Add attachment
                                    </span>
                                    <input type="file" name="attachment">
                                </button>
                                <input type="submit" value="Send message" class="btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>
<?php

    $servername="localhost";
    $username="root";
    $pasword="";
    $db="web";

    $conn="";

    try{
        $conn=mysqli_connect(
            $servername,
            $username,
            $pasword,
            $db);
    }catch(mysqli_sql_exception){
        echo"Lidhja me databazen deshtoi";
    }


    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $firstName=$_POST["FirstName"];
        $lastName=$_POST["LastName"];
        $email=$_POST["email"];
        //$attachment=$_FILES["attachment"];

        $checkQuery = "SELECT * FROM contacts WHERE first_name = '$firstName' AND last_name = '$lastName' AND email = '$email'";
        $result = mysqli_query($conn, $checkQuery);
        
        if (mysqli_num_rows($result) > 0) {
            echo "Këto të dhëna tashmë ekzistojnë në databazë!";
        } else {
             $sql = "INSERT INTO contacts (first_name, last_name, email) VALUES ('$firstName', '$lastName', '$email');";
        }
        if(mysqli_query($conn, $sql)){
            echo"Te gjitha te dhenat u ruan me sukses";
        }
        else{
            echo"Gabim ne ruajtjen e te dhenave";
        }
    }

    mysqli_close($conn);

?>