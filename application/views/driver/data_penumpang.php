<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Penumpang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Penumpang</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?= $this->session->flashdata('message'); ?>
    <section class="content">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Penumpang</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="tabel" class="table table-bordered table-striped responsive" width="100%">
                                <thead>

                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>JK</th>
                                        <th>Umur</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Trayek</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>JK</th>
                                        <th>Umur</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Trayek</th>
                                        <th>Waktu</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<style>
    .modal {
        overflow: auto !important;
    }
</style>

<!-- Form Tambah Penumpang Modal-->
<div class="modal fade" id="formTambahModal" tabindex="-1" role="dialog" aria-labelledby="formTambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formTambahModalLabel">Form Tambah Penumpang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="formTambah" class="form-horizontal">
                    <div class="form-group">
                        <label for="nama">Nama Penumpang:</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Penumpang...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin: </label>
                        <select class="custom-select" id="jk" name="jk">
                            <div class="form-control form-control-user" aria-labelledby="jk">
                                <?php $stat = array('Laki-Laki', 'Perempuan'); ?>
                                <option value=""> -- Pilih Jenis Kelamin -- </option>
                                <?php for ($i = 0; $i < count($stat); $i++) { ?>
                                    <option value=<?= $stat[$i] ?>><?= $stat[$i] ?> </option>
                                <?php } ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur:</label>
                        <input type="text" class="form-control" id="umur" name="umur" placeholder="Masukkan Umur...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="nohp">No HP:</label>
                        <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukkan No HP...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="jenis_pembayaran">Jenis Pembayaran: </label>
                        <select class="custom-select" id="jenis_pembayaran" name="jenis_pembayaran">
                            <div class="form-control form-control-user" aria-labelledby="jenis_pembayaran">
                                <?php $stat = array('Agen', 'Transfer'); ?>
                                <option value=""> -- Pilih Pembayaran -- </option>
                                <?php for ($i = 0; $i < count($stat); $i++) { ?>
                                    <option value=<?= $stat[$i] ?>><?= $stat[$i] ?> </option>
                                <?php } ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="pilih_trayek">Trayek:</label>
                        <select class="form-control" id="pilih_trayek" name="pilih_trayek">
                            <option value=""> -- Pilih Trayek -- </option>
                            <?php foreach ($daftar_trayek as $d) : ?>
                                <option value="<?= $d['id_trayek'] ?>"><?= $d['rute_dari'] . " ke " . $d['rute_ke'] . " - " . $d['nama_travel'] . " - " . $d['mobil'] . " - " . $d['waktu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="tempat_duduk">Tempat Duduk: </label>
                        <select class="custom-select" id="tempat_duduk" name="tempat_duduk">
                            <div class="form-control form-control-user" aria-labelledby="tempat_duduk">
                                <?php $stat = array('A1', 'B1', 'B2', 'B3', 'C1', 'C2', 'C3'); ?>
                                <option value=""> -- Pilih Tempat Duduk -- </option>
                                <?php for ($i = 0; $i < count($stat); $i++) { ?>
                                    <option value=<?= $stat[$i] ?>><?= $stat[$i] ?> </option>
                                <?php } ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnAddPenumpang" onclick="add_penumpang()" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--// Form Tambah Penumpang Modal-->


<!-- Form Edit Penumpang Modal-->
<div class="modal fade" id="formEditModal" tabindex="-1" role="dialog" aria-labelledby="formEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formEditModalLabel">Form Tambah Penumpang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="formEdit" class="form-horizontal">
                    <input type="hidden" name="id_penumpang">
                    <div class="form-group">
                        <label for="nama">Nama Penumpang:</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Penumpang...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin: </label>
                        <select class="custom-select" id="jk" name="jk">
                            <div class="form-control form-control-user" aria-labelledby="jk">
                                <?php $stat = array('Laki-Laki', 'Perempuan'); ?>
                                <option value=""> -- Pilih Jenis Kelamin -- </option>
                                <?php for ($i = 0; $i < count($stat); $i++) { ?>
                                    <option value=<?= $stat[$i] ?>><?= $stat[$i] ?> </option>
                                <?php } ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur:</label>
                        <input type="text" class="form-control" id="umur" name="umur" placeholder="Masukkan Umur...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="nohp">No HP:</label>
                        <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukkan No HP...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="jenis_pembayaran">Jenis Pembayaran: </label>
                        <select class="custom-select" id="jenis_pembayaran" name="jenis_pembayaran">
                            <div class="form-control form-control-user" aria-labelledby="jenis_pembayaran">
                                <?php $stat = array('Agen', 'Transfer'); ?>
                                <option value=""> -- Pilih Pembayaran -- </option>
                                <?php for ($i = 0; $i < count($stat); $i++) { ?>
                                    <option value=<?= $stat[$i] ?>><?= $stat[$i] ?> </option>
                                <?php } ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="pilih_trayek">Trayek:</label>
                        <select class="form-control" id="pilih_trayek" name="pilih_trayek" disabled>
                            <option value=""> -- Pilih Trayek -- </option>
                            <?php foreach ($daftar_trayek as $d) : ?>
                                <option value="<?= $d['id_trayek'] ?>"><?= $d['rute_dari'] . " ke " . $d['rute_ke'] . " - " . $d['nama_travel'] . " - " . $d['mobil'] . " - " . $d['waktu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="tempat_duduk">Tempat Duduk: </label>
                        <select class="custom-select" id="tempat_duduk" name="tempat_duduk">
                            <div class="form-control form-control-user" aria-labelledby="tempat_duduk">
                                <?php $stat = array('A1', 'B1', 'B2', 'B3', 'C1', 'C2', 'C3'); ?>
                                <option value=""> -- Pilih Tempat Duduk -- </option>
                                <?php for ($i = 0; $i < count($stat); $i++) { ?>
                                    <option value=<?= $stat[$i] ?>><?= $stat[$i] ?> </option>
                                <?php } ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="status">Status Pembayaran: </label>
                        <select class="custom-select" id="status" name="status">
                            <div class="form-control form-control-user" aria-labelledby="status">
                                <?php $stat = array('Belum Bayar', 'Sudah Bayar'); ?>
                                <option value=""> -- Pilih Status Pembayaran -- </option>
                                <?php for ($i = 0; $i < count($stat); $i++) { ?>
                                    <option value=<?= $i ?>><?= $stat[$i] ?> </option>
                                <?php } ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnUpdate" onclick="update_penumpang()" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--// Form Tambah Travel Modal-->

<!-- Ajax Travel-->
<script>
    var save_method; //for save method string
    var table;

    //tabel Penumpang ajax
    $(document).ready(function() {
        table = $('#tabel').DataTable({
            "processing": true,
            "serverSide": true,
            // "deferLoading": 0,
            "order": [], //Initial no order.
            "ajax": {
                "url": "<?= base_url($users['role'] . '/get_ajax_penumpang') ?>",
                "type": "POST",
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

        //set input/textarea/select event when change value, remove class error and remove text help block 
        $("input").change(function() {
            $(this).parent().removeClass('has-error');
            $(this).next().empty();
        });
        $(".datepicker").change(function() {
            $(this).parent().removeClass('has-error');
            $(this).parent().next().empty();
        });
        $("textarea").change(function() {
            $(this).parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function() {
            $(this).parent().removeClass('has-error');
            $(this).next().empty();
        });

        $('#btn-filter').click(function() { //button filter event click
            table.ajax.reload(); //just reload table
        });
        $('#btn-reset').click(function() { //button reset event click
            $('#form-filter')[0].reset();
            table.ajax.reload(); //just reload table
        });
    });

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    function tambah_penumpang() {
        $('#formTambah')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#formTambahModal').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Penumpang'); // Set Title to Bootstrap modal title
    }

    function add_penumpang() {
        $('#btnAddPenumpang').text('Adding...'); //change button text
        $('#btnAddPenumpang').attr('disabled', true); //set button disable 

        // ajax adding data to database
        var formData = new FormData($('#formTambah')[0]);
        $.ajax({
            url: "<?php echo site_url($users['role'] . '/insert_penumpang_ajax') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                if (data.status) //if success close modal and reload ajax table
                {
                    $('#formTambahModal').modal('hide');
                    reload_table();
                    toastr.success('Penumpang telah berhasil ditambahkan.', 'Success!');
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error'); //select parent to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string

                    }
                    toastr.error('Mohon lengkapi seluruh data yang ada.', 'Error!');
                }
                $('#btnAddPenumpang').text('Add'); //change button text
                $('#btnAddPenumpang').attr('disabled', false); //set button enable 
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding data!');
                $('#btnAddPenumpang').text('Add'); //change button text
                $('#btnAddPenumpang').attr('disabled', false); //set button enable 

            }
        });
    }

    function edit_penumpang(id_penumpang) {
        $('#formEdit')[0].reset(); // reset form on modals\
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url($users['role'] . '/edit_penumpang_ajax') ?>/" + id_penumpang,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_penumpang"]').val(data.id_penumpang);
                $('[name="nama"]').val(data.nama);
                $('[name="jk"]').val(data.jk);
                $('[name="umur"]').val(data.umur);
                $('[name="alamat"]').val(data.alamat);
                $('[name="email"]').val(data.email);
                $('[name="nohp"]').val(data.nohp);
                $('[name="pilih_trayek"]').val(data.id_trayek);
                $('[name="tempat_duduk"]').val(data.tempat_duduk);
                $('[name="jenis_pembayaran"]').val(data.jenis_pembayaran);
                $('[name="status"]').val(data.status);

                $('#formEditModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Penumpang'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error('Mohon lengkapi seluruh data yang ada.', 'Error!');
            }
        });
    }

    function update_penumpang() {
        $('#btnUpdate').text('Updating...'); //change button text
        $('#btnUpdate').attr('disabled', true); //set button disable 

        // ajax adding data to database
        var formData = new FormData($('#formEdit')[0]);
        $.ajax({
            url: "<?php echo site_url($users['role'] . '/update_penumpang_ajax') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                if (data.status) //if success close modal and reload ajax table
                {
                    $('#formEditModal').modal('hide');
                    reload_table();
                    toastr.success('Progress telah berhasil diupdate.', 'Success!');
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {

                        $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error'); //select parent to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string

                    }
                    toastr.error('Mohon lengkapi seluruh data yang ada.', 'Error!');
                }
                $('#btnUpdate').text('Update'); //change button text
                $('#btnUpdate').attr('disabled', false); //set button enable 
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error updating data!');
                $('#btnUpdate').text('Update'); //change button text
                $('#btnUpdate').attr('disabled', false); //set button enable 
            }
        });
    }
</script>z