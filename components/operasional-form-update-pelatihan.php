<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal"
    data-bs-target="#updatePelatihanOperasional<?php echo $row['id']; ?>">
    <i class="bi bi-pencil-square"></i>
</button>




<!-- Modal -->
<div class="modal fade" id="updatePelatihanOperasional<?php echo $row['id']; ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="" method="post">
                <div class="modal-body text-start">

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <div class="mb-3">
                        <label class="form-label text-start" for="nama_kegiatan">Nama Kegiatan </label>
                        <Input class="form-control" type="text" name="nama_kegiatan" id="nama_kegiatan" required
                            disabled value="<?php echo $row['nama_kegiatan']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-start" for="tanggal_mulai">Tanggal Mulai </label>
                        <Input class="form-control" type="date" name="tanggal_mulai" id="tanggal_mulai" required
                            disabled value="<?php echo $row['tanggal_mulai']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-start" for="tanggal_selesai">Tanggal Selesai </label>
                        <Input class="form-control" type="date" name="tanggal_selesai" id="tanggal_selesai" required
                            disabled value="<?php echo $row['tanggal_selesai']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-start" for="jumlah_peserta">Jumlah Peserta </label>
                        <Input class="form-control" type="text" name="jumlah_peserta" id="jumlah_peserta" required
                            disabled value="<?php echo $row['jumlah_peserta']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="status_kegiatan" class="form-label">Status Kegiatan</label>
                        <select class="form-select" aria-label="Default select example" name="status_kegiatan" disabled
                            value="<?php echo $row['status_kegiatan']; ?>">
                            <option selected><?php echo $row['status_kegiatan']; ?></option>
                            <option value="Cancel">Cancel</option>
                            <option value="Estimate">Estimate</option>
                            <option value="Done">Done</option>
                            <option value="Running">Running</option>
                            <option value="Postpone">Postpone</option>
                            <option value="On Schedule">On Schedule</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-start" for="tgl_aktual_serti">Tanggal Aktual Sertifikat
                        </label>
                        <Input class="form-control" type="date" name="tgl_aktual_serti" id="tgl_aktual_serti"
                            required value="<?php echo $row['tgl_aktual_serti']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-start" for="tgl_aktual_dok">Tanggal Aktual Dokumen </label>
                        <Input class="form-control" type="date" name="tgl_aktual_dok" id="tgl_aktual_dok" required
                            value="<?php echo $row['tgl_aktual_dok']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-start" for="status_dokumen">Status Dokumen </label>
                        <select class="form-select" aria-label="Default select example" name="status_dokumen">
                            <option selected><?php echo $row['status_dokumen']; ?></option>
                            <option value="Done">Done</option>
                            <option value="Proses Arsip">Proses Arsip</option>
                            <option value="Proses Kemnaker">Proses Kemnaker</option>
                            <option value="Siap Distribusi">Siap Distribusi</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-start">Keterangan </label>
                        <textarea class="form-control" name="keterangan" cols="20" rows="5" autocomplete="off"><?php echo $row['keterangan']; ?></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>
