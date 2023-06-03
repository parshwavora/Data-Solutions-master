<?php
  include('includes/loginCheck.php');
  include('includes/connection.php');
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
  <style media="screen">
      .badge{
          font-size: 90%;
      }
      th{
          font-size: 90%;
      }
      td{
          font-size: 90%;
      }
  </style>
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
            <h1>DVR</h1>
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
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Company</th>
                    <th>Storage</th>
                    <th>Priority</th>
                    <th>Problem</th>
                    <th>Status</th>
                    <th>Inward</th>
                    <th>Outward</th>
                    <th>Returned</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT customer.name 'customer_name',dvr.* FROM customer RIGHT JOIN dvr ON customer.id = dvr.customer_id";
                  $result = mysqli_query($con,$sql);
                  if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                  <td>
                      <a href="viewStorageDeviceDetails.php?customerId=<?php echo $row['customer_id']; ?>&id=<?php echo $row['id']; ?>&type=dvr">
                        <?php echo $row['id']; ?>
                      </a>
                  </td>
                  <td>
                    <a href="viewStorageDeviceDetails.php?customerId=<?php echo $row['customer_id']; ?>&id=<?php echo $row['id']; ?>&type=dvr">
                      <?php echo $row['customer_name']; ?>
                    </a>
                  </td>
                  <td><?php echo $row['company']; ?></td>
                  <td><?php echo $row['storage_capacity']." ".$row['storage_unit']; ?></td>
                  <td><?php echo $row['priority']; ?></td>
                  <td><?php echo $row['problem']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td><?php echo $row['inward']; ?></td>
                  <td><?php echo $row['outward']; ?></td>
                  <td>
                      <span class="badge">
                      <?php
                          if($row['returned']==1) {
                              echo '<span class="badge bg-danger">Yes</span>';
                          }
                          else{
                              echo '<span class="badge bg-success">No</span>';
                          }
                      ?>
                  </td>
                  <td>
                      <?php if (empty($row['outward'])){ ?>
                      <a href="outward.php?customerId=<?php echo $row['customer_id'];?>&id=<?php echo $row['id'];?>&type=dvr">
                          <i class="fas fa-minus-circle text-danger"></i>
                      </a>
                      <?php } ?>
                  </td>
                </tr>
                <?php
                    }
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Company</th>
                    <th>Storage</th>
                    <th>Priority</th>
                    <th>Problem</th>
                    <th>Status</th>
                    <th>Inward</th>
                    <th>Outward</th>
                    <th>Returned</th>
                    <th></th>
                </tr>
                </tfoot>
              </table>
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
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
