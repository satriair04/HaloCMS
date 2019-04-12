
    <nav class="navbar navbar-expand navbar-dark bg-dark sticky-top">

      <!-- Menu left -->
		<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
				  <a class="navbar-brand nav-link mr-1" href="https://www.halloriau.com/" target="_blank" data-toggle="tooltip" title="Our #1 News portal"> Halloriau.com</a>
				</li>
		  </ul>
		</div>

      <!-- Menu mid -->
	  <div class="navbar-collapse collapse w-100 order-2 order-md-0 dual-collapse2">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item <?php if($this->uri->segment(3)=="create"){echo 'active';}?>" data-toggle="tooltip" title="Buat draft baru">
				  <a class="nav-link" href="<?php echo site_url('access/wartawan/create')?>">
					<i class="fas fa-pen-square fa-fw"></i>
				  </a>
				</li>
				<li class="nav-item <?php if($this->uri->segment(2)=="wartawan" && $this->uri->segment(3)=="index" || $this->uri->segment(3)=="read" || $this->uri->segment(3)=="update" || $this->uri->segment(3)=="files"){echo 'active';}?>" data-toggle="tooltip" title="Home / beranda">
				  <a class="nav-link" href="<?php echo site_url()?>">
					<i class="fas fa-home fa-fw"></i>
				  </a>
				</li>
				<li class="nav-item <?php if($this->uri->segment(2)=="laporan"){echo 'active';}?>" data-toggle="tooltip" title="Laporan">
				  <a class="nav-link" href="<?php echo site_url('access/laporan')?>">
					<i class="fas fa-chart-line fa-fw"></i>
				  </a>
				</li>
			</ul>
		</div>
      

      <!-- Menu Left -->
		<div class="navbar-collapse collapse w-100 order-3 order-md-0 dual-collapse2">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item <?php if($this->uri->segment(2)=="profile"){echo 'active';}?>" data-toggle="tooltip" title="Profile kamu: <?php echo $this->session->userdata('acc_name')?>">
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
		</div>

    </nav>