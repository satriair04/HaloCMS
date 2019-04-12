

    <nav class="navbar navbar-expand navbar-dark bg-dark sticky-top">

      <a class="navbar-brand mr-1" href="https://www.halloriau.com/" target="_blank" data-toggle="tooltip" title="Our #1 News portal"><i class="fas fa-home"></i> Halloriau.com</a>

      <!-- Menu mid -->
      <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0 align-items-center">
        <li class="nav-item" data-toggle="tooltip" title="Tambah pengguna baru">
          <a class="nav-link" href="<?php echo site_url('access/admin/create')?>">
            <i class="fas fa-user-plus fa-fw"></i>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" title="Beranda sistem">
          <a class="nav-link" href="<?php echo site_url()?>">
            <i class="fas fa-home fa-fw"></i>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" title="Laporan">
          <a class="nav-link" href="<?php echo site_url('access/laporan')?>">
            <i class="fas fa-chart-line fa-fw"></i>
          </a>
        </li>
      </ul>

      <!-- Menu Left -->
      <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <li class="nav-item" data-toggle="tooltip" title="Akun kamu: <?php echo $this->session->userdata('acc_name')?>">
          <a class="nav-link" href="<?php echo site_url('access/profile')?>">
            <i class="fas fa-user fa-fw"></i>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" title="Keluar sistem">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal" >
            <i class="fas fa-power-off fa-fw"></i>
          </a>
        </li>
      </ul>

    </nav>