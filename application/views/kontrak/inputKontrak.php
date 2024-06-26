<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Input aKontrak Nilai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active">Kontrak Nilai</li>
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
          <div class="card card-primary card-outline">
            <form action="" method="post">

              <div class="card-body mb-0">
                <div class="form-group">
                  <label for="inputNIM">Tahun Akademik</label>
                  <input type="text" class="form-control" name="tahunakademik" id="" placeholder="xxxxx" value="<?= set_value('tahunakademik'); ?>">
                  <small class="form-text text-success ps-6">
                    kombinasi tahun dan angka semester
                  </small>
                  <small class="form-text text-danger"><?= form_error('tahunakademik'); ?></small>
                </div>
                <div class="form-group">

                  <label for="inputNama">Mata Kuliah</label>
                  <select name="matakuliah" class="form-control">
                    <option value="">pilih mata kuliah</option>
                    <?php foreach ($dataMataKuliah as $dm) : ?>
                      <?php if (set_value('matakuliah') == $dm['nama']) : ?>
                        <option value="<?= $dm['nama']; ?>" selected><?= $dm['nama'] ?></option>
                      <?php else : ?>
                        <option value="<?= $dm['nama']; ?>"><?= $dm['nama']; ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                  <small class="form-text text-danger"><?= form_error('matakuliah'); ?></small>
                </div>
                <div class="form-group">
                  <div class="row pb-0">
                    <div class="col-3">
                      <label for="">Kehadiran</label>
                      <div class="input-group ">
                        <input type="text" class="form-control" name="kehadiran">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                        <small class="form-text text-danger"><?= form_error('kehadiran'); ?> </small>
                      </div>

                    </div>
                    <div class="col-3">
                      <label for="">Tugas</label>
                      <div class="input-group ">
                        <input type="text" class="form-control" name="tugas">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-3">
                      <label for="">UTS</label>
                      <div class="input-group ">
                        <input type="text" class="form-control" name="uts">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-3">
                      <label for="">UAS</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="uas">
                        <div class="input-group-append">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?= $this->session->flashdata('warning'); ?>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">simpan</button>
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