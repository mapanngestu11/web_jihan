
<!-- msg -->
<?php if ($this->session->flashData('msg') == 'warning') : ?>
  <script type="text/javascript">
    Swal.fire({
      type: 'warning',
      title: 'Perhatian !',
      heading: 'Success',
      text: "Proses Gagal.",
      showHideTransition: 'slide',
      icon: 'warning',
      hideAfter: false,
      bgColor: '#7EC857'
    });
  </script>

  <?php elseif ($this->session->flashData('msg') == 'success') : ?>
    <script type="text/javascript">
      Swal.fire({
        type: 'success',
        title: 'Sukses',
        heading: 'Success',
        text: "Anda Absen Tepat Waktu.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        bgColor: '#7EC857'
      });
    </script>

    <?php elseif ($this->session->flashData('msg') == 'success-izin') : ?>
      <script type="text/javascript">
        Swal.fire({
          type: 'success',
          title: 'Sukses',
          heading: 'Success',
          text: "Form berhasil terkirim.",
          showHideTransition: 'slide',
          icon: 'success',
          hideAfter: false,
          bgColor: '#7EC857'
        });
      </script>
      <?php elseif ($this->session->flashData('msg') == 'update') : ?>
        <script type="text/javascript">
          Swal.fire({
            type: 'success',
            title: 'Sukses',
            heading: 'Success',
            text: "Data Berhasil Di Update.",
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: false,
            bgColor: '#7EC857'
          });
        </script>
        <?php elseif ($this->session->flashData('msg') == 'info-telat') : ?>
          <script type="text/javascript">
            Swal.fire({
              type: 'warning',
              title: 'Perhatian',
              heading: 'Perhatian',
              text: "Anda Datang Terlambat, Mohon Isi Form Berikut.",
              showHideTransition: 'slide',
              icon: 'warning',
              hideAfter: false,
              bgColor: '#7EC857'
            });
          </script>
          <?php else : ?>

            <?php endif; ?>