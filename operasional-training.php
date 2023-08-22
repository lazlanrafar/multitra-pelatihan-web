<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

if ($_SESSION['user_akses'] !== 'Operasional Training') {
    header('Location: index.php');
    exit();
}

require 'config/pelatihan-admin.php';

//pagination
//konfigurasi

$jumlahDataPerHalaman = 100;
$jumlahData = count(query('SELECT * FROM tabel_pelatihan'));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
$awalData = $jumlahDataPerHalaman * $halamanAktif - $jumlahDataPerHalaman;

$multi = query("SELECT * FROM tabel_pelatihan LIMIT $awalData, $jumlahDataPerHalaman");

$multi = query('SELECT * FROM tabel_pelatihan ORDER BY tanggal_mulai DESC');

//tombol pencarian
if (isset($_POST['cari'])) {
    $multi = cari($_POST['keyword']);
}

if (isset($_POST['filter_tanggal'])) {
    $multi = filterTanggal($_POST['tanggal_mulai'], $_POST['tanggal_selesai']);
}

if (isset($_POST['filter_status'])) {
    if (isset($_POST['status_kegiatan'])) {
        $multi = filterStatus($_POST['status_kegiatan']);
    } else {
        $multi = cari('');
    }
}
?>

<!doctype html>
<html lang="en">
<?php include 'partials/head.php'; ?>

<body>
    <div class="wrapper">
        <?php include 'partials/sidebar.php'; ?>

        <div class="main">
            <?php include 'partials/navbar.php'; ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3"><strong>Operasional Training</strong> Dashboard</h1>

                    <div class="text-right">
                        <H5 class="jam"> <span id="tanggalwaktu"></span></H5>
                        <h5>Jam : <b><span id="jam" style="font-size:1rem"></span></b></h5>
                    </div>


                    <br>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between gap-3">
                                <div class="col-3">
                                    <form action="" method="post">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="keyword"
                                                placeholder="Pencarian Nama Kegiatan" autofocus autocomplete="off">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit"
                                                    id="button-addon2" name="cari">
                                                    <i class="bi bi-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-4">
                                    <form action="index.php" method="post">
                                        <div class="d-flex justify-content-start gap-2">
                                            <div class="col-5">
                                                <input type="date" class="form-control" name="tanggal_mulai"
                                                    id="tanggal_mulai">
                                            </div>
                                            <div class="col-5">
                                                <input type="date" class="form-control" name="tanggal_selesai"
                                                    id="tanggal_selesai">
                                            </div>
                                            <div class="col-5">

                                                <button type="submit" class="btn btn-primary" name="filter_tanggal"
                                                    data-bs-target="#exampleModal">
                                                    <i class="bi bi-folder-plus"></i>Filter
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-3">
                                    <form action="" method="POST">
                                        <div class="d-flex justify-content-start">
                                            <div class="col-9" style="margin-right:10px;">
                                                <select class="form-select" aria-label="Default select example"
                                                    name="status_kegiatan" style="margin-left:10px;">
                                                    <option selected>Pilih</option>
                                                    <option value="Cancel">Cancel</option>
                                                    <option value="Estimate">Estimate</option>
                                                    <option value="Done">Done</option>
                                                    <option value="Running">Running</option>
                                                    <option value="Postpone">Postpone</option>
                                                    <option value="On Schedule">On Schedule</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="sampai_tanggal" class="form-label"></label>
                                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                                                    name="filter_status" data-bs-target="#exampleModal">
                                                    <i class="bi bi-folder-plus"></i>Filter
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-1">
                                    <a href="index.php" class="btn btn-danger">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive scroll">
                                <table class="table table-bordered mt-2" border="1" cellpadding="1" cellspacing="">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id</th>
                                            <th>Kegiatan</th>
                                            <th>Tgl Mulai</th>
                                            <th>Tgl Selesai</th>
                                            <th>Jumlah Peserta</th>
                                            <th>Status Kegiatan</th>
                                            <th>Tanggal Aktual Permohonan</th>
                                            <th>Tanggal Target Permohonan</th>
                                            <th>Permohonan Izin Pelatihan ke Teman K3</th>
                                            <th>Tanggal Aktual Input Peserta</th>
                                            <th>Tanggal Target Input Peserta</th>
                                            <th>Input Peserta</th>
                                            <th>Submit Data Peserta</th>
                                            <th>Keterangan</th>
                                            <th colspan="1">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($multi as $row) : ?>
                                        <tr align="center">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['nama_kegiatan']; ?></a></td>
                                            <td><?php echo $row['tanggal_mulai']; ?></td>
                                            <td><?php echo $row['tanggal_selesai']; ?></td>
                                            <td><?php echo $row['jumlah_peserta']; ?></td>
                                            <?php require 'partials/row-status-kegiatan.php'; ?>

                                            <td><?php echo $row['tgl_aktual_serti']; ?></td>
                                            <td><?php echo $row['tgl_target_serti']; ?></td>

                                            <?php require 'partials/row-pengajuan-sertifikat-internal.php'; ?>

                                            <td><?php echo $row['tgl_aktual_dok']; ?></td>
                                            <td><?php echo $row['tgl_target_dok']; ?></td>

                                            <?php require 'partials/row-dokumen-diterima.php'; ?>
                                            <?php require 'partials/row-status-dokumen.php'; ?>
                                            <?php require 'partials/row-keterangan.php'; ?>
                                            <td>
                                                <?php require 'components/operasional-form-update-pelatihan.php'; ?>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <?php if ($halamanAktif > 1) : ?>
                                        <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>">&laquo;</a>
                                        <?php endif; ?>

                                        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                        <?php if ($i == $halamanAktif) : ?>
                                        <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a>
                                        <?php else : ?>
                                        <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a>
                                        <?php endif; ?>
                                        <?php endfor; ?>

                                        <?php if ($halamanAktif < $jumlahHalaman) : ?>
                                        <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>">&raquo;</a>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </main>

            <?php include 'partials/footer.php'; ?>
        </div>
    </div>

    <?php include 'partials/script.php'; ?>
</body>

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

        return 'Over Schedule + ' . $differenceInDays;
    }
}
?>
