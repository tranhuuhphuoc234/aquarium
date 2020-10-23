<?php
    include_once('..\admin\header.php');
    include_once('..\util\DBConnection.php');
    $string_column_name = $_REQUEST['column_name'];
    $column_name = explode(',', $string_column_name);
    $string_column_name_data  = $_REQUEST['column_name_data'];
    $column_name_data = explode(',', $string_column_name_data);
    $stmt = $_REQUEST['stmt'];
    $table = $_REQUEST['table'];

    
 ?>
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                 <!-- Content Wrapper. Contains page content -->
  <?php
    if ($table == 'fish')
    {
      echo "  <div class=\"content-wrapper\" style=\"width: fit-content;\">";
    }
    else{
      echo "  <div class=\"content-wrapper\">";
    }
   ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
 <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="myTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                            <?php

                            echo "<th>#</th>";
                            foreach ($column_name as $item )
                            {
                            echo  "<th>$item</th>";
                            }      
                            ?>
                            <th>Show</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        getTableValues($table,$stmt,1,$column_name_data)
                       ?>
                     </tbody>
             
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
       
    <?php
 
    $arr = array('tablename'=>$table);
    include_once('..\dao\includeWithVar.php');
    includeWithVariables('..\admin\editmodal.php',$arr);
    includeWithVariables('..\admin\deletemodal.php',$arr);
 
 ?>
 
<!-- jQuery -->
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- upload img -->
   <script src="../admin/plugins/uploadimage/script.js"></script>
<!-- DataTables -->
<script src="../admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../admin/dist/js/demo.js"></script>

<!-- page script -->
<script>
  $(function () {
    $('#myTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": false,
    });
  });
</script>


</body>


</html>