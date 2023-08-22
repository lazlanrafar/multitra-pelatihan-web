<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

if ($_SESSION['user_akses'] !== 'Super Admin') {
    header('Location: index.php');
    exit();
}

require 'config/pelatihan.php';

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

// edit
if (isset($_POST['edit'])) {
    // cek apakah data berhasil diedit atau tidak
    if (edit($_POST) > 0) {
        echo "
          <script>
          alert('data berhasil diedit!');
          document.location.href = 'index.php';
          </script>
      ";
    } else {
        echo "
          <script>
          alert('data gagal diedit!');
          document.location.href = 'index.php';
          </script>
      ";
    }
}

// akhir edit

// tambah
if (isset($_POST['simpan'])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
          <script>
          alert('data berhasil ditambahkan!');
          document.location.href = 'index.php';
          </script>
      ";
    } else {
        echo "
          <script>
          alert('data gagal ditambahkan!');
          document.location.href = 'index.php';
          </script>
      ";
    }
}
// akhir tambah
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
                    <h1 class="h3 mb-3"><strong>Super Admin</strong> Dashboard</h1>

                    <div class="text-right">
                        <H5 class="jam"> <span id="tanggalwaktu"></span></H5>
                        <h5>Jam : <b><span id="jam" style="font-size:1rem"></span></b></h5>
                    </div>

                    <br>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <?php include 'partials/pelatihan-filter.php'; ?>
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
                                            <th>Permohonan Izin Pelatihan ke Teman K3</th>
                                            <th>Input Peserta</th>
                                            <th>Submit Data Peserta</th>
                                            <th>Pengajuan Sertifikat Internal </th>
                                            <th>Dokumen Diterima Dari Kemnaker</th>
                                            <th>Status Dokumen</th>
                                            <th>Keterangan</th>
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
                                            <?php require 'partials/row-permohonan-izin.php'; ?>
                                            <?php require 'partials/row-input-peserta.php'; ?>
                                            <?php require 'partials/row-submit-data-peserta.php'; ?>
                                            <?php require 'partials/row-pengajuan-sertifikat-internal.php'; ?>
                                            <?php require 'partials/row-dokumen-diterima.php'; ?>
                                            <?php require 'partials/row-status-dokumen.php'; ?>
                                            <?php require 'partials/row-keterangan.php'; ?>
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
