<?php
include('lib/dbconnection.php');
error_reporting(0);
require 'lang.php';

// Query untuk menampilkan data dari tabel senjata
$selectSenjataQuery = "SELECT * FROM tmploadcell";
$sql = mysqli_query($conn, $selectSenjataQuery);

$no = 0;
?>

<main id="main" class="main">

   <div class="pagetitle">
      <h1><?= __('Data Senjata') ?></h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item"><?= __('Halaman') ?></li>
            <li class="breadcrumb-item active"><?= __('Data Senjata') ?></li>
         </ol>
      </nav>
   </div><!-- End Page Title -->

   <section class="section dashboard">
      <div class="row">

         <!-- Left side columns -->
         <div class="col">
            <div class="row">

               <!-- Recent -->
               <div class="col-12">
                  <div class="card recent-sales overflow-auto">

                     <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                           <li class="dropdown-header text-start">
                              <h6>Filter</h6>
                           </li>

                           <li><a class="dropdown-item" href="#"><?= __('Hari ini') ?></a></li>
                           <li><a class="dropdown-item" href="#"><?= __('Bulan ini') ?></a></li>
                           <li><a class="dropdown-item" href="#"><?= __('Tahun ini') ?></a></li>
                        </ul>
                     </div>

                     <div class="card-body">
                        <h5 class="card-title"><?= _('Data Senjata') ?> <span>| <?= _('Hari ini') ?></span></h5>

                        <table class="table table-borderless datatable">
                           <thead>
                              <tr>
                                 <th scope="col">No</th>
                                 <th scope="col"><?= __('ID Senjata') ?></th>
                                 <th scope="col"><?= __('Status') ?></th>
                                 <th scope="col"><?= __('Berat') ?></th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <?php
                                 while ($row = mysqli_fetch_array($sql)) {
                                    $no++;
                                 ?>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['id_senjata']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td><?php echo $row['berat']; ?></td>
                              </tr>
                           <?php
                                 }
                           ?>
                           </tbody>
                        </table>
                     </div>

                  </div>
               </div><!-- End Recent -->

            </div>
         </div><!-- End Left side columns -->

      </div>
   </section>

</main><!-- End #main -->
<?php
mysqli_close($conn);
?>