<?php
require 'config.php';

$items = query('SELECT * FROM tabel_pelatihan ORDER BY created_at DESC');
$today = date('Y-m-d');

foreach ($items as $item) {
    $pengajuan_sertifikat_internal = 'On Progress'; // tgl_target_serti
    $dokumen_diterima = 'On Progress'; // tgl_target_dok
    $permohonan_izin_pelatihan = 'On Progress'; // tgl_target_permohonan_izin
    $input_peserta = 'On Progress'; // tgl_target_input_peserta

    if ($today > $item['tgl_target_serti']) {
        $overSchedule = strtotime($today) - strtotime($item['tgl_target_serti']);
        $pengajuan_sertifikat_internal = 'Over Schedule' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';
    }
    if ($today > $item['tgl_target_dok']) {
        $overSchedule = strtotime($today) - strtotime($item['tgl_target_dok']);
        $dokumen_diterima = 'Over Schedule' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';
    }
    if ($today > $item['tgl_target_permohonan_izin']) {
        $overSchedule = strtotime($today) - strtotime($item['tgl_target_permohonan_izin']);
        $permohonan_izin_pelatihan = 'Over Schedule' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';
    }
    if ($today > $item['tgl_target_input_peserta']) {
        $overSchedule = strtotime($today) - strtotime($item['tgl_target_input_peserta']);
        $input_peserta = 'Over Schedule' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';
    }

    $query = "UPDATE tabel_pelatihan
    SET pengajuan_sertifikat_internal = '$pengajuan_sertifikat_internal', dokumen_diterima = '$dokumen_diterima', permohonan_izin_pelatihan = '$permohonan_izin_pelatihan', input_peserta = '$input_peserta'
    WHERE id = $item[id]";

    mysqli_query($conn, $query);
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
