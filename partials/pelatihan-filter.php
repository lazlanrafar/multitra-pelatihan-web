<div class="d-flex align-items-start justify-content-between gap-3">
    <div class="col-3">
        <form action="" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="Pencarian Nama Kegiatan" autofocus
                    autocomplete="off">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="cari">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-4">
        <form action="index.php" method="post">
            <div class="d-flex justify-content-start gap-2">
                <div class="col-5">
                    <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai">
                </div>
                <div class="col-5">
                    <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai">
                </div>
                <div class="col-5">

                    <button type="submit" class="btn btn-primary" name="filter_tanggal" data-bs-target="#exampleModal">
                        <i class="bi bi-folder-plus"></i>Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-3">
        <form action="" method="POST">
            <div class="d-flex justify-content-start">
                <div class="col-9" style="margin-right:10px;">
                    <select class="form-select" aria-label="Default select example" name="status_kegiatan"
                        style="margin-left:10px;">
                        <option selected>Pilih</option>
                        <option value="Cancel">Cancel</option>
                        <option value="Estimate">Estimate</option>
                        <option value="Done">Done</option>
                        <option value="Running">Running</option>
                        <option value="Postpone">Postpone</option>
                        <option value="On Schedule">On Schedule</option>
                    </select>
                </div>
                <div class="col-3">
                    <label for="sampai_tanggal" class="form-label"></label>
                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" name="filter_status"
                        data-bs-target="#exampleModal">
                        <i class="bi bi-folder-plus"></i>Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-1">
        <a href="index.php" class="btn btn-danger">
            <i class="bi bi-arrow-repeat"></i>
        </a>
    </div>
</div>
