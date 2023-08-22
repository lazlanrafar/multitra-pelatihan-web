<?php
date_default_timezone_set('Asia/jakarta');
$conn = mysqli_connect("localhost", "root", "", "multitra_multidasa");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function cari($keyword){
    $query = "SELECT * FROM tabel_pelatihan
    WHERE
    nama_kegiatan LIKE '%$keyword%'
    ";
    return query($query);
}

function filterTanggal($dari, $to){
    $query = "SELECT * FROM tabel_pelatihan
    WHERE
    tanggal_mulai between '$dari' AND '$to' OR tanggal_selesai between '$dari' AND '$to'
    ";
    return query($query);
}

function filterStatus($status){
    $query = "SELECT * FROM tabel_pelatihan
    WHERE
    status_kegiatan = '$status'
    ";
    return query($query);
}