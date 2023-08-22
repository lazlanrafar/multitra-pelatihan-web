<?php
require 'config.php';

function cari($keyword)
{
    $query = "SELECT * FROM tabel_pelatihan
    WHERE
    nama_kegiatan LIKE '%$keyword%'
    ";
    return query($query);
}

function filterTanggal($dari, $to)
{
    $query = "SELECT * FROM tabel_pelatihan
    WHERE
    tanggal_mulai between '$dari' AND '$to' OR tanggal_selesai between '$dari' AND '$to'
    ";
    return query($query);
}

function filterStatus($status)
{
    $query = "SELECT * FROM tabel_pelatihan
    WHERE
    status_kegiatan = '$status'
    ";
    return query($query);
}

function deletePelatihanById($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tabel_pelatihan WHERE id = $id");
    return mysqli_affected_rows($conn);
}
