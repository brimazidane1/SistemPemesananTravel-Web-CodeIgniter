<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Travel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Travel</li>
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
                        <h3 class="card-title">Data Travel</h3>
                        <button class="ml-2 btn btn-primary btn-xs" onclick="tambah_travel()">
                            <span class="fas fa-plus-square"></span> Tambah Travel
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
                                        <th>Jumlah Armada</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Travel</th>
                                        <th>Jumlah Armada</th>
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

<!-- Form Tambah Travel Data Awal Modal-->
<div class="modal fade" id="formTambahModal" tabindex="-1" role="dialog" aria-labelledby="formTambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formTambahModalLabel">Form Tambah Travel</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="formTambah" class="form-horizontal">
                    <div class="form-group">
                        <label for="nama_travel">Nama Travel:</label>
                        <input type="text" class="form-control" id="nama_travel" name="nama_travel" placeholder="Masukkan Nama Travel...">
                        <span class="help-block text-danger"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnAddTravel" onclick="add_travel()" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--// Form Tambah Travel Data Awal Modal-->


<!-- Form Tambah Travel Data Awal Modal-->
<div class="modal fade" id="formEditModal" tabindex="-1" role="dialog" aria-labelledby="formEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formEditModalLabel">Form Tambah Travel</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="formEdit" class="form-horizontal">
                    <input type="hidden" name="id_travel">
                    <div class="form-group">
                        <label for="nama_travel">Nama Travel:</label>
                        <input type="text" class="form-control" id="nama_travel" name="nama_travel" placeholder="Masukkan Nama Travel...">
                        <span class="help-block text-danger"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnUpdate" onclick="update_travel()" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--// Form Tambah Travel Data Awal Modal-->

<!-- Ajax Travel-->
<script>
    var save_method; //for save method string
    var table;

    //tabel Travel ajax
    $(document).ready(function() {
        table = $('#tabel').DataTable({
            "processing": true,
            "serverSide": true,
            // "deferLoading": 0,
            "order": [], //Initial no order.
            "ajax": {
                "url": "<?= base_url($users['role'] . '/get_ajax_travel') ?>",
                "type": "POST",
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0, 3], //first column / numbering column
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

    function tambah_travel() {
        $('#formTambah')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#formTambahModal').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Travel'); // Set Title to Bootstrap modal title
    }

    function add_travel() {
        $('#btnAddTravel').text('Adding...'); //change button text
        $('#btnAddTravel').attr('disabled', true); //set button disable 

        // ajax adding data to database
        var formData = new FormData($('#formTambah')[0]);
        $.ajax({
            url: "<?php echo site_url($users['role'] . '/insert_travel_ajax') ?>",
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
                    toastr.success('Travel telah berhasil ditambahkan.', 'Success!');
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {

                        $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error'); //select parent to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string

                    }
                    toastr.error('Mohon lengkapi seluruh data yang ada.', 'Error!');
                }
                $('#btnAddTravel').text('Add'); //change button text
                $('#btnAddTravel').attr('disabled', false); //set button enable 
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding data!');
                $('#btnAddTravel').text('Add'); //change button text
                $('#btnAddTravel').attr('disabled', false); //set button enable 

            }
        });
    }

    function edit_travel(id_travel) {
        $('#formEdit')[0].reset(); // reset form on modals\
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url($users['role'] . '/edit_travel_ajax') ?>/" + id_travel,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="nama_travel"]').val(data.nama_travel);
                $('[name="id_travel"]').val(data.id_travel);
                $('#formEditModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Travel'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error('Mohon lengkapi seluruh data yang ada.', 'Error!');
            }
        });
    }

    function update_travel() {
        $('#btnUpdate').text('Updating...'); //change button text
        $('#btnUpdate').attr('disabled', true); //set button disable 

        // ajax adding data to database
        var formData = new FormData($('#formEdit')[0]);
        $.ajax({
            url: "<?php echo site_url($users['role'] . '/update_travel_ajax') ?>",
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
</script>