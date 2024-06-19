<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mahasiswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active">Mahasiswa</li>
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
                  <label for="inputNIM">NIM</label>
                  <input type="text" class="form-control" name="nim" id="inputNIM" placeholder="NIM" value="<?= $mahasiswa['nim']; ?>">
                  <!-- untuk menampilak pesan eror validasi : -->
                  <small class="form-text text-danger"><?= form_error('nim'); ?></small>
                </div>
                <div class="form-group">
                  <label for="inputNama">Nama</label>
                  <input type="text" class="form-control" name="nama" id="inputNama" placeholder="Nama" value="<?= $mahasiswa['nama']; ?>">
                  <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                </div>
                <div class="form-group">
                  <label>Program Studi</label>
                  <select class="form-control" name="prodi">
                    <option value="" <?= ($mahasiswa['prodi'] == "") ? 'selected' : ''; ?>>prodi</option>
                    <option value="TRM" <?= ($mahasiswa['prodi'] == "TRM") ? 'selected' : ''; ?>>Teknologi Rekayasa Manufaktur</option>
                    <option value="TRMK" <?= ($mahasiswa['prodi'] == "TRMK") ? 'selected' : ''; ?>>Teknologi Rekayasa Mekanotrika</option>
                    <option value="TL" <?= ($mahasiswa['prodi'] == "TL") ? 'selected' : ''; ?>>Teknologi Listrik</option>
                    <option value="TRPL" <?= ($mahasiswa['prodi'] == "TRPL") ? 'selected' : ''; ?>>Teknologi Rekayasa Perangkat Lunak</option>
                  </select>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">update</button>
                  &nbsp;
                  <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-secondary">kembali</a>
                </div>
              </div>
              <!-- /.card-body -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>