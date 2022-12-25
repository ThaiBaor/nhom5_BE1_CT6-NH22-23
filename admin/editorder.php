<?php
require "header.php";
require "sidebar.php";
if (isset($_GET['id'])) {
    $getOrder = $order->getOrderById($_GET['id']);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Order</li>
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
                        <form action="editorderprocess.php" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $getOrder[0]['id']?>">
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input value="<?php echo $getOrder[0]['firstname'] ?>" type="text" name="firstname" class="form-control" id="name" placeholder="Enter first name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Last Name</label>
                                    <input value="<?php echo $getOrder[0]['lastname'] ?>" type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter last name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    
                                    <input value="<?php echo $getOrder[0]['email'] ?>" type="number" name="email" class="form-control" id="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address</label>
                                    <input value="<?php echo $getOrder[0]['address'] ?>" type="text" name="address" class="form-control" id="address" placeholder="Enter address">
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input value="<?php echo $getOrder[0]['city'] ?>" type="text" name="city" class="form-control" id="city" placeholder="Enter city">
                                </div>
                                <div class="form-group">
                                    <label for="Phone">Phone</label>
                                    <input value="<?php echo $getOrder[0]['phone'] ?>" type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone">
                                </div>
                                <div class="form-group">
                                    <label for="ordernote">Order note</label>
                                    <input value="<?php echo $getOrder[0]['ordernote'] ?>" type="text" name="ordernote" class="form-control" id="phone" placeholder="Enter Phone">
                                </div>
                                <div class="form-group">
                                    <label for="product">Product</label>
                                    <textarea name="product" id="product"><?php echo $getOrder[0]['product'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="total">Total</label>
                                    <input value="<?php echo $getOrder[0]['total'] ?>" type="text" name="total" class="form-control" id="total" placeholder="Enter Phone">
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