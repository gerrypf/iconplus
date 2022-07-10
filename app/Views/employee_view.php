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
                        <input type="text" class="form-control nama_karyawan" placeholder="Masukkan Nama">
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
                    <button type="button" class="btn btn-primary btn-save">Tambah</button>
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

            $(document).on('click','.btn-save',function(){
                // swal("Hellooo dude");
                // $('#exampleModal').modal('show');
                
                    var data = {
                        'nama_karyawan'   : $('.nama_karyawan').val(),
                        'usia'            : $('.usia').val(),
                        'status_vaksin_1' : $('.status_vaksin_1').val(),
                        'status_vaksin_2' : $('.status_vaksin_2').val()
                    }
                    $.ajax({
                        url:'employee/add',
                        method:'post',
                        data:data,
                        success:function(response){
                            $('#exampleModal').modal('hide');
                            swal(response.status);
                            // alertify.success(response.status);
                    
                            // $('#exampleModal').modal('hide');
                            // location.reload();
                            // $('#tabel').html('');
                            
                            // display();
                            
                            // swal("Inserted");
                        }
                    });
                // var nama_karyawan   = $('#nama_karyawan').val();
                // var usia            = $('#usia').val();
                // var status_vaksin_1 = $('#status_vaksin_1').val();
                // var status_vaksin_2 = $('#status_vaksin_2').val();
                
                
                
            });

            $(document).on('click', '.btnDelete', function () {
                var employ_id = $(this).attr('data-id');
                swal(employ_id);
                // $('#id_krywn_del').val();
                // $('#hapusModal').modal('show');
                // $.get('employee/delete/'+employ_id, function (data) {
                //     $('#studentTable tbody #'+ employ_id).remove();
                // })
            });
            // $('body').on('click', '.btnDelete', function () {
            //     // var id = $(this).attr('data-id');
            //     // $.get('employee/hapus/'+id, function (data) {
            //     //     $('#tabel tbody #'+ id).remove();
            //     // })
            //     // swal("Hello world!");
            // }); 
            function display()
            {
                $('#tabel').DataTable();
            }
        });
    </script>
        <!-- --- -->
        