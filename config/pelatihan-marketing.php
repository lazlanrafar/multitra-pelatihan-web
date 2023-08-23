<?php
require 'pelatihan.php';

function createPelatihan($data)
{
    global $conn;
    $nama_kegiatan = htmlspecialchars($data['nama_kegiatan']);
    $tanggal_mulai = htmlspecialchars($data['tanggal_mulai']);
    $tanggal_selesai = htmlspecialchars($data['tanggal_selesai']);
    $jumlah_peserta = htmlspecialchars($data['jumlah_peserta']);
    $status_kegiatan = htmlspecialchars($data['status_kegiatan']);
    $keterangan = htmlspecialchars($data['keterangan']);
    $tgl_target_dok = date('Y-m-d', strtotime('+60 days', strtotime($tanggal_selesai)));
    $tgl_target_serti = date('Y-m-d', strtotime('+6 days', strtotime($tanggal_selesai)));
    $tgl_target_permohonan_izin = date('Y-m-d', strtotime('-5 days', strtotime($tanggal_mulai)));
    $tgl_target_input_peserta = date('Y-m-d', strtotime('-1 days', strtotime($tanggal_selesai)));
    $created_at = date('Y-m-d H:i:s');

    $query = "INSERT INTO tabel_pelatihan(nama_kegiatan, tanggal_mulai, tanggal_selesai, jumlah_peserta, status_kegiatan, keterangan, tgl_target_dok, tgl_target_serti, tgl_target_permohonan_izin, tgl_target_input_peserta, created_at)
    VALUES ('$nama_kegiatan', '$tanggal_mulai', '$tanggal_selesai', '$jumlah_peserta', '$status_kegiatan', '$keterangan', '$tgl_target_dok', '$tgl_target_serti', '$tgl_target_permohonan_izin', '$tgl_target_input_peserta', '$created_at')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updatePelatihan($data)
{
    global $conn;
    $id = $data['id'];
    $nama_kegiatan = htmlspecialchars($data['nama_kegiatan']);
    $tanggal_mulai = htmlspecialchars($data['tanggal_mulai']);
    $tanggal_selesai = htmlspecialchars($data['tanggal_selesai']);
    $jumlah_peserta = htmlspecialchars($data['jumlah_peserta']);
    $status_kegiatan = htmlspecialchars($data['status_kegiatan']);
    $keterangan = htmlspecialchars($data['keterangan']);
    $tgl_target_dok = date('Y-m-d', strtotime('+60 days', strtotime($tanggal_selesai)));
    $tgl_target_serti = date('Y-m-d', strtotime('+6 days', strtotime($tanggal_selesai)));
    $tgl_target_permohonan_izin = date('Y-m-d', strtotime('-5 days', strtotime($tanggal_mulai)));
    $tgl_target_input_peserta = date('Y-m-d', strtotime('-1 days', strtotime($tanggal_selesai)));

    $query = "UPDATE tabel_pelatihan
    SET nama_kegiatan = '$nama_kegiatan', tanggal_mulai = '$tanggal_mulai', tanggal_selesai = '$tanggal_selesai', jumlah_peserta = '$jumlah_peserta', status_kegiatan = '$status_kegiatan', keterangan = '$keterangan', tgl_target_dok = '$tgl_target_dok', tgl_target_serti = '$tgl_target_serti', tgl_target_permohonan_izin = '$tgl_target_permohonan_izin', tgl_target_input_peserta = '$tgl_target_input_peserta'
    WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
