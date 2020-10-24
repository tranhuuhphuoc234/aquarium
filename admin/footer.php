<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4  disable because make popup.php fail-->
<!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- upload img -->
<script src="../admin/plugins/uploadimage/script.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- jQuery
<script src="../admin/plugins/jquery/jquery.min.js"></script> -->


<!-- DataTables -->
<script src="../admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- href with parameter-->
<script>
function toTable() {
    var column_name = ["Fish Name", "Fish Scientific Name", "Type", "Location", "Size", "Weight", "Habitat", "Diet",
        "Gestationperiod", "Achievableage", "Status"
    ];
    var column_name_data = ['fishname', 'fishscientificname', 'typename', 'locationname', 'size', 'weight', 'habitat',
        'diet', 'gestationperiod', 'achievableage', 'status', 'fishstatus'
    ];
    var stmt =
        "Select fishname,fishscientificname,typename,locationname,size,weight,habitat,diet,gestationperiod,achievableage,status,fishstatus from fish join type on type.typeid = fish.typeid join location on location.locationid = fish.locationid";
    var table = "fish"
    window.location.href = "../admin/table.php?column_name=" + column_name + "&column_name_data=" + column_name_data +
        "&stmt=" + stmt + "&table=" + table;
}
</script>
<!-- page script -->
<script>
$(function() {
    $('#myTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
<!-- My JavaScript -->
<script src="..\admin\js\myjs.js"></script>
</body>

</html>