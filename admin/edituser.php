<?php
require "header.php";
//require "sidebar.php";
if(isset($_GET['id'])){
    $getUser = $user->getAccountById($_GET['id']);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Account</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
            <li class="breadcrumb-item active">Edit Account</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="edituserprocess.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">User name</label>
                  <input type="hidden" name="id" value="<?php echo $getUser[0]['id'] ?>">
                  <input value="<?php echo $getUser[0]['username']?>" type="text" name="username" class="form-control" id="username" required placeholder="Enter Name" require="" ">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input value="<?php echo $getUser[0]['password']?>" type="password" name="password" class="form-control" id="password" required placeholder="Enter Name" require="" ">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">UPDATE</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php }?>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<?php
require "footer.php";
?>