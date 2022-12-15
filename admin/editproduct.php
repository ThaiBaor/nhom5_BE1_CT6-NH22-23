<?php
require "header.php";
require "sidebar.php";
if (isset($_GET['id'])) {
    $getProduct = $products->getProductById($_GET['id']);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
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
                        <form action="editproductprocess.php" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $getProduct[0]['id']?>">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input value="<?php echo $getProduct[0]['name'] ?>" type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Price</label>
                                    <input value="<?php echo $getProduct[0]['price'] ?>" type="number" name="price" class="form-control" id="price" placeholder="Enter Price">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    <img style="width:300px" src="./img/<?php echo $getProduct[0]['image'] ?>" alt="hinh">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <input value="<?php echo $getProduct[0]['description'] ?>" type="text" name="description" class="form-control" id="description" placeholder="Enter Description">
                                </div>
                                <div class="form-group">
                                    <label for="sold">Sold</label>
                                    <input value="<?php echo $getProduct[0]['sold'] ?>" type="number" name="sold" class="form-control" id="sold" placeholder="Enter Sold">
                                </div>
                                <div class="form-group">
                                    <label for="sold">In Stock</label>
                                    <input value="<?php echo $getProduct[0]['instock'] ?>" type="number" name="instock" class="form-control" id="description" placeholder="Enter In Stock">
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Manufacture</label>
                                    <select name="manu_id" id="inputStatus" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <?php $getManu = $manufactures->getAllMaunufactures();
                                        foreach ($getManu as $value) {
                                            if ($getProduct[0]['manu_id'] == $value['manu_id']) { ?>
                                                <option selected value="<?php echo $value['manu_id'] ?>"><?php echo $value['manu_name'] ?></option>

                                            <?php } else { ?>
                                                <option value="<?php echo $value['manu_id'] ?>"><?php echo $value['manu_name'] ?></option>
                                        <?php
                                            }
                                        } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Protype</label>
                                    <select name="type_id" id="inputStatus" class="form-control custom-select">
                                        <option selected disabled>Select one</option>
                                        <?php $gettype = $protypes->getAllProtype();
                                        foreach ($gettype as $value) {
                                            if ($getProduct[0]['type_id'] == $value['type_id']) { ?>?>
                                        <option selected value="<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></option>
                                    <?php } else { ?>
                                        <option selected value="<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></option>
                                <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <?php if ($getProduct[0]['feature'] == 1) { ?>
                                            <input checked type="checkbox" name="feature" class="custom-control-input" id="feature">
                                            <label class="custom-control-label" for="feature">Feature</label>
                                        <?php } else { ?>
                                            <input checked type="checkbox" name="feature" class="custom-control-input" id="feature">
                                            <label class="custom-control-label" for="feature">Feature</label>
                                        <?php } ?>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <?php if ($getProduct[0]['sale'] == 1) { ?>
                                            <input checked type="checkbox" name="onsale" class="custom-control-input" id="onsale">
                                            <label class="custom-control-label" for="onsale">On Sale</label>
                                        <?php } else { ?>
                                            <input  type="checkbox" name="onsale" class="custom-control-input" id="onsale">
                                            <label class="custom-control-label" for="onsale">On Sale</label>
                                        <?php } ?>
                                    </div>
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