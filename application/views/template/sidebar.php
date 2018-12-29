<div class="wrapper">
  <?php $user_level = $this->session->userdata('user_level') ?>
  <div class="sidebar" data-background-color="white" data-image="<?php echo base_url();?>assets/img/sidebar.jpg" data-color="<?php echo $sidebar_color;?>">
    <div class="logo">
      <a href="<?= base_url()?>dashboard" class="simple-text logo-normal">
        <img src="<?php echo base_url();?>assets/img/logo_bssn_2.png" alt=""> <br>
        Sistem Informasi <br>Bagian Umum <br>Pusdiklat BSSN
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item <?php echo ($this->uri->segment(1) == 'dashboard' or $this->uri->segment(1) == '') ? 'active':''; ?> " color="purple">
          <a class="nav-link" href="<?php echo base_url();?>dashboard">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <?php if ($user_level == 1 || $user_level == 2): ?>
          <li class="nav-item <?php echo ($this->uri->segment(1) == 'outmail' or $this->uri->segment(1) == '') ? 'active':''; ?> " data-toggle="collapse" href="#submenuTU" role="button" aria-expanded="false" aria-controls="submenuTU" id="subagTU" color="danger">
            <a class="nav-link" href="#">
              <i class="material-icons">store</i>
              <p>Subag Tata Usaha</p>
            </a>
          </li>
          <div class="collapse" id="submenuTU">
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'inmail-internal-agenda' or $this->uri->segment(1) == '') ? 'active':''; ?> " data-toggle="collapse" href="#submenuInbox" role="button" aria-expanded="false" aria-controls="submenuInbox" color="danger">
              <a href="<?= base_url()?>inmail" class="nav-link">
                <i class="material-icons">all_inbox</i>
                <p>Surat Masuk</p>
              </a>
            </li>
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'outmail' or $this->uri->segment(1) == '') ? 'active':''; ?> ">
              <a href="<?= base_url('outmail')?>" class="nav-link">
                <i class="material-icons">send</i>
                <p>Surat Keluar</p>
              </a>
            </li>
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'data-employee' or $this->uri->segment(1) == '') ? 'active':''; ?>" color="danger">
              <a href="<?= base_url()?>pegawai" class="nav-link">
                <i class="material-icons">supervisor_account</i>
                <p>Data Kepegawaian</p>
              </a>
            </li>
          </div>
        <?php endif; ?>
          <li class="nav-item <?php echo ($this->uri->segment(1) == 'lapor-rusak' or $this->uri->segment(1) == '') ? 'active':''; ?>" data-toggle="collapse" href="#submenuRT" role="button" aria-expanded="false" aria-controls="submenuRT" color="azure">
            <a class="nav-link" href="#">
              <i class="material-icons">account_balance</i>
              <p>Subag Rumah Tangga</p>
            </a>
          </li>
          <div class="collapse" id="submenuRT">
          <?php if ($user_level !== 3): ?>
            <li class="nav-item">
              <a href="<?= base_url()?>lapor-rusak" class="nav-link">
                <i class="material-icons">assignment_late</i>
                <p>Laporan Kerusakan</p>
              </a>
            </li>
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'room-used' or $this->uri->segment(1) == '') ? 'active':''; ?>">
              <a href="<?= site_url('penggunaan-ruangan')?>" class="nav-link">
                <i class="material-icons">assignment</i>
                <p>Penggunaan Ruangan</p>
              </a>
            </li>
          <?php endif; ?>
            <?php if ($user_level !== 2): ?>
              <li class="nav-item" data-toggle="collapse" href="#submenuPinjam" role="button" aria-expanded="false" aria-controls="submenuInbox" >
                <a href="#" class="nav-link">
                  <i class="material-icons">view_module</i>
                  <p>BMN ART & ATK</p>
                </a>
              </li>
            <div class="collapse" id="submenuPinjam">
              <li class="nav-item <?php echo ($this->uri->segment(1) == 'peminjaman' or $this->uri->segment(1) == '') ? 'active':''; ?> ">
                <a href="<?= base_url()?>peminjaman" class="nav-link">
                  <i class="material-icons">event</i>
                  <p>Peminjaman BMN & ART</p>
                </a>
              </li>
              <li class="nav-item <?php echo ($this->uri->segment(1) == 'inmail-out-agenda' or $this->uri->segment(1) == '') ? 'active':''; ?> ">
                <a href="<?= base_url()?>permintaan-atk" class="nav-link">
                  <i class="material-icons">event</i>
                  <p>Permintaan ATK</p>
                </a>
              </li>
            </div>
          <?php endif; ?>
          </div>
        <?php if ($user_level == 1 || $user_level == 2): ?>
          <li class="nav-item <?php echo ($this->uri->segment(1) == 'agenda' or $this->uri->segment(1) == '') ? 'active':''; ?> " data-toggle="collapse" href="#submenuAgenda" role="button" aria-expanded="false" aria-controls="submenuAgenda" id="subagAgenda" color="green">
            <a class="nav-link" href="#">
              <i class="material-icons">list</i>
              <p>Agenda</p>
            </a>
          </li>
          <div class="collapse" id="submenuAgenda">
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'inmail-internal-agenda' or $this->uri->segment(1) == '') ? 'active':''; ?> ">
              <a href="<?= base_url()?>agenda-kegiatan" class="nav-link">
                <i class="material-icons">event</i>
                <p>Agenda Kegiatan</p>
              </a>
            </li>
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'inmail-internal-agenda' or $this->uri->segment(1) == '') ? 'active':''; ?> ">
              <a href="<?= base_url()?>agenda-personil" class="nav-link">
                <i class="material-icons">event</i>
                <p>Agenda Personil</p>
              </a>
            </li>
          </div>
        <?php endif; ?>
        <?php if ($user_level !== 4): ?>
          <li class="nav-item <?php echo ($this->uri->segment(1) == 'pengguna') ? 'active':''; ?>" color="orange" data-toggle="collapse" href="#submenuMaster" role="button" aria-expanded="false" aria-controls="subMaster" id="subMaster">
            <a class="nav-link" href="#">
              <i class="material-icons">tune</i>
              <p>Master Data</p>
            </a>
          </li>
          <div class="collapse" id="submenuMaster">
          <?php if ($user_level == 1): ?>
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'akses' or $this->uri->segment(1) == '') ? 'active':''; ?> ">
              <a href="<?=site_url('akses')?>" class="nav-link">
                <i class="material-icons">group</i>
                <p>Daftar Akses</p>
              </a>
            </li>
          <?php endif; ?>
          <?php if ($user_level !== 3): ?>
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'inmail-internal-agenda' or $this->uri->segment(1) == '') ? 'active':''; ?> ">
              <a href="<?= site_url('ruangan')?>" class="nav-link">
                <i class="material-icons">meeting_room</i>
                <p>Daftar Ruangan</p>
              </a>
            </li>
          <?php endif; ?>
        <?php if ($user_level !== 2): ?>
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'inmail-internal-agenda' or $this->uri->segment(1) == '') ? 'active':''; ?> ">
              <a href="<?= site_url('list-data-bmn')?>" class="nav-link">
                <i class="material-icons">chrome_reader_mode</i>
                <p>Daftar BMN dan ART</p>
              </a>
            </li>
          <?php endif; ?>
          </div>
        <?php endif; ?>
        <li class="nav-item <?php echo ($this->uri->segment(1) == 'profil' or $this->uri->segment(1) == 'new-user')? 'active':''; ?>">
          <a class="nav-link" href="<?=site_url('profil/'.$this->session->userdata('user_id'))?>">
            <i class="material-icons">person</i>
            <p>Profil</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <h3 class="navbar-wrapper-tittle"><?php echo $page_name;?></h3>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?=site_url('user/logout')?>">
                <i class="material-icons">exit_to_app</i>
                Keluar
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
