<!-- proses penyimpanan -->
<?php
include('lib/dbconnection.php');
require 'lang.php';

// jika tombol simpan di klik
if (isset($_POST['btnSubmit'])) {

  // baca isi inputan form
  $nokartu = $_POST['nokartu'];
  $id_senjata = $_POST['id_senjata'];
  $id_pengguna = $_POST['id_pengguna'];
  $nama_pengguna = $_POST['nama_pengguna'];
  $nomor_induk = $_POST['nomor_induk'];

  // simpan ke tabel akses
  $sql = "INSERT INTO owner (id_senjata, id_pengguna, nokartu, nama_pengguna, nomor_induk)
    VALUES ('" . $id_senjata . "', '" . $id_pengguna . "','" . $nokartu . "', '" . $nama_pengguna . "', '" . $nomor_induk . "')";
  // jika berhasil tersimpan, tampilan pesan tersimpan

  // kembali ke data akses
  if ($conn->query($sql) === TRUE) {
    echo "<script>
                alert('Tersimpan');
                location.replace('data-akses.php');
                </script>
                ";
  } else {
    echo "<script>
                alert('Gagal Tersimpan');
                location.replace('data-akses.php');
                </script>
                ";
  }
}
// kosongkan tabel tmprfid
mysqli_query($conn, "DELETE FROM tmprfid");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, sshirink-to-fit=no">
  <script type="text/javascript" src="jquery/jquery.min.js"></script>

  <title><?= __('Tambah Data Akses - Penyimpanan Senjata Otomatis') ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/stasrg1-modified.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- pembacaan no kartu otmatis dengan js -->
  <script type="text/javascript">
    $(document).ready(function() {
      setInterval(function() {
        $("#norfid").load('nokartu.php')
        // $("#idsenjata").load('idsenjata.php')
      }, 0); // pembacaan file no kartu sesuai detik karena 0 jadi refresh langsung muncul
    });
  </script>
</head>

<body>
  <?php include "header.php"; ?>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="home.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Halaman</li>

      <li class="nav-item">
        <a class="nav-link " href="data-akses.php">
          <i class="bi bi-person"></i>
          <span>Data Akses</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="data-senjata.php">
          <i class="bi bi-question-circle"></i>
          <span>Data Senjata</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Tambah Data Akses</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
          <li class="breadcrumb-item">Halaman</li>
          <li class="breadcrumb-item"><a href="data-akses.php">Data Akses</a></li>
          <li class="breadcrumb-item active">Tambah Data Akses</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Akses</h5>
              <!--Data Akses -->
              <form method="POST" class="row g-3 needs-validation">
                <div id="norfid"></div>
                <!-- <div id="idsenjata"></div> -->
                <div class="col-12">
                  <label class="col-sm-2 col-form-label">ID Senjata</label>
                  <div class="col">
                    <select class="form-select" aria-label="Default select example" name="id_senjata" id="id_senjata">
                      <option value="">Open this select menu</option>
                      <?php
                      $query = mysqli_query($conn, "SELECT * FROM tmploadcell");
                      while ($data = mysqli_fetch_array($query)) {
                        echo "<option value=$data[id_senjata]> $data[id_senjata]</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <label for="inputEmail4" class="form-label">ID Pengguna</label>
                  <input type="text" class="form-control" name="id_pengguna" id="id_pengguna" required>
                </div>
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Nama Pengguna</label>
                  <input type="text" class="form-control" name="nama_pengguna" id="nama_pengguna" required>
                </div>
                <div class="col-12">
                  <label for="inputAddress" class="form-label">Nomor Induk</label>
                  <input type="text" class="form-control" name="nomor_induk" id="nomor_induk" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="btnSubmit" id="btnSubmit">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <?php include "footer.php"; ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>