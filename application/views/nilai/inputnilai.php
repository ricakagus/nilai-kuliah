<!-- Content Wrapper. Contains page content -->
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
            <li class="breadcrumb-item active">Input Nilai Kuliah</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <form action="" method="post">
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="form-group">
                  <label for="">Tahun Akademik</label>
                  <select name="tahunakademik" class="form-control">
                    <option value="">--pilih--</option>
                    <?php foreach ($tahunakademik as $ta) : ?>
                      <option value="<?= $ta['tahunakademik']; ?>"><?= $ta['tahunakademik']; ?></option>
                    <?php endforeach; ?>
                  </select>

                  <small class="form-text text-danger"><?= form_error('tahunakademik'); ?></small>
                </div>
                <div class="form-group">
                  <label for="">Mata Kuliah</label>
                  <select name="matakuliah" id="" name="matakuliah" class="form-control">
                    <option value="">pilih mata kuliah</option>
                    <?php foreach ($matakuliah as $mk) : ?>
                      <option value="<?= $mk['nama']; ?>"><?= $mk['nama']; ?></option>
                    <?php endforeach; ?>
                  </select>

                  <small class="form-text text-danger"><?= form_error('matakuliah'); ?></small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <button type="submit" class="btn btn-primary">simpan</button>
                    &nbsp;
                    <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-secondary">kembali</a>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="">Mahasiswa</label>
                      <select class="form-control" name="mahasiswa">
                        <option value="">--pilih--</option>
                        <?php foreach ($mahasiswa as $mhs) : ?>

                          <option value="<?= $mhs['nim'] ?>"><?= $mhs['nim'], " - ", $mhs['nama']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <small class="form-text text-danger"><?= form_error('mahasiswa'); ?></small>
                    </div>
                  </div>
                  <!-- <div class="col-6">
                    <div class="form-group">
                      <label for="">Nama</label>
                      <input type="text" name="nama" class="form-control" id="" placeholder="nama" readonly>
                    </div>
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="card card-secondary card-outline">
                      <div class="card-header">
                        <div class="card-title">
                          <strong>Nilai</strong>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-3">
                            Kehadiran
                            <input type="text" name="kehadiran" id="" class="form-control">
                          </div>
                          <small class="form-text text-danger"><?= form_error('kehadiran'); ?></small>
                          <div class="col-3">
                            Tugas
                            <input type="text" name="tugas" id="" class="form-control">
                          </div>
                          <small class="form-text text-danger"><?= form_error('tugas'); ?></small>
                          <div class="col-3">
                            UTS
                            <input type="text" name="uts" id="" class="form-control">
                          </div>
                          <small class="form-text text-danger"><?= form_error('uts'); ?></small>
                          <div class="col-3">
                            UAS
                            <input type="text" name="uas" id="" class="form-control">
                          </div>
                          <small class="form-text text-danger"><?= form_error('uas'); ?></small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Nilai Akhir</label>
                      <input type="text" name="nilaiAkhir" id="" class="form-control">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Nilai Huruf</label>
                      <input type="text" name="nilaiHuruf" id="" class="form-control">
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>



      </form>


    </div>
  </div>
</div>