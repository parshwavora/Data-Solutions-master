<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "data_solution";

    // Create connection
    $con = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $name = "Nimit";
    $email = "nimitkansagra@outlook.com";
    $pswd = password_hash("Nimit@123",PASSWORD_DEFAULT);
    $sql = "INSERT INTO admin (name,email,password)VALUES ('$name','$email','$pswd')";
    if (mysqli_query($con, $sql)) {
        echo "added";
    } else {
        echo "Error: ". mysqli_error($con);
        
    }