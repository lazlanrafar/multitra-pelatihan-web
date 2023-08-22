<?php 
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require "function.php";

//ambil data di url
$id = $_GET["id"];
// query data tabel_pelatihan berdasarkan id
$mhs = query("SELECT * FROM tabel_pelatihan WHERE id =$id")[0];

//cek apakah tombol submit sudah ditekan atau belum//
if (isset($_POST["submit"])) {

    // cek apakah data berhasil diedit atau tidak
    if (edit($_POST) > 0 ) {
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
?>





<!doctype html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
        <ul>
            <li>
                <label for="nama_kegiatan">Nama Kegiatan : </label>
                <Input type="text" name="nama_kegiatan" id="nama_kegiatan" required value="<?php echo $mhs["nama_kegiatan"]; ?>">
            </li>

            <li>
                <label for="tanggal_mulai">Tanggal Mulai : </label>
                <Input type="text" name="tanggal_mulai" id="tanggal_mulai" required value="<?php echo $mhs["tanggal_mulai"]; ?>">
            </li>

            <li>
                <label for="tanggal_selesai">Tanggal Selesai : </label>
                <Input type="text" name="tanggal_selesai" id="tanggal_selesai" required value="<?php echo $mhs["tanggal_selesai"]; ?>">
            </li>

            <li>
                <label for="tanggal_selesai">Jumlah Peserta : </label>
                <Input type="text" name="jumlah_peserta" id="jumlah_peserta" required value="<?php echo $mhs["jumlah_peserta"]; ?>">
            </li>

            <li>
                <label for="status_kegiatan">Status Kegiatan : </label>
                <Input type="text" name="status_kegiatan" id="status_kegiatan" value="<?php echo $mhs["status_kegiatan"]; ?>">
            </li>

            <li>
                <label for="permohonan_izin">Permohonan Izin : </label>
                <Input type="text" name="permohonan_izin" id="permohonan_izin" value="<?php echo $mhs["permohonan_izin"]; ?>">
            </li>

            <li>
                <label for="sistem_input">Sistem Input : </label>
                <Input type="text" name="sistem_input" id="sistem_input" value="<?php echo $mhs["sistem_input"]; ?>">
            </li>

            <li>
                <label for="submit_data_peserta">Submit Data Peserta : </label>
                <Input type="text" name="submit_data_peserta" id="submit_data_peserta" value="<?php echo $mhs["submit_data_peserta"]; ?>">
            </li>

            <li>
                <label for="pengajuan_sertifikat_internal">Pengajuan Sertifikat Internal : </label>
                <Input type="text" name="pengajuan_sertifikat_internal" id="pengajuan_sertifikat_internal" value="<?php echo $mhs["pengajuan_sertifikat_internal"]; ?>">
            </li>

            <li>
                <label for="dokumen_diterima">Dokumen Diterima : </label>
                <Input type="text" name="dokumen_diterima" id="dokumen_diterima" value="<?php echo $mhs["dokumen_diterima"]; ?>">
            </li>

            <li>
                <label for="pengarsipan_dokumen">Pengarsipan Dokumen : </label>
                <Input type="text" name="pengarsipan_dokumen" id="pengarsipan_dokumen" value="<?php echo $mhs["pengarsipan_dokumen"]; ?>">
            </li>

            <li>
                <label for="pendistribusian_dokumen">Pendistribusian Dokumen : </label>
                <Input type="text" name="pendistribusian_dokumen" id="pendistribusian_dokumen" value="<?php echo $mhs["pendistribusian_dokumen"]; ?>">
            </li>

            <li>
              <button type="submit" name="submit">Edit Data!</button>
            </li>


        </ul>
    </form>
</body>
</html>
