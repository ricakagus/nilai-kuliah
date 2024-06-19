   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
       <div class="container-fluid">
         <div class="row mb-2">
           <div class="col-sm-6">
             <h1 class="m-0">Mata Kuliah</h1>
           </div><!-- /.col -->
           <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Mata Kuliah</li>
             </ol>
           </div><!-- /.col -->
         </div><!-- /.row -->
       </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->

     <!-- Main content -->
     <div class="content">
       <div class="container-fluid">
         <div class="row">
           <div class="col-lg-12">
             <div class="card card-primary card-outline">
               <div class="card-header d-flex">
                 <div class="card-title flex-grow-1">Data Mata Kuliah</div>
                 <a href="<?= base_url('matakuliah/inputmk'); ?>" class="btn btn-primary btn-sm btn-animation">+ tambah</a>
               </div>
               <div class="card-body">

                 <!-- tabel mata kuliah -->
                 <table id="example1" class="table table-bordered table-striped">
                   <thead>
                     <tr>
                       <th>#</th>
                       <th>Kode MK</th>
                       <th>Nama MK</th>
                       <th>SKS Teori</th>
                       <th>SKS Praktik</th>
                       <th>Totak SKS</th>
                       <th>Aksi</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php $i = 1; ?>
                     <?php foreach ($matakuliah as $mk) : ?>
                       <tr>
                         <td><?= $i++; ?></td>
                         <td><?= $mk['kodeMK']; ?></td>
                         <td><?= $mk['nama']; ?></td>
                         <td><?= $mk['sksTeori']; ?></td>
                         <td><?= $mk['sksPraktik']; ?></td>
                         <td><?= $mk['totalSKS']; ?></td>
                         <td>
                           <a class="btn btn-primary btn-sm" href="<?= base_url('matakuliah/detailmk/' . $mk['id']); ?>"><i class="fas fa-eye"></i></a>
                           <a class="btn btn-danger btn-sm" href="<?= base_url('matakuliah/deletemk/' . $mk['id']); ?>" onclick="return confirm('hapus data mahasiswa, yakin?');" title="hapus"><i class="fas fa-trash-alt"></i></a>
                         </td>
                       </tr>
                     <?php endforeach; ?>
                   </tbody>
                   <tfoot>
                     <tr>
                       <th>#</th>
                       <th>Kode MK</th>
                       <th>Nama MK</th>
                       <th>SKS Teori</th>
                       <th>SKS Praktik</th>
                       <th>Totak SKS</th>
                       <th>Aksi</th>
                     </tr>
                   </tfoot>
                 </table>
               </div>
               <!-- /end tabel mata kuliah -->

             </div>
           </div>
         </div>
         <!-- /.col-md-6 -->
         <!-- /.row -->
       </div><!-- /.container-fluid -->
     </div>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->

   <!-- Control Sidebar -->
   <!-- <aside class="control-sidebar control-sidebar-dark"> -->
   <!-- Control sidebar content goes here -->
   <!-- <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside> -->
   <!-- /.control-sidebar -->