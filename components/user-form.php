<?php
if (isset($_POST['createUser'])) {
    $data = new stdClass();
    $data->nama = $_POST['nama'];
    $data->email = $_POST['email'];
    $data->username = $_POST['username'];
    $data->password = $_POST['password'];
    $data->password2 = $_POST['password2'];
    $data->user_akses = $_POST['user_akses'];

    if (createUser($data) > 0) {
        echo "
          <script>
          alert('data berhasil ditambahkan!');
          location.href = 'user.php';
          </script>
      ";
    } else {
        echo "
          <script>
          alert('data gagal ditambahkan!');
            location.href = 'user.php';
          </script>
      ";
    }
}
?>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateUser">
    Tambah User <i class="bi bi-plus"></i>
</button>

<div class="modal fade" id="modalCreateUser" tabindex="-1" aria-labelledby="modalCreateUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalCreateUserLabel">Tambah Data User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama </label>
                        <Input class="form-control" type="text" name="nama" id="nama" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email">Email </label>
                        <Input class="form-control" type="text" name="email" id="email" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="username">Username </label>
                        <Input class="form-control" type="text" name="username" id="username" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password">Password </label>
                        <Input class="form-control" type="password" name="password" id="password" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password2">Konfirmasi Password </label>
                        <Input class="form-control" type="password" name="password2" id="password2" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="user_akses">User Akses</label>
                        <select class="form-select" aria-label="Default select example" name="user_akses"
                            id="user_akses">
                            <option selected>Pilih</option>
                            <option value="Super Admin">Super Admin</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Admin Operasional">Admin Operasional</option>
                            <option value="Operasional Training">Operasional Training</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="createUser" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
