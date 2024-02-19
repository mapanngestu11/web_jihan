<!DOCTYPE html>
<html lang="en">

<?php include 'Pages/Head.php';?>


<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
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
              <h1>Data Siswa</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Siswa</li>
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
                  <h3 class="card-title">Data Siswa</h3>

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
                        <form action="<?php echo base_url() . 'Admin/Siswa/add'; ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="row form-group">
                              <div class="col-md-12">
                                <label>Nisn.</label>
                                <input type="text" name="nisn" class="form-control" autocomplete="off" required="">
                              </div>
                            </div>
                            <div class="row form-group mb-4">
                              <div class="col-md-6">
                                <label>Nama Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" autocomplete="off" required="">
                              </div>
                              <div class="col-md-6">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" required="">
                                  <option value=""> Pilih </option>
                                  <option value="Laki-laki"> Laki - Laki </option>
                                  <option value="Perempuan"> Perempuan </option>
                                </select>
                              </div>
                            </div>
                            <div class="row form-group mb-4">
                              <div class="col-md-12">
                                <label>Kelas</label>
                                <input type="text" name="kelas" class="form-control" autocomplete="off" required="">
                              </div>
                            </div>
                            <div class="row form-group mb-4">
                              <div class="col-md-6">
                                <label>No Hp.</label>
                                <input type="number" name="no_hp" class="form-control" required="">
                              </div>
                              <div class="col-md-6">
                                <label>No Hp Orang Tua</label>
                                <input type="number" name="no_hp_ortu" class="form-control" required="">
                              </div>
                            </div>
                            <div class="row form-group mb-4">
                              <div class="col-md-12">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="keterangan"></textarea>
                              </div>
                            </div>
                            <div class="row form-group mb-4">
                              <div class="col-md-12">
                                <label>Upload Foto</label>
                                <input type="file" name="foto" class="form-control" required="">
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
                        <th>Gambar</th>
                        <th>Nisn.</th>
                        <th>Siswa</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                     $no = 0;
                     foreach ($data_siswa->result_array() as $row) :

                      $no++;
                      $id_siswa           = $row['id_siswa'];
                      $gambar     = $row['foto'];
                      $nisn     = $row['nisn'];
                      $nama_siswa     = $row['nama_siswa'];
                      $kelas     = $row['kelas'];
                      $keterangan = $row['keterangan'];     
                      $waktu = $row['waktu'];

                      // Set lokal ke Indonesia
                      setlocale(LC_TIME, 'id_ID');
                      $tanggal = date('d F Y');

                      ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><img class="gambar_galeri" src="<?php echo base_url()."assets/upload/"; ?><?php echo $gambar;?>"></td>
                        <td><?php echo $nisn;?></td>
                        <td><?php echo $nama_siswa;?></td>
                        <td><?php echo $kelas;?></td>

                      </td>
                      <td>
                        <button class="btn btn-warning" style="color: white;" data-toggle="modal" data-target="#editModal<?php echo $id_siswa;?>">Edit</button> 
                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapusModal<?php echo $id_siswa;?>">Hapus</button>
                      </td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>Nisn.</th>
                    <th>Siswa</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

          <?php 
          $no = 0;
          foreach ($data_siswa->result_array() as $row) :

            $no++;
            $id_siswa           = $row['id_siswa'];
            $gambar = $row['foto'];
            $nisn     = $row['nisn'];
            $nama_siswa = $row['nama_siswa'];
            $jenis_kelamin = $row['jenis_kelamin']; 
            $kelas = $row['kelas'];  
            $no_hp = $row['no_hp'];
            $no_hp_ortu = $row['no_hp_ortu'];  
            $keterangan = $row['keterangan'];
            $waktu = $row['waktu'];

                      // Set lokal ke Indonesia
            setlocale(LC_TIME, 'id_ID');
            $tanggal = date('d F Y');
            ?>
            <div class="modal fade" id="editModal<?php echo $id_siswa;?>" tabindex="-1" role="dialog" aria-labelledby="editModal<?php echo $id_siswa;?>" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Update Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="<?php echo base_url() . 'Admin/Siswa/Update'; ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="row form-group">
                        <div class="col-md-12">
                          <label>Nisn.</label>
                          <input type="text" name="nisn" class="form-control" autocomplete="off" value="<?php echo $nisn;?>" required="">
                          <input type="hidden" name="id_siswa" value="<?php echo $id_siswa;?>">
                        </div>
                      </div>
                      <div class="row form-group mb-4">
                        <div class="col-md-6">
                          <label>Nama Siswa</label>
                          <input type="text" name="nama_siswa" class="form-control" value="<?php echo $nama_siswa;?>" autocomplete="off" required="">
                        </div>
                        <div class="col-md-6">
                          <label>Jenis Kelamin</label>
                          <select class="form-control" name="jenis_kelamin" required="">
                            <option value="<?php echo $jenis_kelamin;?>"> <?php echo $jenis_kelamin;?> </option>
                            <option value="Laki-laki"> Laki - Laki </option>
                            <option value="Perempuan"> Perempuan </option>
                          </select>
                        </div>
                      </div>
                      <div class="row form-group mb-4">
                        <div class="col-md-12">
                          <label>Kelas</label>
                          <input type="text" name="kelas" class="form-control" autocomplete="off" value="<?php echo $kelas;?>" required="">
                        </div>
                      </div>
                      <div class="row form-group mb-4">
                        <div class="col-md-6">
                          <label>No Hp.</label>
                          <input type="number" name="no_hp" class="form-control" value="<?php echo $no_hp;?>" required="">
                        </div>
                        <div class="col-md-6">
                          <label>No Hp Orang Tua</label>
                          <input type="number" name="no_hp_ortu" class="form-control" value="<?php echo $no_hp_ortu;?>" required="">
                        </div>
                      </div>
                      <div class="row form-group mb-4">
                        <div class="col-md-12">
                          <label>Keterangan</label>
                          <textarea class="form-control" name="keterangan"><?php echo $keterangan;?></textarea>
                        </div>
                      </div>
                      <div class="row form-group mb-4">
                        <div class="col-md-12">
                          <label>Upload Foto</label>
                          <input type="file" name="foto" class="form-control">
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

<!-- Modal Hapus -->
<?php
$no = 0;
foreach ($data_siswa->result_array() as $row) :

  $no++;
  $id_siswa           = $row['id_siswa'];
  $nama_siswa = $row['nama_siswa'];

  ?>
  <div class="modal fade" id="hapusModal<?php echo $id_siswa;?>" tabindex="-1" role="dialog" aria-labelledby="hapusModal<?php echo $id_siswa;?>" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModal">Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url() . 'Admin/Siswa/delete'; ?>" method="POST">
          <div class="modal-body">
            <input type="hidden" name="id_siswa" value="<?php echo $id_siswa;?>">
            <p>Apakah kamu yakin akan menghapus data <strong><?php echo $nama_siswa;?></strong> ? </p>
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
