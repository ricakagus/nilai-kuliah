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
        <div class="col-lg">
          <div class="card card-primary card-outline">
            <div class="card-header d-flex">
              <input type="hidden" name="kodeMK" value="<?= $matkul['kodeMK']; ?>">
              <div class="card-title flex-grow-1">Mata Kuliah: <strong class="text-primary" nam><?= $matkul['nama']; ?></strong></div>
              <a href="<?= base_url('nilai'); ?>" class="btn btn-secondary btn-sm btn-animation">
                < kembali</a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Kehadiran</th>
                    <th>Tugas</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>N. Akhir</th>
                    <th>N. Huruf</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($nilaiMK as $nm) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $nm['nim']; ?></td>
                      <td><?= $nm['nama']; ?></td>
                      <td><?= $nm['nilaiKehadiran']; ?></td>
                      <td><?= $nm['nilaiTugas']; ?></td>
                      <td><?= $nm['nilaiUTS']; ?></td>
                      <td><?= $nm['nilaiUAS']; ?></td>
                      <td><?= $nm['nilaiAkhir']; ?></td>
                      <td><?= $nm['nilaiHuruf']; ?></td>
                      <td>
                        <a href="<?= base_url('nilai/edit/' . $nm['id']); ?>" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>
                        <a href="<?= base_url('nilai/deletemhs/' . $nm['id']); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Kehadiran</th>
                    <th>Tugas</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>N. Akhir</th>
                    <th>N. Huruf</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /. container-fluid -->
  </div>
  <!-- /. content -->
</div>
<!-- /. content-wrapper -->