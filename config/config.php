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