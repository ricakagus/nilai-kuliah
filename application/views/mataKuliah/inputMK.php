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
             <li class="breadcrumb-item"><a href="<?= base_url(''); ?>">Home</a></li>
             <li class="breadcrumb-item"><a href="<?= base_url('matakuliah'); ?>">Mata Kuliah</a></li>
             <li class="breadcrumb-item active">Input Mata Kuliah</li>
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
         <div class="col-lg-6">
           <div class="card card-primary card-outline">
             <form action="" method="post">
               <div class="card-body">
                 <div class="form-group">
                   <label for="kodeMataKuliah">Kode Mata Kuliah</label>
                   <input type="text" class="form-control" id="kodeMataKuliah" name="kodeMataKuliah" placeholder="Kode Mata Kuliah">
                   <small class="form-text text-danger"><?= form_error('kodeMataKuliah'); ?></small>
                 </div>
                 <div class="form-group">
                   <label for="namaMataKuliah">Nama Mata Kuliah</label>
                   <input type="text" class="form-control" id="namaMataKuliah" name="namaMataKuliah" placeholder="Nama Mata Kuliah">
                   <small class="form-text text-danger"><?= form_error('namaMataKuliah'); ?></small>
                 </div>

                 <div class="form-group">
                   <div class="row">
                     <div class="col-sm-4 d-flex align-items-center">
                       <label for="">Bobot SKS</label>
                     </div>
                     <div class="col-sm-2">
                       <label for="">Teori</label>
                       <select name="sksTeori" id="sksTeori" class="form-control">
                         <option value="">-</option>
                         <option value="1">1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                         <option value="4">4</option>
                         <option value="6">6</option>
                         <option value="20">20</option>
                       </select>
                     </div>
                     <div class="col-sm-2">
                       <label for="">Praktik</label>
                       <select name="sksPraktik" id="sksPraktik" class="form-control">
                         <option value="">-</option>
                         <option value="1">1</option>
                         <option value="2">2</option>
                         <option value="3">3</option>
                         <option value="4">4</option>
                         <option value="6">6</option>
                         <option value="20">20</option>
                       </select>
                     </div>
                   </div>
                 </div>
               </div>
               <!-- /.card-body -->
               <div class="card-footer">
                 <button type="submit" class="btn btn-primary">Submit</button>
                 <a href="<?= base_url('matakuliah'); ?>" type="button" class="btn btn-secondary">back</a>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>