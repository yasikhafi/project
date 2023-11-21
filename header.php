<?php
include('lib/dbconnection.php');
if (!isset($_SESSION['user'])) {
  header("Location: index.php");
}
?>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-start">
    <a href="home.php" class="logo d-flex align-items-center">
      <img src="assets/img/stasrg2.png" alt="">
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
      <input type="text" name="query" placeholder="Search" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
  </div><!-- End Search Bar -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

      <!-- Translate bahasa -->
      <li class="nav-item dropdown">

        <a class="nav-link nav-icon dropdown-toggle" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-translate"></i>
        </a><!-- End Messages Icon -->

        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li>
            <a class="dropdown-item" href="home.php?weapon=id">
              <img src="assets\img\bendera-id.png" alt="" class="rounded-circle" width="20px">
              ID
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="home.php?weapon=eng">
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
          <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['user']['name'] ?></span>
        </a><!-- End Profile Iamge Icon -->


        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

          <li>
            <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
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

          <li>
            <a class="dropdown-item d-flex align-items-center" href="proses-logout.php">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->