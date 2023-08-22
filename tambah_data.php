<?php 

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require "function.php";

//cek apakah tombol submit sudah ditekan atau belum//

?>





<!doctype html>
<html>
<head>
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama_kegiatan">Nama Kegiatan : </label>
                <Input type="text" name="nama_kegiatan" id="nama_kegiatan" required>
            </li>

            <li>
                <label for="tanggal_mulai">Tanggal Mulai : </label>
                <Input type="text" name="tanggal_mulai" id="tanggal_mulai" required>
            </li>

            <li>
                <label for="tanggal_selesai">Tanggal Selesai : </label>
                <Input type="text" name="tanggal_selesai" id="tanggal_selesai" required>
            </li>

           <div class="mb-3">
              <label for="status_kegiatan" class="form-label">Status Kegiatan</label>
              <select class="form-select" aria-label="Default select example" name="status_kegiatan">
                <option selected>Pilih</option>
                <option value="1">Running</option>
                <option value="2">Postpone</option>
                <option value="3">Cancel</option>
              </select>
            </div>

            <li>
                <label for="permohonan_izin">Permohonan Izin : </label>
                <Input type="text" name="permohonan_izin" id="permohonan_izin" required>
            </li>

            <li>
                <label for="sistem_input">Sistem Input : </label>
                <Input type="text" name="sistem_input" id="sistem_input" required>
            </li>

            <li>
                <label for="submit_data_peserta">Submit Data Peserta : </label>
                <Input type="text" name="submit_data_peserta" id="submit_data_peserta" required>
            </li>

            <li>
                <label for="pengajuan_sertifikat_internal">Pengajuan Sertifikat Internal : </label>
                <Input type="text" name="pengajuan_sertifikat_internal" id="pengajuan_sertifikat_internal" required>
            </li>

            <li>
                <label for="dokumen_diterima">Dokumen Diterima : </label>
                <Input type="text" name="dokumen_diterima" id="dokumen_diterima" required>
            </li>

            <li>
                <label for="pengarsipan_dokumen">Pengarsipan Dokumen : </label>
                <Input type="text" name="pengarsipan_dokumen" id="pengarsipan_dokumen" required>
            </li>

            <li>
                <label for="pendistribusian_dokumen">Pendistribusian Dokumen : </label>
                <Input type="text" name="pendistribusian_dokumen" id="pendistribusian_dokumen" required>
            </li>

            <li>
              <button type="submit" name="submit">Tambah Data!</button>
            </li>


        </ul>
    </form>
</body>
</html>


