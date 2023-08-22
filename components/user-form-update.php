<?php
if (isset($_POST['updateUser'])) {
    if (updateUser($_POST['id'], $_POST) > 0) {
        echo "
          <script>
          alert('data berhasil diubah!');
          location.href = 'user.php';
          </script>
      ";
    } else {
        echo "
          <script>
          alert('data gagal diubah!');
            location.href = 'user.php';
          </script>
      ";
    }
}
?>

<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdateUser<?php echo $row['id']; ?>">
    <i class="bi bi-pencil"></i>
</button>

<div class="modal fade" id="modalUpdateUser<?php echo $row['id']; ?>" tabindex="-1"
    aria-labelledby="modalUpdateUser<?php echo $row['id']; ?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalUpdateUser<?php echo $row['id']; ?>Label">Update User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama </label>
                        <Input class="form-control" type="text" name="nama" id="nama" required
                            value="<?php echo $row['nama']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email">Email </label>
                        <Input class="form-control" type="text" name="email" id="email" required
                            value="<?php echo $row['email']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="username">Username </label>
                        <Input class="form-control" type="text" name="username" id="username" required
                            value="<?php echo $row['username']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password">Password </label>
                        <Input class="form-control" type="password" name="password" id="password">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password2">Konfirmasi Password </label>
                        <Input class="form-control" type="password" name="password2" id="password2">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="user_akses">User Akses</label>
                        <select class="form-select" aria-label="Default select example" name="user_akses"
                            id="user_akses">
                            <option selected>Pilih</option>
                            <option value="Super Admin"<?php echo $row['user_akses'] == 'Super Admin' ? 'selected' : ''; ?>>
                                Super Admin</option>
                            <option value="Marketing"<?php echo $row['user_akses'] == 'Marketing' ? 'selected' : ''; ?>>
                                Marketing</option>
                            <option value="Admin Operasional" <?php echo $row['user_akses'] == 'Admin Operasional' ? 'selected' : ''; ?>>Admin
                                Operasional</option>
                            <option value="Operasional Training" <?php echo $row['user_akses'] == 'Operasional Training' ? 'selected' : ''; ?>>Operasional
                                Training</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="updateUser" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
