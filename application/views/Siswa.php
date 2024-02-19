<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!DOCTYPE html>
<html lang="en">
<?php include 'Pages/Head.php';?>
<body>
  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <?php include 'Pages/Navbar.php';?>

  <div
  class="hero page-inner overlay"
  style="background-image: url('images/hero_bg_1.jpg')"
  >
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-9 text-center mt-5">
        <h1 class="heading" data-aos="fade-up">Data Siswa</h1>

        <nav
        aria-label="breadcrumb"
        data-aos="fade-up"
        data-aos-delay="200"
        >
        <ol class="breadcrumb text-center justify-content-center">
          <li class="breadcrumb-item"><a href="<?php echo base_url('Siswa/') ?>">Home</a></li>
          <li
          class="breadcrumb-item active text-white-50"
          aria-current="page"
          >
          Data Siswa
        </li>
      </ol>
    </nav>
  </div>
</div>
</div>
</div>

<div class="section">
  <div class="container">
    <div class="row mb-5 align-items-center">
      <div class="col-lg-6 text-center mx-auto">
        <h2 class="font-weight-bold text-primary heading">
          Data Siswa
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="property-slider-wrap">
          <div class="property-slider">

            <!-- .item -->
            <?php 

            foreach ($data_siswa->result_array() as $row) :
              $foto = $row['foto'];
              $nama_siswa     = $row['nama_siswa'];
              $kelas = $row['kelas'];     
              $nisn = $row['nisn'];
              ?>
              <div class="property-item">
               <a href="property-single.html" class="img">
                <img src="<?php echo base_url()."assets/upload"; ?>/<?php echo $foto;?>" alt="Image" class="img-fluid" />
              </a>

              <div class="property-content">
                <div class="price mb-2"><span><?php echo $nisn;?>,<?php echo $nama_siswa;?></span></div>
                <div>


                  <span class="city d-block mb-3"><?php echo $kelas;?></span>
                  
                </div>
              </div>
            </div>
          <?php endforeach;?>
          <!-- .item -->
          <!-- .item -->
        </div>

        <div
        id="property-nav"
        class="controls"
        tabindex="0"
        aria-label="Carousel Navigation"
        >
        <span
        class="prev"
        data-controls="prev"
        aria-controls="property"
        tabindex="-1"
        >Prev</span
        >
        <span
        class="next"
        data-controls="next"
        aria-controls="property"
        tabindex="-1"
        >Next</span
        >
      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php include 'pages/Footer.php';?>
<!-- Preloader -->
<div id="overlayer"></div>
<div class="loader">
  <div class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>

<?php include 'pages/Js.php';?>
</body>
</html>
