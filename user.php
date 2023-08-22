<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

if ($_SESSION['user_akses'] !== 'Super Admin') {
    header('Location: index.php');
    exit();
}

require 'config/user.php';

$multi = query('SELECT * FROM user ORDER BY nama DESC');
?>

<!doctype html>
<html lang="en">
<?php include 'partials/head.php'; ?>

<body>
    <div class="wrapper">
        <?php include 'partials/sidebar.php'; ?>

        <div class="main">
            <?php include 'partials/navbar.php'; ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3"><strong>User</strong> Multidasa</h1>

                    <div class="text-right">
                        <H5 class="jam"> <span id="tanggalwaktu"></span></H5>
                        <h5>Jam : <b><span id="jam" style="font-size:1rem"></span></b></h5>
                    </div>

                    <?php include 'components/user-form.php'; ?>
                    <br>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email Address</th>
                                        <th>Role</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($multi as $row) : ?>
                                    <tr align="center">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['username']; ?></a></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['user_akses']; ?></td>
                                        <td>
                                            <?php include 'components/user-form-update.php'; ?>
                                        </td>
                                        <td>
                                            <?php include 'components/handle-delete-user.php'; ?>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php include 'partials/footer.php'; ?>
        </div>
    </div>
    <?php include 'partials/script.php'; ?>
</body>

</html>
