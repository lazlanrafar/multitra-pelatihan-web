<?php
require 'config.php';

$items = query('SELECT * FROM tabel_pelatihan ORDER BY created_at DESC');
$today = date('Y-m-d');

foreach ($items as $item) {
    $pengajuan_sertifikat_internal = 'On Progress'; // tgl_target_serti
    $dokumen_diterima = 'On Progress'; // tgl_target_dok
    $permohonan_izin_pelatihan = 'On Progress'; // tgl_target_permohonan_izin
    $input_peserta = 'On Progress'; // tgl_target_input_peserta

    if ($today > $item['tgl_target_serti'] && $item['tgl_aktual_serti'] == 0) {
        $overSchedule = strtotime($today) - strtotime($item['tgl_target_serti']);
        $pengajuan_sertifikat_internal = 'Over Schedule' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';

        mysqli_query($conn, "UPDATE tabel_pelatihan SET pengajuan_sertifikat_internal = '$pengajuan_sertifikat_internal' WHERE id = $item[id]");
    }

    if ($today > $item['tgl_target_dok'] && $item['tgl_aktual_dok'] == 0) {
        $overSchedule = strtotime($today) - strtotime($item['tgl_target_dok']);
        $dokumen_diterima = 'Over Schedule' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';

        mysqli_query($conn, "UPDATE tabel_pelatihan SET dokumen_diterima = '$dokumen_diterima' WHERE id = $item[id]");
    }

    if ($today > $item['tgl_target_permohonan_izin'] && $item['tgl_aktual_permohonan_izin'] == 0) {
        $overSchedule = strtotime($today) - strtotime($item['tgl_target_permohonan_izin']);
        $permohonan_izin_pelatihan = 'Over Schedule' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';

        mysqli_query($conn, "UPDATE tabel_pelatihan SET permohonan_izin_pelatihan = '$permohonan_izin_pelatihan' WHERE id = $item[id]");
    }

    if ($today > $item['tgl_target_input_peserta'] && $item['tgl_aktual_input_peserta'] == 0) {
        $overSchedule = strtotime($today) - strtotime($item['tgl_target_input_peserta']);
        $input_peserta = 'Over Schedule' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';

        mysqli_query($conn, "UPDATE tabel_pelatihan SET input_peserta = '$input_peserta' WHERE id = $item[id]");
    }
}

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
