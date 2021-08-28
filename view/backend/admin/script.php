
<script type="text/javascript" src="../../../asset/bootstrap/js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="../../../asset/bootstrap/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    var table = $('#example').DataTable();

    $('#example tbody').on('click', 'tr', function() {
      var data = table.row(this).data();

    });
  });
</script>