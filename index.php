<?php
    $servername="localhost";
    $username="root";
    $pasword="";
    $db="web";

    $conn=mysqli_connect($servername,$username, $pasword,$db);

    if(!$conn){
        die("Error: ". mysqli_error_connect());
    }
    else{
       // echo"Database is Connected.";
    }

?>