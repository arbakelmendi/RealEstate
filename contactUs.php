<!DOCTYPE html>
<html lang="en">
<head>
<?php
    $servername="localhost";
    $username="root";
    $pasword="";
    $db="web";

    $conn=mysqli_connect($servername,$username, $pasword,$db);

   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $firstName = $_POST['FirstName'];
        $lastName = $_POST['LastName'];
        $email = $_POST['Email'];
        $message = $_POST['Message'];
    
        
        $attachmentPath = null;
    
        
        if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/'; 
            $uploadFile = $uploadDir . basename($_FILES['attachment']['name']);
    
            
            if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadFile)) {
                $attachmentPath = $uploadFile; 
            } else {
                echo "Dështoi ngarkimi i skedarit.";
                exit;
            }
        }
        if(!$conn){
            die("Lidhja me databazen ka deshtuar ". mysqli_error_connect());
        }

        $stmt=$conn->prepare(
            "INSERT INTO contacts (name,surname,username,message,attachment)
            VALUES (?,?,?,?,?)"
        );

        $stmt->bind_param("sssss",$firstName, $lastName, $email, $message, $attachmentPath);

        if ($stmt->execute()){
            echo "Mesazhi juaj u dergua me sukses";
        }
        else{
            echo "Gabim gjate ruajtjes se te dhenave ".$stmt->error;
        }


    }
        

?>






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

                        <form method="POST" action="/contactUs.php"class="contact-form">
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
