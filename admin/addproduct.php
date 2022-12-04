<?php
require "header.php";
require "sidebar.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Validation</li>
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
              <form action="addproductprocess.php" id="quickForm" method="get" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Enter Price">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="Enter Description">
                  </div>
                  <div class="form-group">
                    <label for="sold">Sold</label>
                    <input type="number" name="sold" class="form-control" id="description" placeholder="Enter Sold">
                  </div>
                  <div class="form-group">
                    <label for="sold">In Stock</label>
                    <input type="number" name="instock" class="form-control" id="description" placeholder="Enter In Stock">
                  </div>
                  
                    <label for="manufacture">Manufacture</label>
                    <select name="manufacture" form="quickform" require>
                      <?php
                      $allManu= $manufactures->getAllMaunufactures();
                      foreach($allManu as $value){
                        ?>
                        <option value="<?php echo $value['manu_id']?>"><?php echo $value['manu_name']?></option>
                        <?php
                      }
                      ?>
                    </select>
                  
                  <div class="form-group">
                    <label for="protype">Protype</label>
                    <select name="protype" form="quickform" require>
                      <?php
                      $allType= $protypes->getAllProtype();
                      foreach($allType as $value){
                        ?>
                        <option value="<?php echo $value['type_id']?>"><?php echo $value['type_name']?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="feature" class="custom-control-input" id="feature">
                      <label class="custom-control-label" for="feature">Feature</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="onsale" class="custom-control-input" id="onsale">
                      <label class="custom-control-label" for="onsale">On Sale</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ADD</button>
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
