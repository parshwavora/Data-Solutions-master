<?php
include('includes/loginCheck.php');
include('includes/connection.php');
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $customerId = $_GET['customerId'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Solutions | Inventory</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!--Menu-->
        <?php include('includes/menu.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Service Detailed Information</h1>
                        </div>
                        <div class="col-sm-6">
                            <!--<ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>-->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Customer Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="">
                                <div class="row">
                                    <?php
                                    $sql = "SELECT name,email,phone FROM customer WHERE id='$customerId'";
                                    $result = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        ?>
                                        <div class="form-group col-12 col-sm-12 col-md-4">
                                            <label for="userName">Customer Name</label>
                                            <input type="text" class="form-control" value="<?php echo $row['name']; ?>" disabled>
                                        </div>
                                        <div class="form-group col-12 col-sm-12 col-md-4">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" value="<?php echo $row['email']; ?>" disabled>
                                        </div>
                                        <div class="form-group col-12 col-sm-12 col-md-4">
                                            <label for="mobileNo">Mobile No</label>
                                            <input type="text" class="form-control" value="<?php echo $row['phone']; ?>" disabled>
                                        </div>
                                        <?php
                                    }
                                    else {
                                        echo "Invalid Customer Id - No data found !";
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Laptop Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM laptop WHERE id='$id'";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <div class="row">
                                    <div class="form-group col-12 col-sm-12 col-md-6">
                                        <label for="company">Company</label>
                                        <input type="text" class="form-control" value="<?php echo $row['company']; ?>" disabled>
                                    </div>
                                    <div class="form-group col-12 col-sm-12 col-md-6">
                                        <label for="motherboardName">Model No</label>
                                        <input type="text" class="form-control" value="<?php echo $row['model_no']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="givenWith">Given With</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" <?php echo ($row['with_adapter']==1 ? 'checked' : ''); ?> disabled>
                                        <label class="form-check-label" for="withAdapter"> Adapter</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" <?php echo ($row['with_battery']==1 ? 'checked' : ''); ?> disabled>
                                        <label class="form-check-label" for="withAdapter"> Battery</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" <?php echo ($row['with_harddisk']==1 ? 'checked' : ''); ?> disabled>
                                        <label class="form-check-label" for="withAdapter"> Hard Disk</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Problem</label>
                                    <textarea class="form-control" rows="3" disabled><?php echo $row['problem']; ?></textarea>
                                </div>
                                <form action="updateLaptopStatus.php" method="POST">
                                    <div class="row">
                                        <div class="form-group col-12 col-sm-12 col-md-4">
                                            <label for="company">Esimate</label>
                                            <input type="text" class="form-control" name="estimate" value="<?php echo $row['estimate'] ?>">
                                        </div>
                                        <div class="form-group col-12 col-sm-12 col-md-8">
                                            <label>Status</label>
                                            <select class="form-control" name="status" value="<?php echo $row['status']?>" required>
                                                <?php
                                                $sqlStatus = "SELECT title FROM status";
                                                $result = mysqli_query($con,$sqlStatus);
                                                if(mysqli_num_rows($result)>0){
                                                    while ($row2 = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                        <option value="<?php echo $row2['title']; ?>" <?php if ($row2['title']==$row['status']) echo "selected"; else echo ""; ?> ><?php echo $row2['title']; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="customerId" value="<?php echo $customerId; ?>">
                                    <button type="submit" class="btn btn-primary btn-block" name="submit" <?php if ($row['status']=="Rejected"||$row['status']=="Closed"){ echo "disabled";} ?>>Update</button>
                                </form>
                                <?php
                            }
                            else {
                                echo "Invalid Laptop Id - No data found !";
                            }
                            ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include 'includes/footer.php'; ?>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->

</body>
</html>
