 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Profile</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item active">Profile</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">

         <!-- Default box -->
         <div class="card-body pb-0">
             <div class="row d-flex align-items-stretch">
                 <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                     <div class="card bg-light">
                         <div class="card-header text-muted border-bottom-0">
                             Welcome!
                         </div>
                         <div class="card-body pt-0">
                             <div class="row">
                                 <div class="col-7">
                                     <h2 class="lead"><b><?= $users['nama'] ?></b></h2>
                                     <p class="text-muted text-sm"><b>Role: </b> <?= $users['role'] ?> </p>
                                     <ul class="ml-4 mb-0 fa-ul text-muted">
                                         <li class="small"><span class="fa-li"><i class="fas fa-lg fa-users"></i> </span> Username: <?= $users['username'] ?></li>
                                     </ul>
                                 </div>
                                 <div class="col-5 text-center">
                                     <img src="<?= base_url('assets/') ?>dist/img/users.png" alt="" class="img-circle img-fluid">
                                 </div>
                             </div>
                         </div>
                         <div class="card-footer">

                         </div>
                     </div>

                 </div>
             </div>

         </div>
         <!-- /.card -->

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->