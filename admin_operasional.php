<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require "function.php";

//pagination
//konfigurasi

$jumlahDataPerHalaman = 100;
$jumlahData = count(query("SELECT * FROM tabel_pelatihan"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$multi = query("SELECT * FROM tabel_pelatihan LIMIT $awalData, $jumlahDataPerHalaman");

$multi = query("SELECT * FROM tabel_pelatihan ORDER BY tanggal_mulai DESC");





//tombol pencarian
if (isset($_POST["cari"])) {
  $multi = cari($_POST["keyword"]);
}

if (isset($_POST["filter_tanggal"])) {
  $multi = filterTanggal($_POST["tanggal_mulai"], $_POST["tanggal_selesai"]);
}

if (isset($_POST["filter_status"])) {
  if (isset($_POST["status_kegiatan"])) {
    $multi = filterStatus($_POST["status_kegiatan"]);
  } else {
    $multi = cari('');
  }
}

// edit 
if (isset($_POST["edit"])) {

  // cek apakah data berhasil diedit atau tidak
  if (admin_edit($_POST) > 0) {
    echo "
          <script>
          alert('data berhasil diedit!');
          document.location.href = 'admin_operasional.php';
          </script>
      ";
  } else {
    echo "
          <script>
          alert('data gagal diedit!');
          document.location.href = 'admin_operasional.php';
          </script>
      ";
  }
}

// akhir edit 

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Admin Operasional</title>

  <link rel="stylesheet" type="text/css" href="sidebarstyle.css">
  <link rel="canonical" href="./style/dashboard/dashboard.css">


</head>
<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }
</style>


<!-- Custom styles for this template -->
<link href="dashboard.css" rel="stylesheet">
</head>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Multidasa</title>

</html>

<body>

  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
  </style>

  <!--  -->

  <!-- // -->



  <?php include('sidebar.php'); ?>


  <div id="content-area">
    <span style="font-size: 30px;cursor: pointer" onclick="openNav()">&#9776;</span>

    <div class="content-text">
      <main class="col-xl-12 px-md-4">
        <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center  pb-2 mb-3 border-bottom margin:-30px">
          <h1 style="margin-top:-10px; margin-left:10px;" class="h2">Admin Operasional</h1>
          <div class="btn-toolbar mb-2 mb-md-0">

            <html lang="en">

            <!-- Style CSS-->
            <style>
              img {
                margin-left: 1370px;
                margin-top: -120px;
              }
            </style>
            </head>

            <body>
              <p>
                <!-- Add the image -->
                <img src="Multidasa.png" alt="click here" height="100px" width="100px" />
              </p>
            </body>

            </html>

          </div>
        </div>

        <H5 class="jam"> <span id="tanggalwaktu"></span></H5>
        <script>
          var tw = new Date();
          if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
          else(a = tw.getTime());
          tw.setTime(a);
          var tahun = tw.getFullYear();
          var hari = tw.getDay();
          var bulan = tw.getMonth();
          var tanggal = tw.getDate();
          var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
          var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
          document.getElementById("tanggalwaktu").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] + " " + tahun;
        </script>

        <?php
        date_default_timezone_set("Asia/jakarta");
        ?>

        <h5>Jam : <b><span id="jam" style="font-size:24"></span></b></h5>

        <script type="text/javascript">
          window.onload = function() {
            jam();
          }

          function jam() {
            var e = document.getElementById('jam'),
              d = new Date(),
              h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            e.innerHTML = h + ':' + m + ':' + s;

            setTimeout('jam()', 1000);
          }

          function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
          }
        </script>

        <style>
          H5 {

            Color: black;
            Margin-Left: 900px;
            font-size: 20px;
            font-weight: bold;

          }

          .jam {
            color: black;
            Font-size: 20px;
            Font-weight: normal;
          }
        </style>

        <div class="d-flex justify-content-between" style="gap: 5px;">
          <div class="col-4">
            <form action="" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="Pencarian Nama Kegiatan" autofocus autocomplete="off">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="cari">
                    <i class="bi bi-search"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>

          <div class="col-4">
            <h5 style="text-align: center; margin-left:-30px; margin-top:-30px;">Filter Tanggal</h5>
            <form action="index.php" method="post">
              <div class="d-flex justify-content-start" style="gap: 5px;">
                <div class="col-5">
                  <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai">
                </div>
                <div class="col-5">
                  <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai">
                </div>
                <div class="col-5">

                  <button type="submit" class="btn btn-primary" name="filter_tanggal" data-bs-target="#exampleModal">
                    <i class="bi bi-folder-plus"></i>Filter
                  </button>
                </div>
              </div>
            </form>
          </div>

          <div class="col-4">
            <form action="" method="POST">
              <div class="d-flex justify-content-start">
                <div class="col-6" style="margin-right:10px;">
                  <select class="form-select" aria-label="Default select example" name="status_kegiatan" style="margin-left:10px;">
                    <option selected>Pilih</option>
                    <option value="Cancel">Cancel</option>
                    <option value="Estimate">Estimate</option>
                    <option value="Done">Done</option>
                    <option value="Running">Running</option>
                    <option value="Postpone">Postpone</option>
                    <option value="On Schedule">On Schedule</option>
                  </select>
                </div>
                <div class="col-4">
                  <label for="sampai_tanggal" class="form-label"></label>
                  <button type="submit" class="btn btn-primary" data-bs-toggle="modal" name="filter_status" data-bs-target="#exampleModal">
                    <i class="bi bi-folder-plus"></i>Filter
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="table-responsive; scroll">
          <table class="table table-bordered mt-2" border="3" cellpadding="1" cellspacing="" width="100px" ; style="margin-top:-100px;">
            <thead border="4">

              <style>
                .table {
                  text-align: left;
                  position: relative;
                  margin-top: auto;
                }

                tr {
                  text-align: center;

                }

                th {
                  position: sticky;
                  background: white;
                  color: black;
                  top: 0;

                }

                .scroll {
                  height: 500px;
                  overflow: scroll;
                }
              </style>


              <tr align="center" border="4">
                <th style="font-size:11px; vertical-align:center; background-color:white">No</th>
                <th style="font-size:11px; background-color:white">Id</th>
                <th href="registrasi.php" style="font-size:11px; vertical-align:center; background-color:white">Kegiatan</th>
                <th style="font-size:11px; background-color:white;">Tgl Mulai</th>
                <th style="font-size:11px; background-color:white">Tgl Selesai</th>
                <th style="font-size:11px; background-color:white">Jumlah Peserta</th>
                <th style="font-size:11px; background-color:white">Status Kegiatan</th>
                <th style="font-size:11px; background-color:white">Tanggal Aktual Sertifikat</th>
                <th style="font-size:11px; background-color:white">Tanggal Target Sertifikat</th>
                <th style="font-size:11px; background-color:white">Pengajuan Sertifikat Internal</th>
                <th style="font-size:11px; background-color:white">Tanggal Aktual Dokumen</th>
                <th style="font-size:11px; background-color:white">Tanggal Target Dokumen</th>
                <th style="font-size:11px; background-color:white">Dokumen Diterima Dari Kemnaker</th>
                <th style="font-size:11px; background-color:white">Status Dokumen</th>
                <th style="font-size:11px; background-color:white">Keterangan</th>
                <th style="font-size:11px; background-color:white" colspan="1">Aksi</th>
              </tr>


            </thead>
            <tbody>


              <?php $i = 1; ?>
              <?php foreach ($multi as $row) : ?>
                <tr align="center">
                  <td style="font-size:13px;"><?php echo $i; ?></td>
                  <td style="font-size:13px;"><?php echo $row["id"]; ?></td>
                  <td style="font-size:13px;"><?php echo $row["nama_kegiatan"]; ?></a></td>
                  <td style="font-size:13px;"><?php echo  date('d M y', strtotime($row["tanggal_mulai"])); ?></td>
                  <td style="font-size:13px;"><?php echo date('d M y', strtotime($row["tanggal_selesai"])); ?></td>
                  <td style="font-size:13px;"><?php echo $row["jumlah_peserta"]; ?></td>

                  <?php if ($row["status_kegiatan"] === 'Running') : ?>
                    <td style="font-size:13px; color:blue" class="text-blue">
                      <?php echo $row["status_kegiatan"]; ?>
                    </td>

                  <?php elseif ($row["status_kegiatan"] === 'Postpone') : ?>
                    <td style="font-size:13px;" class="text-warning">
                      <?php echo $row["status_kegiatan"]; ?>
                    </td>

                  <?php elseif ($row["status_kegiatan"] === 'Cancel') : ?>
                    <td style="font-size:13px;" class="text-danger">
                      <?php echo $row["status_kegiatan"]; ?>
                    </td>

                  <?php elseif ($row["status_kegiatan"] === 'Done') : ?>
                    <td style="font-size:13px;" class="text-gray">
                      <?php echo $row["status_kegiatan"]; ?>
                    </td>

                  <?php elseif ($row["status_kegiatan"] === 'On Schedule') : ?>
                    <td style="font-size:13px;" class="text-success">
                      <?php echo $row["status_kegiatan"]; ?>
                    </td>

                  <?php elseif ($row["status_kegiatan"] === 'Estimate') : ?>
                    <td style="font-size:13px;" class="text-purple">
                      <?php echo $row["status_kegiatan"]; ?>
                    </td>

                  <?php else : ?>
                    <td style="font-size:13px;" class="bg-danger text-white">
                      <?php echo $row["status_kegiatan"]; ?>
                    </td>
                  <?php endif ?>

                  <!-- <td style="font-size:13px;"><?php echo date('d M y',strtotime($row["tgl_aktual_serti"]));?></td> -->
                  <td style="font-size:13px;"><?php (($row["tgl_target_serti"])); 
                  $today = ($row["tanggal_selesai"]);
                  $sixDays = date ("d M y", strtotime ($today ."+6 days"));
                  echo $sixDays;
                  ?></td>

                  <td style="font-size:13px;"><?php echo (isset($row['tgl_aktual_serti'])) ? date('d M y', strtotime($row["tgl_aktual_serti"])) : ''; ?></td> 
                    <td style="font-size:13px;" class="bg-danger text-white">
                      <?php echo getStatus($row['tgl_aktual_serti'], $row['tgl_target_serti']) ?>
                    </td>

                    <td style="font-size:13px;"><?php echo date('d M y',strtotime($row["tgl_aktual_dok"]));?></td>
                    <td style="font-size:13px;"><?php (($row["tgl_target_dok"])); 
                      $today = ($row["tanggal_selesai"]);
                      $sixtyDays = date ("d M y", strtotime ($today ."+60 days"));
                      echo $sixtyDays;
                    ?></td>

                  <?php if ($row["dokumen_diterima"] === 'Done') : ?>
                    <td style="font-size:13px;" class="text-success">
                      <?php echo $row["dokumen_diterima"]; ?>
                    </td>

                  <?php elseif ($row["dokumen_diterima"] === 'On Progress') : ?>
                    <td style="font-size:13px;" class="text-warning">
                      <?php echo $row["dokumen_diterima"]; ?>
                    </td>

                  <?php elseif ($row["dokumen_diterima"] === 'Over Schedule') : ?>
                    <td style="font-size:13px;" class="text-danger">
                      <?php echo $row["dokumen_diterima"]; ?>
                    </td>

                  <?php else : ?>
                    <td style="font-size:13px;" class="bg-danger text-white">
                      <?php echo $row["dokumen_diterima"]; ?>
                    </td>
                  <?php endif ?>

                  


                  <?php if ($row["status_dokumen"] === 'Done') : ?>
                    <td style="font-size:13px;" class="text-success">
                      <?php echo $row["status_dokumen"]; ?>
                    </td>

                  <?php elseif ($row["status_dokumen"] === 'Proses Arsip') : ?>
                    <td style="font-size:13px;">
                      <?php echo $row["status_dokumen"]; ?>
                    </td>

                  <?php elseif ($row["status_dokumen"] === 'Proses Kemnaker') : ?>
                    <td style="font-size:13px;">
                      <?php echo $row["status_dokumen"]; ?>
                    </td>

                  <?php elseif ($row["status_dokumen"] === 'Siap Distribusi') : ?>
                    <td style="font-size:13px;">
                      <?php echo $row["status_dokumen"]; ?>
                    </td>

                  <?php else : ?>
                    <td style="font-size:13px;" class="bg-danger text-white">
                      <?php echo $row["status_dokumen"]; ?>
                    </td>
                  <?php endif ?>

                  <!-- Button trigger modal -->
                  <td style="font-size:13px;"><button type="button" class="btn <?= (!$row['keterangan']) ? 'btn-primary' : 'btn-warning' ?>" data-bs-toggle="modal" data-bs-target="#cekModal<?php echo $row["id"]; ?>">
                  <i class="bi bi-eye-fill"></i>
                    </button></td>





                  <!-- Modal -->
                  <div class="modal fade" id="cekModal<?php echo $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Keterangan</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post">

                          <div class="modal-body">

                            <!--  -->
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                            <div class="mb-3">
                              <label class="form-label text-start" for="keterangan">Catatan </label>
                              <textarea class="form-control" type="text" cols="20" rows="5" disabled name="keterangan" id="keterangan" required autocomplete="off"><?php echo $row["keterangan"]; ?></textarea>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- <button type="submit" name="simpan" class="btn btn-primary">Save changes</button> -->
                          </div>
                        </form>

                      </div>
                    </div>
                  </div>
                  <!-- <div class="modal fade" id="cekModal<?php echo $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fs-5" id="exampleModalLabel">Keterangan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="post">
                          <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                          <div class="mb-3">
                                <label class="form-label text-start" for="keterangan">Catatan </label>
                                <textarea class="form-control" type="text" cols="20" rows="5" disabled name="keterangan" id="keterangan" required autocomplete="off"><?php echo $row["keterangan"]; ?></textarea>
                          </div>

                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
        </div>
    </div>
  </div>
  </div>

  <td>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModalid<?php echo $row["id"]; ?>">
      <i class="bi bi-pencil-square"></i>
    </button>




    <!-- Modal -->
    <div class="modal fade" id="editModalid<?php echo $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="" method="post">
            <div class="modal-body text-start">

              <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">

              <div class="mb-3">
                <label class="form-label text-start" for="nama_kegiatan">Nama Kegiatan </label>
                <Input class="form-control" type="text" name="nama_kegiatan" id="nama_kegiatan" required disabled value="<?php echo $row["nama_kegiatan"]; ?>">
              </div>

              <div class="mb-3">
                <label class="form-label text-start" for="tanggal_mulai">Tanggal Mulai </label>
                <Input class="form-control" type="date" name="tanggal_mulai" id="tanggal_mulai" required disabled value="<?php echo $row["tanggal_mulai"]; ?>">
              </div>

              <div class="mb-3">
                <label class="form-label text-start" for="tanggal_selesai">Tanggal Selesai </label>
                <Input class="form-control" type="date" name="tanggal_selesai" id="tanggal_selesai" required disabled value="<?php echo $row["tanggal_selesai"]; ?>">
              </div>

              <div class="mb-3">
                <label class="form-label text-start" for="jumlah_peserta">Jumlah Peserta </label>
                <Input class="form-control" type="text" name="jumlah_peserta" id="jumlah_peserta" required disabled value="<?php echo $row["jumlah_peserta"]; ?>">
              </div>

              <div class="mb-3">
                <label class="form-label" for="status_kegiatan" class="form-label">Status Kegiatan</label>
                <select class="form-select" aria-label="Default select example" name="status_kegiatan" disabled value="<?php echo $row["status_kegiatan"]; ?>">
                  <option selected><?php echo $row["status_kegiatan"]; ?></option>
                  <option value="Cancel">Cancel</option>
                  <option value="Estimate">Estimate</option>
                  <option value="Done">Done</option>
                  <option value="Running">Running</option>
                  <option value="Postpone">Postpone</option>
                  <option value="On Schedule">On Schedule</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label text-start" for="tgl_aktual_serti">Tanggal Aktual Sertifikat </label>
                <Input class="form-control" type="date" name="tgl_aktual_serti" id="tgl_aktual_serti" required value="<?php echo $row["tgl_aktual_serti"]; ?>">
              </div>

              <div class="mb-3">
                <label class="form-label text-start" for="tgl_aktual_dok">Tanggal Aktual Dokumen </label>
                <Input class="form-control" type="date" name="tgl_aktual_dok" id="tgl_aktual_dok" required value="<?php echo $row["tgl_aktual_dok"]; ?>">
              </div>

              <div class="mb-3">
                <label class="form-label text-start" for="status_dokumen">Status Dokumen </label>
                <select class="form-select" aria-label="Default select example" name="status_dokumen">
                  <option selected><?php echo $row["status_dokumen"]; ?></option>
                  <option value="Done">Done</option>
                  <option value="Proses Arsip">Proses Arsip</option>
                  <option value="Proses Kemnaker">Proses Kemnaker</option>
                  <option value="Siap Distribusi">Siap Distribusi</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label text-start">Keterangan </label>
                <textarea class="form-control" name="keterangan" cols="20" rows="5" autocomplete="off"><?php echo $row["keterangan"]; ?></textarea>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
            </div>

          </form>

        </div>
      </div>
    </div>







    <?php $i++; ?>
  <?php endforeach; ?>
  </tbody>
  </table>


  <nav aria-label="...">
    <ul class="pagination">
      <li class="page-item">
        <?php if ($halamanAktif > 1) : ?>
          <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
          <?php if ($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
          <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
          <?php endif; ?>
        <?php endfor; ?>

        <?php if ($halamanAktif < $jumlahHalaman) : ?>
          <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
        <?php endif; ?>
        </div>
        </main>
        </div>
        </div>
      </li>
    </ul>
  </nav>

</body>

<footer>
  <div class="container">
    <style>
      footer {
        background-color: grey;
        color: white;
        padding: 0.3rem;
        text-align: center;
        margin-top: auto;

      }
    </style>
    <span>Develop by : Litbang</span>
  </div>
</footer>

</html>
<?php

function getStatus($aktual, $target)
{
  if ($aktual == null) {
    return 'On Progress';
  }
  if (date('d M y', strtotime($aktual)) < date('d M y', strtotime($target))) {
    return 'Done';
  }
  $aktualTimestamp = strtotime(date('d M y', strtotime($aktual)));
  $targetTimestamp = strtotime(date('d M y', strtotime($target)));

  if ($aktualTimestamp > $targetTimestamp) {
    $differenceInSeconds = $aktualTimestamp - $targetTimestamp;
    $differenceInDays = floor($differenceInSeconds / (60 * 60 * 24));

    return "Over Schedule + " . $differenceInDays;
  }
}
?>