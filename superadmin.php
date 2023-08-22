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

require 'function.php';

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
                    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

                    <div class="text-right">
                        <H5 class="jam"> <span id="tanggalwaktu"></span></H5>
                        <h5>Jam : <b><span id="jam" style="font-size:1rem"></span></b></h5>
                    </div>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalFormTambahData">
                        Tambah Data <i class="bi bi-file-earmark-plus"></i>
                    </button>

                    <div class="modal fade" id="modalFormTambahData" tabindex="-1"
                        aria-labelledby="modalFormTambahDataLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalFormTambahDataLabel">Tambah Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="" method="post">

                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label class="form-label" for="nama_kegiatan">Nama Kegiatan </label>
                                            <Input class="form-control" type="text" name="nama_kegiatan"
                                                id="nama_kegiatan" required autocomplete="off">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="tanggal_mulai">Tanggal Mulai </label>
                                            <Input class="form-control" type="date" name="tanggal_mulai"
                                                id="tanggal_mulai" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="tanggal_selesai">Tanggal Selesai </label>
                                            <Input class="form-control" type="date" name="tanggal_selesai"
                                                id="tanggal_selesai" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="jumlah_peserta">Jumlah Peserta </label>
                                            <Input class="form-control" type="text" name="jumlah_peserta"
                                                id="jumlah_peserta" required autocomplete="off">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputPassword1"
                                                class="form-label">Status Kegiatan</label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="status_kegiatan">
                                                <option selected>Pilih</option>
                                                <option value="Cancel">Cancel</option>
                                                <option value="Estimate">Estimate</option>
                                                <option value="Done">Done</option>
                                                <option value="Running">Running</option>
                                                <option value="Postpone">Postpone</option>
                                                <option value="On Schedule">On Schedule</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="permohonan_izin">Permohonan Izin </label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="permohonan_izin" id="permohonan_izin">
                                                <option selected>Pilih</option>
                                                <option value="Done">Done</option>
                                                <option value="Not Yet">Not Yet</option>
                                                <option value="Over Schedule">Over Schedule</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="input_peserta">Input Peserta </label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="input_peserta">
                                                <option selected>Pilih</option>
                                                <option value="Done">Done</option>
                                                <option value="Late">Over Schedule</option>
                                                <option value="Not Yet">Not Yet</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="submit_data_peserta">Submit Data Peserta
                                            </label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="submit_data_peserta">
                                                <option selected>Pilih</option>
                                                <option value="Done">Done</option>
                                                <option value="Late">Over Schedule</option>
                                                <option value="Not Yet">Not Yet</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="pengajuan_sertifikat_internal">Pengajuan
                                                Sertifikat Internal </label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="pengajuan_sertifikat_internal">
                                                <option selected>Pilih</option>
                                                <option value="Done">Done</option>
                                                <option value="Late">Over Schedule</option>
                                                <option value="Not Yet">Not Yet</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="dokumen_diterima">Dokumen Diterima </label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="dokumen_diterima">
                                                <option selected>Pilih</option>
                                                <option value="Done">Done</option>
                                                <option value="On Progres">On Progress</option>
                                                <option value="Over Schedule">Over Schedule</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="status_dokumen">Status Dokumen </label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="status_dokumen">
                                                <option selected>Pilih</option>
                                                <option value="Done">Done</option>
                                                <option value="Proses Arsip">Proses Arsip</option>
                                                <option value="Proses Kemnaker">Proses Kemnaker</option>
                                                <option value="Siap Distribusi">Siap Distribusi</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="keterangan">Keterangan </label>
                                            <Input class="form-control" type="text" name="keterangan"
                                                id="keterangan" autocomplete="off">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="simpan" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
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
                                <table class="table table-bordered mt-2" border="1" cellpadding="1"
                                    cellspacing="">
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
                                            <th colspan="2">Aksi </th>
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
                                            <td>
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#editModalid<?php echo $row['id']; ?>">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>

                                                <div class="modal fade" id="editModalid<?php echo $row['id']; ?>"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Edit Data</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>

                                                            <form action="" method="post">
                                                                <div class="modal-body text-start">

                                                                    <input type="hidden" name="id"
                                                                        value="<?php echo $row['id']; ?>">

                                                                    <div class="mb-3">
                                                                        <label class="form-label text-start"
                                                                            for="nama_kegiatan">Nama Kegiatan </label>
                                                                        <Input class="form-control" type="text"
                                                                            name="nama_kegiatan" id="nama_kegiatan"
                                                                            required value="<?php echo $row['nama_kegiatan']; ?>">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label text-start"
                                                                            for="tanggal_mulai">Tanggal Mulai </label>
                                                                        <Input class="form-control" type="date"
                                                                            name="tanggal_mulai" id="tanggal_mulai"
                                                                            required value="<?php echo $row['tanggal_mulai']; ?>">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label text-start"
                                                                            for="tanggal_selesai">Tanggal Selesai
                                                                        </label>
                                                                        <Input class="form-control" type="date"
                                                                            name="tanggal_selesai"
                                                                            id="tanggal_selesai" required
                                                                            value="<?php echo $row['tanggal_selesai']; ?>">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label text-start"
                                                                            for="jumlah_peserta">Jumlah Peserta
                                                                        </label>
                                                                        <Input class="form-control" type="text"
                                                                            name="jumlah_peserta" id="jumlah_peserta"
                                                                            required value="<?php echo $row['jumlah_peserta']; ?>">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label"
                                                                            for="status_kegiatan"
                                                                            class="form-label">Status Kegiatan</label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            name="status_kegiatan"
                                                                            value="<?php echo $row['status_kegiatan']; ?>">
                                                                            <option selected><?php echo $row['status_kegiatan']; ?>
                                                                            </option>
                                                                            <option value="Cancel">Cancel</option>
                                                                            <option value="Estimate">Estimate</option>
                                                                            <option value="Done">Done</option>
                                                                            <option value="Running">Running</option>
                                                                            <option value="Postpone">Postpone</option>
                                                                            <option value="On Schedule">On Schedule
                                                                            </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label text-start"
                                                                            for="permohonan_izin">Permohonan Izin
                                                                        </label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            name="permohonan_izin">
                                                                            <option selected><?php echo $row['permohonan_izin']; ?>
                                                                            </option>
                                                                            <option value="Done">Done</option>
                                                                            <option value="Not Yet">Not Yet</option>
                                                                            <option value="Over Schedule">Over Schedule
                                                                            </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label text-start"
                                                                            for="input_peserta">Input Peserta </label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            name="input_peserta">
                                                                            <option selected><?php echo $row['input_peserta']; ?>
                                                                            </option>
                                                                            <option value="Done">Done</option>
                                                                            <option value="Late">Over Schedule
                                                                            </option>
                                                                            <option value="Not Yet">Not Yet</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3">

                                                                        <label class="form-label text-start"
                                                                            for="submit_data_peserta">Submit Data
                                                                            Peserta </label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            name="submit_data_peserta">
                                                                            <option selected><?php echo $row['submit_data_peserta']; ?>
                                                                            </option>
                                                                            <option value="Done">Done</option>
                                                                            <option value="Late">Over Schedule
                                                                            </option>
                                                                            <option value="Not Yet">Not Yet</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label text-start"
                                                                            for="pengajuan_sertifikat_internal">Pengajuan
                                                                            Sertifikat Internal </label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            name="pengajuan_sertifikat_internal">
                                                                            <option selected><?php echo $row['pengajuan_sertifikat_internal']; ?>
                                                                            </option>
                                                                            <option value="Done">Done</option>
                                                                            <option value="Late">Over Schedule
                                                                            </option>
                                                                            <option value="Not Yet">Not Yet</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3">

                                                                        <label class="form-label text-start"
                                                                            for="dokumen_diterima">Dokumen Diterima
                                                                        </label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            name="dokumen_diterima">
                                                                            <option selected><?php echo $row['dokumen_diterima']; ?>
                                                                            </option>
                                                                            <option value="Done">Done</option>
                                                                            <option value="On Progress">On Progress
                                                                            </option>
                                                                            <option value="Over Schedule">Over Schedule
                                                                            </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label text-start"
                                                                            for="status_dokumen">Status Dokumen
                                                                        </label>
                                                                        <select class="form-select"
                                                                            aria-label="Default select example"
                                                                            name="status_dokumen">
                                                                            <option selected><?php echo $row['status_dokumen']; ?>
                                                                            </option>
                                                                            <option value="Done">Done</option>
                                                                            <option value="Proses Arsip">Proses Arsip
                                                                            </option>
                                                                            <option value="Proses Kemnaker">Proses
                                                                                Kemnaker</option>
                                                                            <option value="Siap Distribusi">Siap
                                                                                Distribusi</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label class="form-label text-start">Keterangan
                                                                        </label>
                                                                        <textarea class="form-control" name="keterangan" cols="20" rows="5" autocomplete="off"><?php echo $row['keterangan']; ?></textarea>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" name="edit"
                                                                        class="btn btn-primary">Simpan</button>
                                                                </div>

                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#modalHapus<?php echo $row['id']; ?>">
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                                <div class="modal fade" id="modalHapus<?php echo $row['id']; ?>"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Anda Yakin Ingin Menghapus?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <a href="hapus.php?id=<?= $row['id'] ?>"
                                                                    type="submit" class="btn btn-danger">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
