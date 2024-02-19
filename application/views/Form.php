<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
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

  <?php include 'pages/Navbar.php';?>

  <div
  class="hero page-inner overlay"
  style="background-image: url('images/hero_bg_1.jpg')"
  >
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-9 text-center mt-5">
        <h1 class="heading" data-aos="fade-up">Contact Us</h1>

        <nav
        aria-label="breadcrumb"
        data-aos="fade-up"
        data-aos-delay="200"
        >
        <ol class="breadcrumb text-center justify-content-center">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li
          class="breadcrumb-item active text-white-50"
          aria-current="page"
          >
          Contact
        </li>
      </ol>
    </nav>
  </div>
</div>
</div>
</div>

<div class="section">
  <div class="container">
    <div class="row">

      <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
        <form action="<?php echo base_url() . 'Absen/Form'; ?>" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-6 mb-3">
              <input
              type="text"
              class="form-control"
              name ="nisn"
              placeholder="Nisn. / Nip"
              required=""
              />
            </div>
            <div class="col-6 mb-3">
              <input
              type="text"
              class="form-control"
              name="nama_lengkap"
              placeholder="Nama Lengkap"
              required=""
              />
            </div>
            <div class="col-12 mb-3">
              <select class="form-control" name="status" required="">
                <option value="">Pilih</option>
                <option value="guru">Guru</option>
                <option value="siswa">Siswa</option>
              </select>
            </div>
            <div class="col-12 mb-3">
              <input
              type="file"
              class="form-control"
              name="file"

              />
            </div>
            <div class="col-12 mb-3">
              <textarea
              name="keterangan"
              id=""
              cols="30"
              rows="7"
              class="form-control"
              placeholder="Keterangan Terlambat"
              ></textarea>
            </div>

            <div class="col-12">
              <input
              type="submit"
              value="Send Message"
              class="btn btn-primary"
              />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.untree_co-section -->

<?php include 'Pages/Footer.php';?>
<!-- /.site-footer -->

<!-- Preloader -->
<div id="overlayer"></div>
<div class="loader">
  <div class="spinner-border" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>

<?php include 'Pages/Js.php';?>

<?php include 'pages/Notif.php';?>

</body>
</html>
