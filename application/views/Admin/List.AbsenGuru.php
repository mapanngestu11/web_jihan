<!DOCTYPE html>
<html lang="en">

<?php include 'Pages/Head.php';?>


<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
<!--     <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?php echo base_url()."assets/admin/"; ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->
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
                <li class="breadcrumb-item active">Data Guru</li>
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
                  <h3 class="card-title">Data Guru</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <?php 
                  $hak_akses = $this->session->userdata('hak_akses'); 
                  if ($hak_akses == 'kepsek') {
                  }else{ ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Tambah Data
                    </button>
                  <?php }?>
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
                        <form action="<?php echo base_url() . 'Admin/Absen/tambah_absen_guru'; ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="row form-group">
                              <div class="col-md-12">
                                <label>Nip.</label>
                                <input type="text" name="nip" class="form-control" autocomplete="off" required="">
                              </div>
                            </div>
                            <div class="row form-group mb-4">
                              <div class="col-md-12">
                                <label>Nama Guru</label>
                                <input type="text" name="nama_lengkap" class="form-control" autocomplete="off" required="">
                              </div>
                            </div>
                            <div class="row form-group mb-4">
                              <div class="col-md-6">
                                <label>Keterangan</label>
                                <select class="form-control" name="keterangan" required="">
                                  <option value="">Pilih</option>
                                  <option value="Sakit">Sakit</option>
                                  <option value="Izin">Izin</option>
                                  <option value="Alpa">Tidak Hadir</option>
                                  <option value="Terlambat">Terlambat</option>
                                </select>
                              </div>
                              <div class="col-md-6">
                                <label>Jam Absen</label>
                                <input type="time" name="jam_absen" required="" class="form-control">
                              </div>
                            </div>
                            <div class="row form-group mb-4">
                              <div class="col-md-12">
                                <label>Lampiran</label>
                                <input type="file" name="file" class="form-control">
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
                        <th>Nip.</th>
                        <th>Nama Lengkap</th>
                        <th>Mapel</th>
                        <th>Jam Absen</th>
                        <th>Keterangan</th>
                        <?php 
                        $hak_akses = $this->session->userdata('hak_akses'); 
                        if ($hak_akses == 'kepsek') {
                        }else{ ?>
                         <th>Aksi</th>
                       <?php }?>
                     </tr>
                   </thead>
                   <tbody>
                    <?php
                    $no = 0;
                    foreach ($data_guru->result_array() as $row) :

                      $no++;
                      $id_absen           = $row['id_absen'];
                      $nip     = $row['nip'];
                      $nama_guru     = $row['nama_guru'];
                      $mapel     = $row['mapel'];
                      $keterangan = $row['keterangan'];     
                      $jam_absen = $row['jam_absen'];

                      // Set lokal ke Indonesia
                      setlocale(LC_TIME, 'id_ID');
                      $tanggal = date('d F Y');

                      ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $nip;?></td>
                        <td><?php echo $nama_guru;?></td>
                        <td><?php echo $mapel;?></td>
                        <td><?php echo $jam_absen;?></td>
                        <td>
                          <?php if ($keterangan == 'Tepat Waktu') { ?>
                            <span class="badge badge-success">Tepat Waktu</span>
                          <?php }elseif ($keterangan == 'Terlambat'){ ?>
                            <span class="badge badge-danger">Terlambat</span>
                          <?php }elseif ($keterangan == 'Alpha'){ ?>
                            <span class="badge badge-danger">Alpha</span>
                          <?php }elseif ($keterangan == 'Izin'){?>
                            <span class="badge badge-primary">Izin</span>
                          <?php }else{($keterangan == 'Sakit')?>
                          <span class="badge badge-warning">Sakit</span>
                        <?php }?>
                      </td>

                    </td>
                    <?php 
                    $hak_akses = $this->session->userdata('hak_akses'); 
                    if ($hak_akses == 'kepsek') {
                    }else{ ?>
                      <td>
                        <button class="btn btn-warning" style="color: white;" data-toggle="modal" data-target="#editModal<?php echo $id_absen;?>">Edit</button> 
                        <button class="btn btn-danger" data-toggle="modal" data-target="#hapusModal<?php echo $id_absen;?>">Hapus</button>
                      </td>
                    <?php }?>
                  </tr>
                <?php endforeach;?>
              </tbody>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nip.</th>
                  <th>Nama Lengkap</th>
                  <th>Mapel</th>
                  <th>Jam Absen</th>
                  <th>Keterangan</th>
                  <?php 
                  $hak_akses = $this->session->userdata('hak_akses'); 
                  if ($hak_akses == 'kepsek') {
                  }else{ ?>
                   <th>Aksi</th>
                 <?php }?>
               </tr>
             </tfoot>
           </table>
         </div>
         <!-- /.card-body -->
       </div>

       <?php 
       $no = 0;
       foreach ($data_guru->result_array() as $row) :

        $no++;
        $id_absen           = $row['id_absen'];
        $nip     = $row['nip'];
        $nama_guru     = $row['nama_guru'];
        $mapel     = $row['mapel'];
        $keterangan = $row['keterangan'];     
        $jam_absen = $row['jam_absen'];


                      // Set lokal ke Indonesia
        setlocale(LC_TIME, 'id_ID');
        $tanggal = date('d F Y');
        ?>
        <div class="modal fade" id="editModal<?php echo $id_absen;?>" tabindex="-1" role="dialog" aria-labelledby="editModal<?php echo $id_absen;?>" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editModal">Update Data Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?php echo base_url() . 'Admin/Absen/update_absen_guru'; ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="row form-group">
                    <div class="col-md-12">
                      <label>Nip.</label>
                      <input type="text" name="nip" class="form-control" autocomplete="off" value="<?php echo $nip;?>" required="">
                      <input type="hidden" name="id_absen" value="<?php echo $id_absen;?>">
                    </div>
                  </div>
                  <div class="row form-group mb-4">
                    <div class="col-md-12">
                      <label>Nama Guru</label>
                      <input type="text" name="nama_guru" class="form-control" value="<?php echo $nama_guru;?>" autocomplete="off" required="">
                    </div>
                  </div>
                  <div class="row form-group mb-4">
                    <div class="col-md-6">
                      <label>Keterangan</label>
                      <select class="form-control" name="keterangan" required="">
                        <option value="">Pilih</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Izin">Izin</option>
                        <option value="Alpha">Alpha</option>
                        <option value="Terlambat">Terlambat</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label>Jam Absen</label>
                      <input type="time" name="jam_absen" required="" class="form-control">
                    </div>
                  </div>
                  <div class="row form-group mb-4">
                    <div class="col-md-12">
                      <label>Lampiran</label>
                      <input type="file" name="file" class="form-control">
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
foreach ($data_guru->result_array() as $row) :

  $no++;
  $id_absen           = $row['id_absen'];
  $nama_guru = $row['nama_guru'];

  ?>
  <div class="modal fade" id="hapusModal<?php echo $id_absen;?>" tabindex="-1" role="dialog" aria-labelledby="hapusModal<?php echo $id_absen;?>" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModal">Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url() . 'Admin/Absen/delete_absen_guru'; ?>" method="POST">
          <div class="modal-body">
            <input type="hidden" name="id_absen" value="<?php echo $id_absen;?>">
            <p>Apakah kamu yakin akan menghapus data <strong><?php echo $nama_guru;?></strong> ? </p>
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
