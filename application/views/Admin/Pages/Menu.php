    <?php if($this->session->userdata('hak_akses')==='admin' ):?> 
     <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url('Admin/Homepage') ?>" class="brand-link">
        <img src="<?php echo base_url()."assets/admin/"; ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url()."assets/admin/"; ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">ADMIN</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item menu-open">
            <a href="<?php echo base_url('Admin/Homepage') ?>" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-header">Data Absen</li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/Absen/absen_guru') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Absen Guru
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/Absen/absen_siswa') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Absen Siswa
              </p>
            </a>
          </li>
          <li class="nav-header">Data Master</li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/Guru') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Guru
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/Siswa') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/Jam') ?>" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Data Jam Masuk
              </p>
            </a>
          </li>
          <li class="nav-header">Data Galeri</li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/Galeri') ?>" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Data Galeri
              </p>
            </a>
          </li>
          <li class="nav-header">Data Laporan </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/Laporan') ?>" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Data Laporan
              </p>
            </a>
          </li>
          <li class="nav-header">Data User</li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/User') ?>" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Data User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Login/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <?php elseif($this->session->userdata('hak_akses')==='kepsek'):?> 
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url('Admin/Homepage') ?>" class="brand-link">
        <img src="<?php echo base_url()."assets/admin/"; ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Kepala Sekolah</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url()."assets/admin/"; ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Kepala Sekolah</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item menu-open">
            <a href="<?php echo base_url('Admin/Homepage') ?>" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-header">Data Absen</li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/Absen/absen_guru') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Absen Guru
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/Absen/absen_siswa') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Absen Siswa
              </p>
            </a>
          </li>


          <li class="nav-header">Data Laporan </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/Laporan') ?>" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Data Laporan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('Login/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <?php endif;?>