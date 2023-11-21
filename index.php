<?php 
require 'lang.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Rak Senjata Otomatis</title>
    <link rel="icon" href="assets/img/stasrg1-modified.png">
</head>
<body>
  <div class="header">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <img src="assets/img/stasrg2.png" alt="" width="130px">

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
              
               <!-- Translate bahasa -->
              <li class="nav-item dropdown">

              <a class="nav-link nav-icon dropdown-toggle" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-translate"></i>
              </a><!-- End Messages Icon -->

              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               <li>
                <a class="dropdown-item" href="index.php?weapon=id">
                <img src="assets\img\bendera-id.png" alt="" class="rounded-circle" width="20px">
                ID
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="index.php?weapon=eng">
                <img src="assets\img\bendera-amerika.png" alt="" class="rounded-circle" width="20px">
                EN
                </a>
              </li>
            </ul>
          </li>
          <!-- Penutup translate -->

          <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-person-bounding-box"></i>
          <span class="d-none d-md-block dropdown-toggle ps-2"></span>
        </a><!-- End Profile Iamge Icon -->

        
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
              <i class="bi bi-person"></i>
              <span>Sign In</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="pages-contact.php">
              <i class="bi bi-question-circle"></i>
              <span>Need Help?</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->


              </li>
            </ul>
          </div>
        </div>
      </nav>
  </div>
    
      <div class="main">
      <!-- Section -->
      <section id="hero" class="d-flex align-items-center">
        <div class="container">
          <div class="row gy-4">
              <div class="col col-sm-7">
                  <h1><?= __('Rak Senjata Otomatis')?></h1>
                  <h5><?= __('Lemari untuk mengkunci senjata di Gudang senjata Yonzipur 3 Pangalengan.')?></h5>
                  <br>
                  <!-- Vertically centered Modal -->
                  <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                    <?= __('Mulai')?>
                  </button>
                  <div class="modal fade" id="verticalycentered" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Masuk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <form action="proses_login.php" method="post" class="row g-3 needs-validation" novalidate>
                        <div class="col-12">
                          <label for="yourUsername" class="form-label">Nama Pengguna</label>
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" name="username" class="form-control" id="yourUsername" required>
                          </div>
                        </div>

                        <div class="col-12">
                          <label for="yourPassword" class="form-label">Kata Sandi</label>
                          <input type="password" name="password" class="form-control" id="yourPassword" required>
                        </div>

                          <div class="modal-footer">
                          <div class="col-12">
                                <p class="small mb-0">Akun tidak terdaftar? <a href="registrasi.php">Daftarkan sebuah akun</a></p>
                          </div>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
              </div>
              </div>


              <div class="col col-md-5">
                  <!-- Slides with indicators -->
              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="assets/img/Storage.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/Storage2.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/Storage1.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>

              </div><!-- End Slides with indicators -->
              </div>


          </div>
        </div>
      </section>
      </div>

      <div class="footer">
      <footer id="footer" class="py-1 justify-between-content border-top">
        <div class="container">
          <p class="text-muted text-center">&copy; Copyright <strong><span>STAS-RG</span></strong></p>
        </div>
      </footer>
      </div>
      <!-- Footer -->

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
      
</body>
</html>