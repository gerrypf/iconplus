<div class="container p-5">
    <a href="<?= base_url('employee'); ?>" class="btn btn-secondary mb-2"><i class="fa fa-home"></i></a>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title">Edit Data Vaksinasi Karyawan</h4>
        </div>
        <div class="page-body">
            <form method="post" action="<?= base_url('employee/update'); ?>">
                <div class="container-xl">
                        <div class="">
                            <div class="card-body">
                                <div class="col mb-2">
                                    <label class="form-label">Nama Karyawan</label>
                                    <input type="text" value="<?= $employee->nama_karyawan; ?>" name="nama_karyawan" required class="form-control">
                                </div>
                                <div class="col mb-2">
                                    <label class="form-label">Usia</label>
                                    <input type="text" value="<?= $employee->usia; ?>" name="usia" required class="form-control">
                                </div>
                                <div class="col mb-2">
                                    <label class="form-label">Status Vaksin 1</label>
                                    <select class="form-control" name="status_vaksin_1">
                                        <option value="<?= $employee->status_vaksin_1; ?>">---Pilih Status Vaksin--</option>
                                        <option value="Belum">Belum Vaksin</option>
                                        <option value="Sudah">Sudah Vaksin</option>
                                    </select>
                                </div>
                                <div class="col mb-2">
                                    <label class="form-label">Status Vaksin 2</label>
                                    <select class="form-control" name="status_vaksin_2">
                                        <option value="<?= $employee->status_vaksin_2; ?>">---Pilih Status Vaksin--</option>
                                        <option value="Belum">Belum Vaksin</option>
                                        <option value="Sudah">Sudah Vaksin</option>
                                    </select>
                                </div>
                                <input type="hidden" value="<?= $employee->id; ?>" name="id">
                                <div class="card-footer">
                                    <div class="row align-item-center">
                                        <div class="col"></div>
                                        <div class="col-auto">
                                            <button class="btn btn-success">Update</button>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </form>
 
        </div>
    </div>
</div>