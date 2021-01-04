<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Armada</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Armada</li>
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
                        <h3 class="card-title">Data Armada</h3>
                        <button class="ml-2 btn btn-primary btn-xs" onclick="tambah_armada()">
                            <span class="fas fa-plus-square"></span> Tambah Armada
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="tabel" class="table table-bordered table-striped responsive" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Travel</th>
                                        <th>Armada</th>
                                        <th>Nomor Polisi</th>
                                        <th>Driver</th>
                                        <th>Nomor HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Travel</th>
                                        <th>Armada</th>
                                        <th>Nomor Polisi</th>
                                        <th>Driver</th>
                                        <th>Nomor HP</th>
                                        <th>Aksi</th>
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

<!-- Form Tambah Armada Modal-->
<div class="modal fade" id="formTambahModal" tabindex="-1" role="dialog" aria-labelledby="formTambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formTambahModalLabel">Form Tambah Armada</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="formTambah" class="form-horizontal">
                    <div class="form-group">
                        <select class="form-control" id="pilih_travel" name="pilih_travel">
                            <option value=""> -- Pilih Travel -- </option>
                            <?php foreach ($daftar_travel as $d) : ?>
                                <option value="<?= $d['id_travel'] ?>"><?= $d['nama_travel'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="mobil">Armada:</label>
                        <input type="text" class="form-control" id="mobil" name="mobil" placeholder="Masukkan Armada...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="no_pol">Nomor Polisi:</label>
                        <input type="text" class="form-control" id="no_pol" name="no_pol" placeholder="Masukkan Nomor Polisi...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="driver">Nama Driver:</label>
                        <input type="text" class="form-control" id="driver" name="driver" placeholder="Masukkan Nama Driver...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="nohp">No HP:</label>
                        <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukkan Nomor HP Driver...">
                        <span class="help-block text-danger"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnAddArmada" onclick="add_armada()" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--// Form Tambah Armada Modal-->


<!-- Form Edit Armada Modal-->
<div class="modal fade" id="formEditModal" tabindex="-1" role="dialog" aria-labelledby="formEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formEditModalLabel">Form Tambah Armada</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="formEdit" class="form-horizontal">
                    <input type="hidden" name="id_armada">
                    <div class="form-group">
                        <select class="form-control" id="pilih_travel" name="pilih_travel">
                            <option value=""> -- Pilih Travel -- </option>
                            <?php foreach ($daftar_travel as $d) : ?>
                                <option value="<?= $d['id_travel'] ?>"><?= $d['nama_travel'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="nama_travel">Armada:</label>
                        <input type="text" class="form-control" id="mobil" name="mobil" placeholder="Masukkan Armada...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="no_pol">Nomor Polisi:</label>
                        <input type="text" class="form-control" id="no_pol" name="no_pol" placeholder="Masukkan Nomor Polisi...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="driver">Nama Driver:</label>
                        <input type="text" class="form-control" id="driver" name="driver" placeholder="Masukkan Nama Driver...">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="nohp">No HP:</label>
                        <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukkan Nomor HP Driver...">
                        <span class="help-block text-danger"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnUpdate" onclick="update_armada()" class="btn btn-primary">Update</button>
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

    //tabel Armada ajax
    $(document).ready(function() {
        table = $('#tabel').DataTable({
            "processing": true,
            "serverSide": true,
            // "deferLoading": 0,
            "order": [], //Initial no order.
            "ajax": {
                "url": "<?= base_url($users['role'] . '/get_ajax_armada') ?>",
                "type": "POST",
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0, 6], //first column / numbering column
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

    function tambah_armada() {
        $('#formTambah')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#formTambahModal').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Armada'); // Set Title to Bootstrap modal title
    }

    function add_armada() {
        $('#btnAddArmada').text('Adding...'); //change button text
        $('#btnAddArmada').attr('disabled', true); //set button disable 

        // ajax adding data to database
        var formData = new FormData($('#formTambah')[0]);
        $.ajax({
            url: "<?php echo site_url($users['role'] . '/insert_armada_ajax') ?>",
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
                    toastr.success('Armada telah berhasil ditambahkan.', 'Success!');
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {

                        $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error'); //select parent to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string

                    }
                    toastr.error('Mohon lengkapi seluruh data yang ada.', 'Error!');
                }
                $('#btnAddArmada').text('Add'); //change button text
                $('#btnAddArmada').attr('disabled', false); //set button enable 
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding data!');
                $('#btnAddArmada').text('Add'); //change button text
                $('#btnAddArmada').attr('disabled', false); //set button enable 

            }
        });
    }

    function edit_armada(id_armada) {
        $('#formEdit')[0].reset(); // reset form on modals\
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url($users['role'] . '/edit_armada_ajax') ?>/" + id_armada,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_armada"]').val(data.id_armada);
                $('[name="pilih_travel"]').val(data.id_travel);
                $('[name="mobil"]').val(data.mobil);
                $('[name="no_pol"]').val(data.no_pol);
                $('[name="driver"]').val(data.driver);
                $('[name="nohp"]').val(data.nohp);
                $('#formEditModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Armada'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error('Mohon lengkapi seluruh data yang ada.', 'Error!');
            }
        });
    }

    function update_armada() {
        $('#btnUpdate').text('Updating...'); //change button text
        $('#btnUpdate').attr('disabled', true); //set button disable 

        // ajax adding data to database
        var formData = new FormData($('#formEdit')[0]);
        $.ajax({
            url: "<?php echo site_url($users['role'] . '/update_armada_ajax') ?>",
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