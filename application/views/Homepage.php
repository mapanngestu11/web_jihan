<!DOCTYPE html>
<html lang="en">

<?php include 'pages/Head.php';?>

<body>
  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <!-- navbar -->
  <?php include 'pages/Navbar.php';?>
  <!-- end -->
  <div class="hero">
    <div class="hero-slide">
      <div
      class="img overlay"
      style="background-image: url('<?php echo base_url()."assets/"; ?>images/image1.jpg')"
      ></div>
      <div
      class="img overlay"
      style="background-image: url('<?php echo base_url()."assets/"; ?>images/image3.jpg')"
      ></div>
      <div
      class="img overlay"
      style="background-image: url('<?php echo base_url()."assets/"; ?>images/image2.jpg')"
      ></div>
    </div>

    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-9 text-center">
          <h1 class="heading" data-aos="fade-up">
            Absen Guru & Siswa SMK Muhammadiyah 2 Kota Tangerang.
          </h1>
          <form
          action="<?php echo base_url() . 'Absen/cek'; ?>"
          class="narrow-w form-search d-flex align-items-stretch mb-3"
          data-aos="fade-up"
          data-aos-delay="200"
          method="POST"
          >
          <input
          type="text"
          class="form-control px-4"
          name="data_nis"
          placeholder="Input Nis. Siswa Atau Nip. Guru"
          />
          <button type="submit" class="btn btn-primary">Absen</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row mb-5 align-items-center">
      <div class="col-lg-6">
        <h2 class="font-weight-bold text-primary heading">
          Informasi Galeri
        </h2>
      </div>
      <div class="col-lg-6 text-lg-end">
        <p>
          <a
          href="<?php echo base_url('Form/') ?>"
          target="_blank"
          class="btn btn-primary text-white py-3 px-4"
          >Form Izin</a>
          
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="property-slider-wrap">
          <div class="property-slider">

            <!-- .item -->
            <?php 

            foreach ($data_gambar->result_array() as $row) :
             $nama_gambar = $row['nama_gambar'];
             $gambar     = $row['gambar'];
             $keterangan = $row['keterangan'];     
             $waktu = $row['waktu'];
             ?>
             <div class="property-item">
               <a href="property-single.html" class="img">
                 <img src="<?php echo base_url()."assets/upload"; ?>/<?php echo $gambar;?>" alt="Image" class="img-fluid" />
               </a>

               <div class="property-content">
                <div class="price mb-2"><span><?php echo $nama_gambar;?></span></div>
                <div>
                 <span class="d-block mb-2 text-black-50"
                 ><?php echo $waktu;?></span>
                 
                 <span class="city d-block mb-3"><?php echo $keterangan;?></span>
                 
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

<div class="section">
 <div class="row justify-content-center footer-cta" data-aos="fade-up">
   <div class="col-lg-7 mx-auto text-center">
     <h2 class="mb-4">Informasi Izin Sekolah</h2>
     <p>
       <a
       href="#"
       target="_blank"
       class="btn btn-primary text-white py-3 px-4"
       >Input Data Izin</a
       >
     </p>
   </div>
   <!-- /.col-lg-7 -->
 </div>
 <!-- /.row -->
</div>

<?php include 'pages/footer.php';?>
<!-- /.site-footer -->

<!-- Preloader -->
<div id="overlayer"></div>
<div class="loader">
  <div class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>


<!-- js -->

<?php include 'pages/Js.php';?>
<!-- end js -->

<?php include 'pages/Notif.php';?>
</body>
</html>
