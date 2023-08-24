<?php
require 'pelatihan.php';

function updatePelatihanAdmin($data)
{
    global $conn;
    $id = $data['id'];
    // $nama_kegiatan = htmlspecialchars($data['nama_kegiatan']);
    // $tanggal_mulai = htmlspecialchars($data['tanggal_mulai']);
    // $tanggal_selesai = htmlspecialchars($data['tanggal_selesai']);
    // $jumlah_peserta = htmlspecialchars($data['jumlah_peserta']);
    // $status_kegiatan = htmlspecialchars($data['status_kegiatan']);
    $tgl_aktual_serti = htmlspecialchars($data['tgl_aktual_serti']);
    $tgl_aktual_dok = htmlspecialchars($data['tgl_aktual_dok']);
    $status_dokumen = htmlspecialchars($data['status_dokumen']);
    $keterangan = htmlspecialchars($data['keterangan']);

    $pengajuan_sertifikat_internal = 'Done';
    $dokumen_diterima = 'Done';

    $pelatihan = query("SELECT * FROM tabel_pelatihan WHERE id = $id")[0];

    if ($tgl_aktual_serti > $pelatihan['tgl_target_serti']) {
        $overSchedule = strtotime($tgl_aktual_serti) - strtotime($pelatihan['tgl_target_serti']);
        $pengajuan_sertifikat_internal = 'Over Schedule' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';
    } else {
        $overSchedule = strtotime($tgl_aktual_serti) - strtotime($pelatihan['tgl_target_serti']);
        $pengajuan_sertifikat_internal = 'Done' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';
    }

    if ($tgl_aktual_dok > $pelatihan['tgl_target_dok']) {
        $overSchedule = strtotime($tgl_aktual_dok) - strtotime($pelatihan['tgl_target_dok']);
        $dokumen_diterima = 'Over Schedule' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';
    } else {
        $overSchedule = strtotime($tgl_aktual_dok) - strtotime($pelatihan['tgl_target_dok']);
        $dokumen_diterima = 'Done' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';
    }

    $query = "UPDATE tabel_pelatihan
    SET tgl_aktual_serti = '$tgl_aktual_serti', tgl_aktual_dok = '$tgl_aktual_dok', status_dokumen = '$status_dokumen', keterangan = '$keterangan' , pengajuan_sertifikat_internal = '$pengajuan_sertifikat_internal', dokumen_diterima = '$dokumen_diterima'
    WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
