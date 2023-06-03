<?php
include('includes/loginCheck.php');
include('includes/connection.php');
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $customerId = $_GET['customerId'];
    $type = $_GET['type'];
    $deatils_row = array();
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
                            <h1>Outward Entry</h1>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Otward From</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM ".$type." WHERE id='$id'";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $deatils_row = $row;
                                ?>
                                <form role="form" action="outwardAction.php" method="POST">
                                    <div class="row">
                                        <div class="form-group col-12 col-sm-12 col-md-2">
                                            <label for="returned">Returned</label>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="returned" value="1">
                                                <label class="form-check-label" for="returned">Yes</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-sm-12 col-md-10">
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
                                    <input type="hidden" name="type" value="<?php echo $type; ?>">
                                    <button type="submit" class="btn btn-primary btn-block" name="submit">Update</button>
                                </form>
                                <?php
                            }
                            else {
                                echo "No data found !";
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
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl>
                                <?php
                                $sql1 = "SELECT * FROM customer WHERE id='$customerId'";
                                $result1 = mysqli_query($con, $sql1);
                                if (mysqli_num_rows($result1) > 0) {
                                    $row1 = mysqli_fetch_assoc($result1);
                                    ?>
                                    <dt>Name</dt>
                                    <dd><?php echo $row1['name']; ?></dd>
                                    <dt>Email</dt>
                                    <dd><?php echo $row1['email']; ?></dd>
                                    <dt>Phone no</dt>
                                    <dd><?php echo $row1['phone']; ?></dd>
                                    <?php
                                }
                                else {
                                    echo "No data found !";
                                }
                                ?>
                            </dl>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-12 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo $type; ?> details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            if($type=="harddisk"){
                                echo "<dl>
                                <dt>Serial No.</dt>
                                <dd>{$deatils_row['serial_no']}</dd>
                                <dt>Company</dt>
                                <dd>{$deatils_row['company']}</dd>
                                <dt>Storage</dt>
                                <dd>{$deatils_row['storage_capacity']} {$deatils_row['storage_unit']}</dd>
                                </dl>";
                            }
                            elseif ($type=="dvr"||$type=="pendrive"||$type=="memorycard") {
                                echo "<dl>
                                <dt>Company</dt>
                                <dd>{$deatils_row['company']}</dd>
                                <dt>Storage</dt>
                                <dd>{$deatils_row['storage_capacity']} {$deatils_row['storage_unit']}</dd>
                                </dl>";
                            }
                            elseif ($type=="laptop") {
                                echo "<dl>
                                <dt>Company</dt>
                                <dd>{$deatils_row['company']}</dd>
                                <dt>Model No.</dt>
                                <dd>{$deatils_row['serial_no']}</dd>
                                </dl>";
                            }
                            elseif ($type=="motherboard") {
                                echo "<dl>
                                <dt>Company</dt>
                                <dd>{$deatils_row['company']}</dd>
                                <dt>Model No.</dt>
                                <dd>{$deatils_row['name']}</dd>
                                </dl>";
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
    <!-- Main Footer -->
    <?php include 'includes/footer.php'; ?>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
</body>
</html>
