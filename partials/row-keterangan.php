<td>
    <button type="button" class="btn <?= !$row['keterangan'] ? 'btn-primary' : 'btn-warning' ?>" data-bs-toggle="modal"
        data-bs-target="#modalKeterangan<?php echo $row['id']; ?>">
        <i class="bi bi-eye-fill"></i>
    </button>

    <div class="modal fade" id="modalKeterangan<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Keterangan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <!--  -->
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                        <div class="mb-3">
                            <label class="form-label text-start" for="keterangan">Catatan
                            </label>
                            <textarea class="form-control" type="text" cols="20" rows="5" disabled name="keterangan" id="keterangan"
                                required autocomplete="off">
                            <?php echo $row['keterangan']; ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</td>
