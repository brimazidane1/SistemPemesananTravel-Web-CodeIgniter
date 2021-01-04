<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Trayek</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Trayek</li>
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
                        <h3 class="card-title">Jadwal</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="tabel" class="table table-bordered table-striped responsive" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Travel</th>
                                        <th>Trayek</th>
                                        <th>Armada</th>
                                        <th>No Pol</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Travel</th>
                                        <th>Trayek</th>
                                        <th>Armada</th>
                                        <th>No Pol</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
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

<!-- Form Tambah Trayek Modal-->
<div class="modal fade" id="formTambahModal" tabindex="-1" role="dialog" aria-labelledby="formTambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formTambahModalLabel">Form Tambah Trayek</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="formTambah" class="form-horizontal">
                    <div class="form-group">
                        <label for="pilih_armada">Armada:</label>
                        <select class="form-control" id="pilih_armada" name="pilih_armada">
                            <option value=""> -- Pilih Armada -- </option>
                            <?php foreach ($daftar_armada as $d) : ?>
                                <option value="<?= $d['id_armada'] ?>"><?= $d['nama_travel'] . " - " . $d['mobil'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="pilih_rute">Trayek:</label>
                        <select class="form-control" id="pilih_rute" name="pilih_rute">
                            <option value=""> -- Pilih Rute -- </option>
                            <?php foreach ($daftar_rute as $d) : ?>
                                <option value="<?= $d['id_rute'] ?>"><?= $d['rute_dari'] . " - " . $d['rute_ke'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input id="tanggal" class="form-control datepicker" name="tanggal" placeholder="yyyy-mm-dd">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="pilih_waktu">Waktu: </label>
                        <select class="custom-select" id="pilih_waktu" name="pilih_waktu">
                            <div class="form-control form-control-user" aria-labelledby="pilih_waktu">
                                <?php $stat = array('Pagi', 'Siang', 'Malam'); ?>
                                <option value=""> -- Pilih Waktu -- </option>
                                <?php for ($i = 0; $i < count($stat); $i++) { ?>
                                    <option value=<?= $stat[$i] ?>><?= $stat[$i] ?> </option>
                                <?php } ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnAddTrayek" onclick="add_trayek()" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--// Form Tambah Trayek Modal-->


<!-- Form Edit Trayek Modal-->
<div class="modal fade" id="formEditModal" tabindex="-1" role="dialog" aria-labelledby="formEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formEditModalLabel">Form Tambah Trayek</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="formEdit" class="form-horizontal">
                    <input type="hidden" name="id_trayek">
                    <div class="form-group">
                        <label for="armada">Armada:</label>
                        <select class="form-control" id="pilih_armada" name="pilih_armada">
                            <option value=""> -- Pilih Armada -- </option>
                            <?php foreach ($daftar_armada as $d) : ?>
                                <option value="<?= $d['id_armada'] ?>"><?= $d['nama_travel'] . " - " . $d['mobil'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="pilih_rute">Trayek:</label>
                        <select class="form-control" id="pilih_rute" name="pilih_rute">
                            <option value=""> -- Pilih Rute -- </option>
                            <?php foreach ($daftar_rute as $d) : ?>
                                <option value="<?= $d['id_rute'] ?>"><?= $d['rute_dari'] . " - " . $d['rute_ke'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input id="tanggal" class="form-control datepicker" name="tanggal" placeholder="yyyy-mm-dd">
                        <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="pilih_waktu">Waktu: </label>
                        <select class="custom-select" id="pilih_waktu" name="pilih_waktu">
                            <div class="form-control form-control-user" aria-labelledby="pilih_waktu">
                                <?php $stat = array('Pagi', 'Siang', 'Malam'); ?>
                                <option value=""> -- Pilih Waktu -- </option>
                                <?php for ($i = 0; $i < count($stat); $i++) { ?>
                                    <option value=<?= $stat[$i] ?>><?= $stat[$i] ?> </option>
                                <?php } ?>
                        </select>
                        <span class="help-block text-danger"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnUpdate" onclick="update_trayek()" class="btn btn-primary">Update</button>
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

    //tabel Trayek ajax
    $(document).ready(function() {
        table = $('#tabel').DataTable({
            "processing": true,
            "serverSide": true,
            // "deferLoading": 0,
            "order": [], //Initial no order.
            "ajax": {
                "url": "<?= base_url($users['role'] . '/get_ajax_trayek') ?>",
                "type": "POST",
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });

        $('.datepicker').each(function() {
            $(this).datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd'
            });
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

    function tambah_trayek() {
        $('#formTambah')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#formTambahModal').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Trayek'); // Set Title to Bootstrap modal title
    }

    function add_trayek() {
        $('#btnAddTrayek').text('Adding...'); //change button text
        $('#btnAddTrayek').attr('disabled', true); //set button disable 

        // ajax adding data to database
        var formData = new FormData($('#formTambah')[0]);
        $.ajax({
            url: "<?php echo site_url($users['role'] . '/insert_trayek_ajax') ?>",
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
                    toastr.success('Trayek telah berhasil ditambahkan.', 'Success!');
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        if (data.inputerror[i] == 'tanggal') {
                            $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent to select div form-group class and add has-error class
                            $('[name="' + data.inputerror[i] + '"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                        } else {
                            $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error'); //select parent to select div form-group class and add has-error class
                            $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        }
                    }
                    toastr.error('Mohon lengkapi seluruh data yang ada.', 'Error!');
                }
                $('#btnAddTrayek').text('Add'); //change button text
                $('#btnAddTrayek').attr('disabled', false); //set button enable 
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding data!');
                $('#btnAddTrayek').text('Add'); //change button text
                $('#btnAddTrayek').attr('disabled', false); //set button enable 

            }
        });
    }

    function edit_trayek(id_trayek) {
        $('#formEdit')[0].reset(); // reset form on modals\
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url($users['role'] . '/edit_trayek_ajax') ?>/" + id_trayek,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_trayek"]').val(data.id_trayek);
                $('[name="pilih_armada"]').val(data.id_armada);
                $('[name="pilih_rute"]').val(data.id_rute);
                $('[name="pilih_waktu"]').val(data.waktu);

                $('#formEditModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Trayek'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error('Mohon lengkapi seluruh data yang ada.', 'Error!');
            }
        });
    }

    function update_trayek() {
        $('#btnUpdate').text('Updating...'); //change button text
        $('#btnUpdate').attr('disabled', true); //set button disable 

        // ajax adding data to database
        var formData = new FormData($('#formEdit')[0]);
        $.ajax({
            url: "<?php echo site_url($users['role'] . '/update_trayek_ajax') ?>",
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
                        if (data.inputerror[i] == 'tanggal') {
                            $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent to select div form-group class and add has-error class
                            $('[name="' + data.inputerror[i] + '"]').parent().next().text(data.error_string[i]); //select span help-block class set text error string
                        } else {
                            $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error'); //select parent to select div form-group class and add has-error class
                            $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        }
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