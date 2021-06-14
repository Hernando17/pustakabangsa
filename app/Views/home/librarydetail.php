<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-Library | Book Detail</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url(); ?>/assets/img/logoatas.png" rel="icon">
  <link href="<?= base_url(); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/css/mystyle.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url(); ?>/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars - v2.2.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="/Home"><img src="<?= base_url(); ?>/assets/img/logo_mhs.png"><span>LIBRARY<font color="ff0141"> MULTISTUDI</font></span></a></h1>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <!-- <ul> -->
        <!-- <li class="active"><a href="/Home">Beranda</a></li> -->
        <!-- <li><a href="#about">Profil</a></li> -->
        <!-- <li><a href="#services">Layanan</a></li> -->
        <!-- <li><a href="">Pengumuman</a> -->
        <!-- <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="drop-down"><a href="#">Drop Down 2</a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
            <li><a href="#">Drop Down 5</a></li>
          </ul> -->
        <!-- </li> -->
        <!-- <li><a href="#contact">Contact</a></li> -->

        <li class="get-started "><a href="<?= base_url('/Book/library'); ?>">Kembali</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- Body -->

  <body>

    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <br>
          <br>
          <br>
          <br>
          <div class="card">
            <h5 class="card-header">Detail Book</h5>
            <div class="card-body">


              <div class="container">
                <div class="row">
                  <div class="col">
                    <div class="row g-0">
                      <div class="col-md-2.5 img-fluid">
                        <img src="<?= base_url(); ?>/assets/img/sampul/<?= $offline['sampul']; ?>" width="150px" height="200px" alt="..." style="float:left;" class="my-4 ml-2">
                      </div>
                      <div class="col-md-8 ">
                        <div class="card-body">
                          <h5 class="card-title "><b>Judul : <?= $offline['judul']; ?></b></h5>
                          <hr>
                          <p class="card-title ">ISBN : <?= $offline['isbn']; ?></p>
                          <p class="card-title ">Kode : <?= $offline['kode']; ?></p>
                          <p class="card-title ">Kategori : <?= $offline['genre']; ?></h5>
                          <p class="card-text ">Penulis : <?= $offline['penulis']; ?></p>
                          <p class="card-text ">Penerbit : <?= $offline['penerbit']; ?></p>
                          <p class="card-text " style="font-color:green;">Persediaan : <?= $offline['stock']; ?></span></p>
                          <p class="card-text ">Deskripsi : <?= $offline['deskripsi']; ?></p>
                          <hr>
                          <p class="card-text "><small class="text-muted">Tahun Penerbitan : <?= $offline['tglpenerbitan']; ?></small></p>
                          <p class="card-text "><small class="text-muted">Waktu Upload : <?= $offline['created_at']; ?></small></p>
                          <p class="card-text "><small class="text-muted">Update Terakhir : <?= $offline['updated_at']; ?></small></p>

                          <div class="alert alert-warning mt-4" role="alert">
                            Dapatkan Buku <?= $offline['judul']; ?> di perpustakaan SMK MULTISTUDI HIGH SCHOOL
                          </div>




                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>




            </div>
          </div>

        </div>
      </div>
    </div>
  </body>
  <!-- End Body -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter" data-aos="fade-up">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact" data-aos="fade-up" data-aos-delay="100">
            <h3>SMK MULTISTUDI HIGH SCHOOL</h3>
            <p>
              Jl. Kuda Laut, Sungai Jodoh
              Kota Batam, Kepulauan Riau - 29451 <br><br>
              <strong>Phone:</strong> (0778) 422859<br>
              <strong>Email:</strong> library@multistudi.sch.id<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="200">
            <h4>Link Internal</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://multistudi.sch.id/">Website</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Registrasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Student</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Teacher</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Elearning</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Elibrary</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="300">
            <h4>Link Eksternal</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Perpusnas</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Perpus Kepri</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Perpus Batam</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="400">
            <h4>Our Social Networks</h4>
            <div class="social-links mt-3">
              <a href="https://www.facebook.com/smk.multistudi/" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://twitter.com/SMK_MHS_BATAM?lang=en" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.youtube.com/channel/UCftjInE04jsLOo3PO-mtsYg" class="youtube"><i class="bx bxl-youtube"></i></a>
              <a href="https://www.instagram.com/SMK_MULTISTUDI_BATAM/" class="instagram"><i class="bx bxl-instagram"></i></a>

            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        <font color="#fff">&copy; Copyright <strong><span>Hernando</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
        Designed by <a href="https://www.instagram.com/hernando__ong/">Hernando</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url(); ?>/assets/vendor/aos/aos.js"></script>


  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>/assets/js/main.js"></script>

</body>

</html>