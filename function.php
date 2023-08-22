<?php
date_default_timezone_set('Asia/jakarta');
$conn = mysqli_connect('localhost', 'root', '', 'multitra_multidasa');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $nama_kegiatan = htmlspecialchars($data['nama_kegiatan']);
    $tanggal_mulai = htmlspecialchars($data['tanggal_mulai']);
    $tanggal_selesai = htmlspecialchars($data['tanggal_selesai']);
    $jumlah_peserta = htmlspecialchars($data['jumlah_peserta']);
    $status_kegiatan = htmlspecialchars($data['status_kegiatan']);
    $permohonan_izin = htmlspecialchars($data['permohonan_izin']);
    $input_peserta = htmlspecialchars($data['input_peserta']);
    $submit_data_peserta = htmlspecialchars($data['submit_data_peserta']);
    $tgl_aktual_serti = htmlspecialchars($data['tgl_aktual_serti']);
    $tgl_target_serti = htmlspecialchars($data['tgl_target_serti']);
    $pengajuan_sertifikat_internal = htmlspecialchars($data['pengajuan_sertifikat_internal']);
    $tgl_aktual_dok = htmlspecialchars($data['tgl_aktual_dok']);
    $tgl_target_dok = htmlspecialchars($data['tgl_target_dok']);
    $dokumen_diterima = htmlspecialchars($data['dokumen_diterima']);
    $status_dokumen = htmlspecialchars($data['status_dokumen']);
    $keterangan = htmlspecialchars($data['keterangan']);

    $query = "INSERT INTO tabel_pelatihan
            values
            ('', '$nama_kegiatan', '$tanggal_mulai', '$tanggal_selesai', '$jumlah_peserta', '$status_kegiatan', '$permohonan_izin', '$input_peserta', '$submit_data_peserta','$tgl_aktual_serti', '$tgl_target_serti', '$pengajuan_sertifikat_internal', '$tgl_aktual_dok', '$tgl_target_dok', '$dokumen_diterima', '$status_dokumen', '$keterangan')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tabel_pelatihan WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;
    $id = $data['id'];
    $nama_kegiatan = htmlspecialchars($data['nama_kegiatan']);
    $tanggal_mulai = htmlspecialchars($data['tanggal_mulai']);
    $tanggal_selesai = htmlspecialchars($data['tanggal_selesai']);
    $jumlah_peserta = htmlspecialchars($data['jumlah_peserta']);
    $status_kegiatan = htmlspecialchars($data['status_kegiatan']);
    $permohonan_izin = htmlspecialchars($data['permohonan_izin']);
    $input_peserta = htmlspecialchars($data['input_peserta']);
    $submit_data_peserta = htmlspecialchars($data['submit_data_peserta']);
    $pengajuan_sertifikat_internal = htmlspecialchars($data['pengajuan_sertifikat_internal']);
    $dokumen_diterima = htmlspecialchars($data['dokumen_diterima']);
    $status_dokumen = htmlspecialchars($data['status_dokumen']);
    $keterangan = htmlspecialchars($data['keterangan']);
    $query = "UPDATE tabel_pelatihan SET
            
          nama_kegiatan = '$nama_kegiatan', tanggal_mulai = '$tanggal_mulai', tanggal_selesai = '$tanggal_selesai', jumlah_peserta = '$jumlah_peserta', status_kegiatan = '$status_kegiatan', permohonan_izin = '$permohonan_izin', input_peserta = '$input_peserta', submit_data_peserta = '$submit_data_peserta', pengajuan_sertifikat_internal = '$pengajuan_sertifikat_internal', dokumen_diterima = '$dokumen_diterima', status_dokumen = '$status_dokumen', keterangan = '$keterangan'
          WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    global $conn;

    $nama = htmlspecialchars($data->nama);
    $username = strtolower($data->username);
    $email = htmlspecialchars($data->email);
    $password = $data->password;
    $password2 = $data->password2;
    $user_akses = htmlspecialchars($data->user_akses);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('username sudah terdaftar!')
        </script>";

        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$username', '$email', '$password', '$user_akses')");

    return mysqli_affected_rows($conn);
}
