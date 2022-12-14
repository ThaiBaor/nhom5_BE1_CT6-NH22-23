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
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
          
            <a href="adduser.php">
            <button type="button" class="btn btn-success">
              Add
            </button>
            </a>
            
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
                      <th style="width: 5%">
                          ID
                      </th>
                      <th style="width: 25%">
                         User Name
                      </th>
                      <th style="width: 50%">
                         Password
                      </th>
                      <th style="width: 20%" class="text-right">
                        Action
                      </th>
                  </tr>
              </thead>
              <tbody>
              <?php                
                $allAccount = $user->getAllAccount();
                foreach($allAccount as $value){
                  $countConflict=$user->countConflictProduct($value['username']);
                ?>
                  <tr>
                      <td>
                      <?php echo $value['id']?>
                      </td>
                      <td>
                      <?php echo $value['username']?>
                      </td>
                      <td>
                      <?php echo $value['password']?>
                      </td>
                      <?php
                      if ($value['username']!='Admin'){?>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="edituser.php?id=<?php echo $value['id']?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" onclick="return isDeleted(<?php echo $countConflict ?>)" href="deleteuser.php?id=<?php echo $value['id']?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                      <?php }?>                   
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
