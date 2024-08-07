  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link">
      <img src="<?= base_url('assets'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <?php if ($title == 'Home') : ?>
              <a href="<?= base_url(); ?>" class="nav-link active">
              <?php else : ?>
                <a href="<?= base_url(); ?>" class="nav-link">
                <?php endif; ?>
                <i class="nav-icon fas fa-home"></i>
                <p>Home <!-- <span class="right badge badge-danger">New</span> --> </p>
                </a>
          </li>
          <li class="nav-item">
            <?php if ($title == 'Mata Kuliah') : ?>
              <a href="<?= base_url('matakuliah'); ?>" class="nav-link active">
              <?php else : ?>
                <a href="<?= base_url('matakuliah'); ?>" class="nav-link">
                <?php endif; ?>
                <i class="nav-icon far fa-circle"></i>
                <p>Mata Kuliah <!-- <span class="right badge badge-danger">New</span> --> </p>
                </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('kontrak'); ?>" class="nav-link">
              <i class="nav-icon far fa-circle "></i>
              <p>Kontrak Nilai <!-- <span class="right badge badge-danger">New</span> --> </p>
            </a>
          </li>
          <li class="nav-item">
            <?php if ($title == 'Mahasiswa') : ?>
              <a href="<?= base_url('mahasiswa'); ?>" class="nav-link active">
              <?php else : ?>
                <a href="<?= base_url('mahasiswa'); ?>" class="nav-link">
                <?php endif; ?>
                <i class="nav-icon far fa-circle "></i>
                <p>Mahasiswa</p>
                </a>
          </li>
          <li class="nav-item">
            <?php if ($title == 'Nilai Kuliah') : ?>
              <a href="<?= base_url('nilai'); ?>" class="nav-link active">
              <?php else : ?>
                <a href="<?= base_url('nilai'); ?>" class="nav-link">
                <?php endif; ?>
                <i class="nav-icon far fa-circle "></i>
                <p>Nilai Kuliah</p>
                </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>