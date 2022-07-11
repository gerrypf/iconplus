<body>
<div class="container pt-5">
        <div class="text-right">
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</a>
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
                <form id="addForm" name="addForm" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" class="form-control nama_karyawan" id="nama_karyawan">
                        <span id="error_nama" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="usia" class="col-form-label">Usia</label>
                        <input type="text" class="form-control usia" id="usia">
                        <span id="error_usia" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="status_vaksin_1" class="col-form-label">Status Vaksin 1</label>
                        <select class="form-control status_vaksin_1" id="status_vaksin_1">
                            <option value="">---Pilih Status Vaksin---</option>
                            <option value="Belum">Belum Vaksin</option>
                            <option value="Sudah">Sudah Vaksin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_vaksin_2" class="col-form-label">Status Vaksin 2</label>
                        <select class="form-control status_vaksin_2" id="status_vaksin_2">
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

    <!-- Modal Edit Data -->
    <div class="modal modal-blur fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id">
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" class="form-control nama_karyawan" id="nama_karyawan_edit">
                        <span id="error_nama" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="usia" class="col-form-label">Usia</label>
                        <input type="text" class="form-control usia" id="usia_edit">
                        <span id="error_usia" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="status_vaksin_1" class="col-form-label">Status Vaksin 1</label>
                        <select class="form-control status_vaksin_1" id="status_vaksin_1_edit">
                            <option value="">---Pilih Status Vaksin---</option>
                            <option value="Belum">Belum Vaksin</option>
                            <option value="Sudah">Sudah Vaksin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_vaksin_2" class="col-form-label">Status Vaksin 2</label>
                        <select class="form-control status_vaksin_2" id="status_vaksin_2_edit">
                            <option value="">---Pilih Status Vaksin---</option>
                            <option value="Belum">Belum Vaksin</option>
                            <option value="Sudah">Sudah Vaksin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-update">Update</button>
                </div>
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

            $(document).on('click', '.btn-save', function (e) {
                var nama_karyawan   = $('#nama_karyawan').val();
                var usia            = $('#usia').val();
                var status_vaksin_1 = $('#status_vaksin_1').val();
                var status_vaksin_2 = $('#status_vaksin_2').val();
                e.preventDefault();
                // swal("Waasuuuppp");
                $.ajax({
                    method : "post",
                    url : "employee/add",
                    data : {
                        nama_karyawan:nama_karyawan,
                        usia:usia,
                        status_vaksin_1:status_vaksin_1,
                        status_vaksin_2:status_vaksin_2
                    },
                    success : function(response) {
                        if(response.status == "Data berhasil ditambahkan"){
                            $('#exampleModal').modal('hide');
                            $('#exampleModal').find('input').val('');
                            // $('#tabel').DataTable().ajax.reload(null, false);\
                            // ajax.reload();
                            // $('#tabel').DataTable().ajax.reload();
                            $('#tableData').html("");
                            display();
                           
                            swal("Berhasil", response.status, "success");
                        } else {
                            swal("Gagal", response.status, "error");
                        }
                        
                        
                        // $("#addForm")[0].reset();
                        // $('#tabel').load(document.URL +  ' #tabel');

                        // $('#exampleModal').modal('hide');
                        // $('#exampleModal').find('input').val('');
                        // // display();
                        // $('#tabel').data.reload();
                        // swal("Berhasil", response.status, "success");
                    }
                });
                e.preventDefault();
            });

            $(document).on('click', '.btn-edit', function (e) {
                e.preventDefault();
                // var edit_id = $(this).closest('tr').find('.krywn_id').text();
                var edit_id = $(this).attr('data-id');
                $.ajax({
                    method : "post",
                    url : "employee/edit",
                    data:{'edit_id':edit_id},
                    success : function(response) {
                        $.each(response, function(key, value) {
                            $('#edit_id').val(value['id']);
                            $('#nama_karyawan_edit').val(value['nama_karyawan']);
                            $('#usia_edit').val(value['usia']);
                            $('#status_vaksin_1_edit').val(value['status_vaksin_1']);
                            $('#status_vaksin_2_edit').val(value['status_vaksin_2']);
                            $('#editModal').modal('show');
                        });
                    }
                });
                e.preventDefault();
            });

            $(document).on('click', '.btn-update', function (e) {
                e.preventDefault();
                // var id = $(this).attr('data-id');
                var data = {         
                    'edit_id': $('#edit_id').val(),           
                    'nama_karyawan': $('#nama_karyawan_edit').val(),
                    'usia': $('#usia_edit').val(),
                    'status_vaksin_1': $('#status_vaksin_1_edit').val(),
                    'status_vaksin_2': $('#status_vaksin_2_edit').val(),
                };
                $.ajax({
                    method : "post",
                    url : "employee/update",
                    data: data,
                    success : function(response) {
                        if(response.status == "Data berhasil diupdate"){
                            $('#editModal').modal('hide');                    
                            $('#tableData').html("");
                            display();
                           
                            swal("Berhasil", response.status, "success");
                        } else {
                            swal("Gagal", response.status, "error");
                        }
                    }
                });
                e.preventDefault();
            });

            $(document).on('click', '.btn-delete', function (e) {
                e.preventDefault();
                var employ_id = $(this).attr('data-id');
                // swal("Mau hapus data dengan id:", employ_id, "warning");
                $.ajax({
                    method : "get",
                    url : "employee/hapus",
                    data:{delete_id:employ_id},
                    success : function(response) {
                        $('#tableData').html("");
                        display();
                        // $('#tabel').load(document.URL +  ' #tabel');
                        swal("Berhasil", response.status, "success");
                        // $('#tabel').html('');
                        // $('#tabel').DataTable();
                    }
                });
                e.preventDefault();
            });

            function display()
            {
                $.ajax({
                    mathod: "get",
                    url: 'employee/fetch',
                    success: function(response) {
                        $.each(response.getKaryawan, function(key, value){
                            // console.log(value['nama']);
                            $('#tableData').append('<tr>\
                                <td class="krywn_id">'+value['id']+'</td>\
                                <td>'+value['nama_karyawan']+'</td>\
                                <td>'+value['usia']+'</td>\
                                <td>'+value['status_vaksin_1']+'</td>\
                                <td>'+value['status_vaksin_2']+'</td>\
                                <td>\
                                    <a data-id="'+value['id']+'" class="btn btn-success btn-edit" data-bs-toggle="modal" data-bs-target="#editModal"><i class="ti ti-edit"></i></a>\
                                    <a data-id="'+value['id']+'" class="btn btn-danger btn-delete"><i class="ti ti-trash"></i></a>\
                                </td>\
                            </tr>');
                        });

                    }
                });
            }

            
        });
    </script>
        <!-- --- -->
        