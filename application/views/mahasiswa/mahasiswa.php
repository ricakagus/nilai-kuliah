<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- <h1 class="m-0">Mahasiswa</h1> -->
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
        <div class="col-lg-12">
          <div class="card card-primary card-outline">
            <div class="card-header d-flex">
              <div class="card-title flex-grow-1">Data Mahasiswa</div>
              <a href="<?= base_url('mahasiswa/input') ?>" class="btn btn-primary btn-sm btn-animation">+ tambah</a>
            </div>
            <!-- /.end card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($mahasiswa as $mhs) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $mhs['nim']; ?></td>
                      <td><?= $mhs['nama']; ?></td>
                      <td><?= $mhs['prodi']; ?></td>
                      <td>
                        <a href="<?= base_url('mahasiswa/detail/' . $mhs['id']); ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                        <a href="<?= base_url('mahasiswa/delete/' . $mhs['id']); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /. end card-bory -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->