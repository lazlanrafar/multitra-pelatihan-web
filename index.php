<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

if ($_SESSION['user_akses'] == 'Super Admin') {
    header('Location: superadmin.php');
} elseif ($_SESSION['user_akses'] == 'Marketing') {
    header('Location: marketing.php');
} elseif ($_SESSION['user_akses'] == 'Admin Operasional') {
    header('Location: admin-operasional.php');
} elseif ($_SESSION['user_akses'] == 'Operasional Training') {
    header('Location: operasional_training.php');
}
