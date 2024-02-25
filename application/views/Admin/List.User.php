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
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data User</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Data
                  </button>
                  <br>
                  <br>

                  <!-- modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="<?php echo base_url() . 'Admin/User/add'; ?>" method="POST" autocomplete="off">
                          <div class="modal-body">
                            <div class="row form-group">
                              <div class="col-md-6">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" autocomplete="off" required="">
                              </div>
                              <div class="col-md-6">
                                <label>Hak Akses</label>
                                <select class="form-control" name="hak_akses" required="">
                                  <option value=""> Pilih </option>
                                  <option value="admin"> Admin </option>
                                  <option value="kepsek"> Kepsek </option>
                                </select>
                              </div>
                            </div>
                            <div class="row form-group mb-4">
                              <div class="col-md-6">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" autocomplete="off" required="">
                              </div>
                              <div class="col-md-6">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required="">
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end modal -->
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Hak Akses</th>
                        <th>Last Login</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                     $no = 0;
                     foreach ($data_user->result_array() as $row) :

                      $no++;
                      $id_user           = $row['id_user'];
                      $username = $row['username'];
                      $nama_lengkap     = $row['nama_lengkap'];
                      $hak_akses = $row['hak_akses'];
                      $status = $row['status'];
                      $waktu = $row['waktu'];

                      // Set lokal ke Indonesia
                      setlocale(LC_TIME, 'id_ID');
                      $tanggal = date('d F Y');

                      ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $nama_lengkap;?></td>
                        <td>
                          <?php if ($hak_akses == 'admin' ) { ?>
                            <span class="badge badge-success">Admin</span> 
                          <?php }else{ ?>
                            <span class="badge badge-primary">Kepsek</span> 
                          <?php } ?>
                        </td>
                        <td><?php echo $tanggal;?></td>
                        <td>
                         <?php if ($status == '0' ) { ?>
                          <span class="badge badge-success">Active</span> 
                        <?php }else{ ?>
                          <span class="badge badge-danger">Delete</span> 
                        <?php } ?>
                      </td>
                      <td>
                        <button class="btn btn-warning" style="color: white;" data-toggle="modal" data-target="#editModal<?php echo $id_user;?>">Edit</button> 
                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapusModal<?php echo $id_user;?>">Hapus</button>
                      </td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nama Lengkap</th>
                    <th>Hak Akses</th>
                    <th>Last Login</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

          <?php 
          $no = 0;
          foreach ($data_user->result_array() as $row) :

            $no++;
            $id_user           = $row['id_user'];
            $username = $row['username'];
            $nama_lengkap     = $row['nama_lengkap'];
            $hak_akses = $row['hak_akses'];
            $status = $row['status'];
            $waktu = $row['waktu'];

                      // Set lokal ke Indonesia
            setlocale(LC_TIME, 'id_ID');
            $tanggal = date('d F Y');
            ?>
            <div class="modal fade" id="editModal<?php echo $id_user;?>" tabindex="-1" role="dialog" aria-labelledby="editModal<?php echo $id_user;?>" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Update Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="<?php echo base_url() . 'Admin/User/Update'; ?>" method="POST" autocomplete="off">

                    <div class="modal-body">
                      <div class="row mb-4">
                        <div class="col-md-6">
                          <label>Username</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $username;?>" autocomplete="off">
                          <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
                        </div>
                        <div class="col-md-6">
                          <label>Passowrd</label>
                          <input type="password" name="password" class="form-control" required="">
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-12">
                          <label>Nama Lengkap</label>
                          <input type="text" name="nama_lengkap" value="<?php echo $nama_lengkap;?>" class="form-control" required="">
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-12">
                          <label>Hak Akses</label>
                          <select class="form-control" name="hak_akses" required="">
                            <option value="<?php echo $hak_akses;?>"> <?php echo $hak_akses;?> </option>
                            <option value="admin"> Admin </option>
                            <option value="user"> User </option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <div class="col-md-12">
                          <label>Status</label>
                          <select class="form-control" name="status" required="">
                            <option value="<?php echo $status;?>">
                              <?php if ($status == '1') { ?>
                                Deleted
                              <?php }else{ ?>
                                Active
                              <?php }?>
                            </option>
                            <option value="1">Deleted</option>
                            <option value="0">Active</option>
                          </select>

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

  <!-- Modal Hapus -->
  <?php
  $no = 0;
  foreach ($data_user->result_array() as $row) :

    $no++;
    $id_user           = $row['id_user'];
    $nama_lengkap = $row['nama_lengkap'];

    ?>
    <div class="modal fade" id="hapusModal<?php echo $id_user;?>" tabindex="-1" role="dialog" aria-labelledby="hapusModal<?php echo $id_user;?>" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModal">Hapus Data User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo base_url() . 'Admin/User/delete'; ?>" method="POST">
            <div class="modal-body">
              <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
              <p>Apakah kamu yakin akan menghapus data <strong><?php echo $nama_lengkap;?></strong> ? </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Ya Hapus Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach;?>
  <!-- end modal -->

<?php endforeach;?>

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
