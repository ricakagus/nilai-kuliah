<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Nilai Kuliah</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active">Detail Nilai Kuliah</li>
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
        <div class="col-lg-8">
          <form action="" method="post">
            <div class="card card-primary card-outline">
              <div class="card-header d-flex">
                <input type="hidden" name="kodeMK" value="<?= $nilaiAkhir['kodeMK']; ?>">
                <div class="card-title flex-grow-1">Mata Kuliah: <strong class="text-primary"><?= $nilaiAkhir['mataKuliah']; ?></strong></div>
                <a href="<?= base_url('nilai/detail/' . $nilaiAkhir['kodeMK']); ?>" class="btn btn-secondary btn-sm btn-animation">
                  < kembali</a>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">NIM</label>
                      <input type="text" class="form-control" name="nim" value="<?= $nilaiAkhir['nim']; ?>" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Nama</label>
                      <input type="text" class="form-control" name="nim" value="<?= $nilaiAkhir['nama']; ?>" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    Kehadiran
                    <input type="text" name="kehadiran" value="<?= $nilaiAkhir['nilaiKehadiran']; ?>" class=" form-control">
                  </div>
                  <div class="col-3">
                    Tugas
                    <input type="text" name="tugas" value="<?= $nilaiAkhir['nilaiTugas']; ?>" class="form-control">
                  </div>
                  <div class="col-3">
                    UTS
                    <input type="text" name="uts" value="<?= $nilaiAkhir['nilaiUTS']; ?>" class="form-control">
                  </div>
                  <div class="col-3"> UAS
                    <input type="text" name="uas" value="<?= $nilaiAkhir['nilaiUAS']; ?>" class="form-control">
                  </div>
                </div>

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">update</button>
                &nbsp;
                <a href="<?= base_url('nilai/detail/' . $nilaiAkhir['kodeMK']); ?>" class="btn btn-secondary">kembali</a>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /. row -->
    </div>
    <!-- /. container-fluid -->
  </div>
  <!-- /. content -->
</div>
<!-- /, content-wrapper -->