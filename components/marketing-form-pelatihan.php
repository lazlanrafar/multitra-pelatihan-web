<?php
if (isset($_POST['createPelatihan'])) {
    if (createPelatihan($_POST) > 0) {
        echo "
          <script>
          alert('data berhasil ditambahkan!');
          document.location.href = 'marketing.php';
          </script>
      ";
    } else {
        echo "
          <script>
          alert('data gagal ditambahkan!');
          document.location.href = 'marketing.php';
          </script>
      ";
    }
}
?>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormTambahData">
    Tambah Data <i class="bi bi-file-earmark-plus"></i>
</button>

<div class="modal fade" id="modalFormTambahData" tabindex="-1" aria-labelledby="modalFormTambahDataLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalFormTambahDataLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="nama_kegiatan">Nama Kegiatan </label>
                        <Input class="form-control" type="text" name="nama_kegiatan" id="nama_kegiatan" required
                            autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tanggal_mulai">Tanggal Mulai </label>
                        <Input class="form-control" type="date" name="tanggal_mulai" id="tanggal_mulai" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tanggal_selesai">Tanggal Selesai </label>
                        <Input class="form-control" type="date" name="tanggal_selesai" id="tanggal_selesai" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="jumlah_peserta">Jumlah Peserta </label>
                        <Input class="form-control" type="text" name="jumlah_peserta" id="jumlah_peserta" required
                            autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="exampleInputPassword1" class="form-label">Status
                            Kegiatan</label>
                        <select class="form-select" aria-label="Default select example" name="status_kegiatan">
                            <option selected>Pilih</option>
                            <option value="Cancel">Cancel</option>
                            <option value="Estimate">Estimate</option>
                            <option value="Done">Done</option>
                            <option value="Running">Running</option>
                            <option value="Postpone">Postpone</option>
                            <option value="On Schedule">On Schedule</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="keterangan">Keterangan </label>
                        <Input class="form-control" type="text" name="keterangan" id="keterangan" autocomplete="off">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="createPelatihan" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
