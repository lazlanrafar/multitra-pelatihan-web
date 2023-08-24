<?php
require 'pelatihan.php';

function updatePelatihanOperasional($data)
{
    global $conn;
    $id = $data['id'];
    $tgl_aktual_permohonan_izin = htmlspecialchars($data['tgl_aktual_permohonan_izin']);
    $tgl_aktual_input_peserta = htmlspecialchars($data['tgl_aktual_input_peserta']);
    $submit_data_peserta = htmlspecialchars($data['submit_data_peserta']);
    $keterangan = htmlspecialchars($data['keterangan']);

    $permohonan_izin_pelatihan = 'Done';
    $input_peserta = 'Done';

    $pelatihan = query("SELECT * FROM tabel_pelatihan WHERE id = $id")[0];

    if ($tgl_aktual_permohonan_izin > $pelatihan['tgl_target_permohonan_izin']) {
        $overSchedule = strtotime($tgl_aktual_permohonan_izin) - strtotime($pelatihan['tgl_target_permohonan_izin']);
        $permohonan_izin_pelatihan = 'Over Schedule' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';
    } else {
        $overSchedule = strtotime($tgl_aktual_permohonan_izin) - strtotime($pelatihan['tgl_target_permohonan_izin']);
        $permohonan_izin_pelatihan = 'Done' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';
    }

    if ($tgl_aktual_input_peserta > $pelatihan['tgl_target_input_peserta']) {
        $overSchedule = strtotime($tgl_aktual_input_peserta) - strtotime($pelatihan['tgl_target_input_peserta']);
        $input_peserta = 'Over Schedule' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';
    } else {
        $overSchedule = strtotime($tgl_aktual_input_peserta) - strtotime($pelatihan['tgl_target_input_peserta']);
        $input_peserta = 'Done' . ' ' . floor($overSchedule / (60 * 60 * 24)) . ' ' . 'Day';
    }

    $query = "UPDATE tabel_pelatihan
    SET tgl_aktual_permohonan_izin = '$tgl_aktual_permohonan_izin', tgl_aktual_input_peserta = '$tgl_aktual_input_peserta', submit_data_peserta = '$submit_data_peserta', keterangan = '$keterangan' , permohonan_izin_pelatihan = '$permohonan_izin_pelatihan', input_peserta = '$input_peserta'
    WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
