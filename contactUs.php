<?php



session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}


require 'ContactForm.php';


$servername = "localhost";
$username = "root";
$password = "";
$db = "RealEstate";

$contactForm = new ContactForm($servername, $username, $password, $db);
$message = "";
$showMessage = false; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["FirstName"];
    $surname = $_POST["LastName"];
    $email = $_POST["Email"];
    $messageContent = $_POST["Message"];

    $message = $contactForm->submitForm($name, $surname, $email, $messageContent);
    $showMessage = true; 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link rel="stylesheet" href="styles/elmedina.css">
    <style>
        .hidden {
            display: none;
        }

        .message-box {
            margin-top: 15px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            text-align: center;
            font-size: 14px;
        }
    </style>
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
                                <div id="confirmationMessage" class="hidden">
                                    Ju na keni kontaktuar me sukses, njëri nga agjentët tanë do t'ju njoftojë për gjithçka.
                                </div>
                            </div>

                            <?php if ($showMessage): ?>
                                    <div class="message-box"><?php echo $message; ?></div>
                                <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js"></script>
    <script src="js/app.js"></script>
    <script>
        document.getElementById("sendMessage").addEventListener("click", function() {
            let messageBox = document.getElementById("confirmationMessage");
            messageBox.classList.remove("hidden");
            messageBox.classList.add("message-box");
        });
    </script>
</body>

</html>