<body>
<div class="container pt-5">
        <div class="text-right">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>
        </div>
 
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title" style="text-align: center;">Data Vaksinasi Karyawan</h4>
            </div>
 
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tabel" class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Karyawan</th>
                                <th>Usia</th>
                                <th>Status Vaksin 1</th>
                                <th>Status Vaksin 2</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableData">	
                        <?php $no = 1;
                            foreach ($getKaryawan as $krywn) { ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $krywn['nama_karyawan']; ?></td>
                                    <td><?= $krywn['usia']; ?></td>
                                    <td><?= $krywn['status_vaksin_1']; ?></td>
                                    <td><?= $krywn['status_vaksin_2']; ?></td>
                                    <td>
                                        <a href="<?= base_url('employee/edit/' . $krywn['id']); ?>" class="btn btn-success" data-target="#editModal">
                                            <i class="ti ti-edit"></i></a>
                                        <a data-id="<?php echo $krywn['id']; ?>" class="btn btn-danger btnDelete">
                                            <i class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
 
                    </table>
                </div>
            </div>
        </div>
    </div>
 
    <!--   Modal Tambah Data-->
    <div class="modal modal-blur fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" class="form-control nama_karyawan">
                        <span id="error_nama" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="usia" class="col-form-label">Usia</label>
                        <input type="text" class="form-control usia">
                        <span id="error_usia" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="status_vaksin_1" class="col-form-label">Status Vaksin 1</label>
                        <select class="form-control status_vaksin_1">
                            <option value="">---Pilih Status Vaksin---</option>
                            <option value="Belum">Belum Vaksin</option>
                            <option value="Sudah">Sudah Vaksin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_vaksin_2" class="col-form-label">Status Vaksin 2</label>
                        <select class="form-control status_vaksin_2">
                            <option value="">---Pilih Status Vaksin---</option>
                            <option value="Belum">Belum Vaksin</option>
                            <option value="Sudah">Sudah Vaksin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-save">Tambah</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Data -->
    <div class="modal modal-blur fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="id_krywn_del">
                    <h4>Yakin ingin menghapus data ini?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger delete-btn-employ">Yakin</button>
                </div>
            </div>
        </div>
    </div>
</body>

    <!-- DATATABLES SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function(){
		
            display();

            $(document).on('click', '#btn-save', function (e) {
                e.preventDefault();
                // swal("Waasuuuppp");
                $.ajax({
                    type : "POST",
                    url : "employee/add",
                    data : $("#btn-save").serialize(),
                    success : function(response) {
                        $('#exampleModal').modal('hide');

                        swal(response.status);
                    }
                });
                e.preventDefault();
            });

            $(document).on('click', '.btnDelete', function (e) {
                e.preventDefault();
                var employ_id = $(this).attr('data-id');
                swal("Mau hapus data dengan id:", employ_id);
                // $.ajax({
                //     type : "POST",
                //     url : "employee/add",
                //     data : $("#btn-save").serialize(),
                //     success : function(response) {
                //         alert(response);
                //     }
                // });
                // e.preventDefault();
            });
            function display()
            {
                $('#tabel').DataTable();
            }
        });
    </script>
        <!-- --- -->
        