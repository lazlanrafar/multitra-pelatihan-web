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
    $tgl_target_serti = date('Y-m-d', strtotime('+6 days', strtotime($tgl_aktual_serti)));
    $tgl_aktual_dok = htmlspecialchars($data['tgl_aktual_dok']);
    $tgl_target_dok = date('Y-m-d', strtotime('+60 days', strtotime($tgl_aktual_dok)));
    $status_dokumen = htmlspecialchars($data['status_dokumen']);
    $keterangan = htmlspecialchars($data['keterangan']);

    $query = "UPDATE tabel_pelatihan
    SET tgl_aktual_serti = '$tgl_aktual_serti', tgl_target_serti = '$tgl_target_serti', tgl_aktual_dok = '$tgl_aktual_dok', tgl_target_dok = '$tgl_target_dok', status_dokumen = '$status_dokumen', keterangan = '$keterangan'
    WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
