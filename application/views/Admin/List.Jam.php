<!DOCTYPE html>
<html lang="en">

<?php include 'Pages/Head.php';?>


<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?php echo base_url()."assets/admin/"; ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    <?php include 'Pages/Navbar.php';?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include 'Pages/Menu.php';?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Data Jam Masuk</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Jam Masuk</li>
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
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Jam Masuk</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <br>
                  <br>


                  <style type="text/css">
                    .gambar_galeri{
                      width: 60px !important; 
                      border-radius: 50%;
                    }
                  </style>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Jam masuk </th>
                        <th>Keterangan.</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                     $no = 0;
                     foreach ($data_jam->result_array() as $row) :

                      $no++;
                      $id_jam           = $row['id_jam'];
                      $jam_masuk     = $row['jam_masuk'];
                      $keterangan     = $row['keterangan'];

                      // Set lokal ke Indonesia
                      setlocale(LC_TIME, 'id_ID');
                      $tanggal = date('d F Y');

                      ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $jam_masuk;?></td>
                        <td><?php echo $keterangan;?></td>
                      </td>
                      <td>
                        <button class="btn btn-warning" style="color: white;" data-toggle="modal" data-target="#editModal<?php echo $id_jam;?>">Edit</button> 
                      </td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
                <tfoot>
                  <tr>
                   <th>No.</th>
                   <th>Jam masuk </th>
                   <th>Keterangan.</th>
                   <th>Aksi</th>
                 </tr>
               </tfoot>
             </table>
           </div>
           <!-- /.card-body -->
         </div>

         <?php 
         $no = 0;
         foreach ($data_jam->result_array() as $row) :

          $no++;
          $id_jam           = $row['id_jam'];
          $jam_masuk     = $row['jam_masuk'];
          $keterangan     = $row['keterangan'];

          ?>
          <div class="modal fade" id="editModal<?php echo $id_jam;?>" tabindex="-1" role="dialog" aria-labelledby="editModal<?php echo $id_jam;?>" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModal">Update Data Jam Masuk</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="<?php echo base_url() . 'Admin/Jam/Update'; ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="row form-group">
                      <div class="col-md-6">
                        <label>Jam Masuk</label>
                        <input type="time" name="jam_masuk" class="form-control" autocomplete="off" value="<?php echo $jam_masuk;?>" required="">
                        <input type="hidden" name="id_jam" value="<?php echo $id_jam;?>">
                      </div>
                      <div class="col-md-6">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" autocomplete="off" value="<?php echo $keterangan;?>">
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php endforeach;?>
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
<!-- /.content-wrapper -->


<?php include 'Pages/Footer.php';?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include 'pages/Js.php';?>
<!-- Page specific script -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<?php include 'Pages/Notif.php';?>
</body>
</html>
