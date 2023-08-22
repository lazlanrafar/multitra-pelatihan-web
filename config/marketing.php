<?php
require 'config.php';

function createPelatihan($data)
{
    global $conn;
    $nama_kegiatan = htmlspecialchars($data['nama_kegiatan']);
    $tanggal_mulai = htmlspecialchars($data['tanggal_mulai']);
    $tanggal_selesai = htmlspecialchars($data['tanggal_selesai']);
    $jumlah_peserta = htmlspecialchars($data['jumlah_peserta']);
    $status_kegiatan = htmlspecialchars($data['status_kegiatan']);
    $keterangan = htmlspecialchars($data['keterangan']);

    $query = "INSERT INTO tabel_pelatihan(id, nama_kegiatan, tanggal_mulai, tanggal_selesai, jumlah_peserta, status_kegiatan, keterangan)
    VALUES('', '$nama_kegiatan', '$tanggal_mulai', '$tanggal_selesai', '$jumlah_peserta', '$status_kegiatan', '$keterangan')";

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

    $query = "UPDATE tabel_pelatihan
    SET nama_kegiatan = '$nama_kegiatan', tanggal_mulai = '$tanggal_mulai', tanggal_selesai = '$tanggal_selesai', jumlah_peserta = '$jumlah_peserta', status_kegiatan = '$status_kegiatan', keterangan = '$keterangan'
    WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
