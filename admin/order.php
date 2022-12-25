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
                    <h1>Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                        <li class="breadcrumb-item active">Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>

                        <tr>
                            <th style="width: 1%">
                                ID
                            </th>
                            <th style="width: 9%">
                                First Name
                            </th>
                            <th style="width: 5%">
                                Last Name
                            </th>
                            <th style="width: 5%">
                                Email
                            </th>
                            <th style="width: 10%" class="text-center">
                                Address
                            </th>
                            <th style="width: 10%">
                                City
                            </th>
                            <th style="width: 5%">
                                Username
                            </th>
                            <th style="width: 5%" class="text-center">
                                Phone
                            </th>
                            <th style="width: 5%" class="text-center">
                                Oder notes
                            </th>
                            <th style="width: 20%" class="text-right">
                                Product
                            </th>
                            <th style="width: 10%" class="text-right">
                                Total
                            </th>
                            <th style="width: 20%" class="text-right">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $allOrder = $order->getAllOrder();
                        foreach ($allOrder as $value) {
                            
                        ?>
                            <tr>
                                <td>
                                    <?php echo $value['id'] ?>
                                </td>
                                <td>
                                    <?php echo $value['firstname'] ?>
                                </td>
                                <td>
                                    <?php echo $value['lastname'] ?>
                                </td>
                                <td>
                                    <?php echo $value['email'] ?>
                                </td>
                                <td>
                                <?php echo $value['address'] ?>
                                </td>
                                <td>
                                <?php echo $value['city'] ?>
                                </td>
                                <td>
                                <?php echo $value['username'] ?>
                                </td>
                                <td class="text-center">
                                <?php echo $value['phone'] ?>
                                </td>
                                <td class="text-center">
                                <?php echo $value['ordernote'] ?>
                                </td>
                                <td>
                                <?php echo $value['product'] ?>
                                </td>
                                <td>
                                <?php echo $value['total'] ?>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="editorder.php?id=<?php echo $value['id'] ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" onclick="return isDeleted(0)" href="deleteorder.php?id=<?php echo $value['id'] ?>">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- ./wrapper -->
<?php
require "footer.php";
?>