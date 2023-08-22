<?php

require 'config.php';

function createUser($data)
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
