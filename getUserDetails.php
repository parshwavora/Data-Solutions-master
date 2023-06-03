<?php
    include('includes/loginCheck.php');
    include('includes/connection.php');
    if(isset($_POST['mobileNo'])){
        $mobile = $_POST['mobileNo'];
        $sql = "SELECT id,name,email FROM customer WHERE phone = '$mobile'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo $row['id'].",".$row['name'].",".$row['email'];
        } else {
            echo "0";
        }
    }
?>