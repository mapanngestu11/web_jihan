<?php $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>

<nav class="site-nav">
  <div class="container">
    <div class="menu-bg-wrap">
      <div class="site-navigation">
        <a href="<?php echo base_url('Homepage/') ?>" class="logo m-0 float-start">SMK Muhammadiyah 2 Kota Tangerang.</a>

        <ul
        class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
        >
        <li class="<?= $page == 'index.php' ? 'active':''; ?>"><a href="<?php echo base_url('Homepage/') ?>">Home</a></li>
        <li><a href="<?php echo base_url('Siswa/') ?>">Siswa</a></li>
        <li><a href="<?php echo base_url('Guru/') ?>">Guru</a></li>
        <li><a href="<?php echo base_url('Form/') ?>">Form Keterlambatan</a></li>
      </ul>

      <a
      href="#"
      class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
      data-toggle="collapse"
      data-target="#main-navbar"
      >
      <span></span>
    </a>
  </div>
</div>
</div>
</nav>