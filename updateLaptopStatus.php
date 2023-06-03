<?php
    include('includes/loginCheck.php');
    include('includes/connection.php');
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $id = $_POST['id'];
        $estimate = $_POST['estimate'];
        $status = $_POST['status'];
        $customerId = $_POST['customerId'];

        $sql = "UPDATE laptop SET estimate = '$estimate', status = '$status' WHERE id = '$id'";
        //echo $sql;
        if (mysqli_query($con,$sql)) {
            echo "<script>alert('Updated !');</script>";
        ?>
            <script>window.location="viewLaptopDetails.php?customerId=<?php echo $customerId;?>&id=<?php echo $id;?>"</script>;
        <?php
        }
        else {
            echo "<script>alert('Error while updating !');</script>";
        ?>
            <script>window.location="viewLaptopDetails.php?customerId=<?php echo $customerId;?>&id=<?php echo $id;?>"</script>;
        <?php
        }
    }
?>
