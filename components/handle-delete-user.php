<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteUser<?php echo $row['id']; ?>">
    <i class="bi bi-trash"></i>
</button>

<form action="" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <div class="modal fade" id="modalDeleteUser<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda Yakin Ingin Menghapus?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button name="deleteUser" type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
if (isset($_POST['deleteUser'])) {
    if (deleteUserById($_POST['id']) > 0) {
        echo "
                <script>
                alert('data berhasil dihapus!');
                document.location.href = 'user.php';
                </script>
            ";
    } else {
        echo "
                <script>
                alert('data gagal dihapus!');
                document.location.href = 'user.php';
                </script>
            ";
    }
}
?>
