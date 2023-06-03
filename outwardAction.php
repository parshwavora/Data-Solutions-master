<?php
    include('includes/loginCheck.php');
    include('includes/connection.php');
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $id = $_POST['id'];
        $status = $_POST['status'];
        $type = $_POST['type'];

        $returned = 0;
        if(isset($_POST['returned'])){
            $returned = 1;
        }

        $sql = "UPDATE ".$type." SET outward = CURRENT_TIMESTAMP(), returned = '$returned', status = '$status' WHERE id = '$id'";
        //echo $sql;
        if (mysqli_query($con,$sql)) {
            echo "<script>alert('Updated !');</script>";
        ?>
            <script>window.location="<?php echo $type.".php";?>"</script>;
        <?php
        }
        else {
            echo "<script>alert('Error while updating !');</script>";
        ?>
            <script>window.location="<?php echo $type.".php";?>"</script>;
        <?php
        }
    }
?>
