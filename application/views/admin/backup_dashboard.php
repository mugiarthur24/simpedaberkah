<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
<!-- lgo -->
<link rel="shortcut icon" href="<?php echo base_url($brand); ?>">
<!-- css bootsrap 4.0 beta -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/themify-icons.css') ?>">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="<?php echo base_url('asset/js/jquery-3.2.1.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body style="background-color: #eeeeee">

  <div class="">
    <?php if ($this->ion_auth->is_admin()): ?>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="font-size: 13px;">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url('index.php/admin/dashboard/') ?>"><i class="ti ti-panel"></i> Dashboard <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url('index.php/admin/pegawai/') ?>"><i class="ti ti-bag"></i> Pegawai</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url('index.php/admin/honorer/') ?>"><i class="ti ti-receipt"></i> Honorer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-warning" href="<?php echo base_url('index.php/admin/sppd_ld/') ?>"><i class="ti ti-car"></i> SPPD</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url('index.php/admin/users/') ?>"><i class="ti ti-user"></i> User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="<?php echo base_url('index.php/admin/setting') ?>"><i class="ti ti-settings"></i> Pengaturan</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <?php endif ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
          <a class="navbar-brand" href="#">
            <img src="<?php echo base_url($brand); ?>" width="30" height="30" alt="">
          </a>
          <a class="navbar-brand" href="#"><?php echo $infopt->alias_pt; ?></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if ($this->ion_auth->is_admin()): ?>
              <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti ti-server"></i> Master
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/') ?>"><i class="ti ti-direction"></i> Status Pegawai</a>
                    <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/satuan_kerja') ?>"><i class="ti ti-check-box"></i> Satuan Kerja</a>
                    <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/golongan') ?>"><i class="ti ti-comments-smiley"></i> Golongan</a>
                    <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/eselon') ?>"><i class="ti ti-share"></i> Eselon</a>
                    <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/jabatan') ?>"><i class="ti ti-ink-pen"></i> Jabatan</a>
                    <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/biaya_harian') ?>"><i class="ti ti-money"></i> Biaya Harian</a>
                    <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/biaya_hotel') ?>"><i class="ti ti-money"></i> Biaya Hotel</a>
                    <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/mata_anggaran') ?>"><i class="ti ti-bar-chart"></i> Mata Anggaran</a>
                    <a class="dropdown-item" href="<?php echo base_url('index.php/admin/master/provinsi') ?>"><i class="ti ti-flag-alt-2"></i> Provinsi</a>
                </div>
                </li >
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="ti ti-notepad"></i> Laporan
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url('index.php/admin/Export_excel') ?>"><i class="ti ti-user"></i> Pegawai</a>
                    <a class="dropdown-item" href="<?php echo base_url('index.php/admin/export/ex_bpk') ?>"><i class="ti-layers-alt"></i> BPK (PNS)</a>
                    <a class="dropdown-item" href="<?php echo base_url('index.php/admin/export/ex_bpk') ?>"><i class="ti-layers-alt"></i> BPK (Magang / Honorer)</a>
                  </div>
                </li >
              </ul>
              <?php else: ?>
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('index.php/admin/pegawai/detail/'.$users->id_pegawai) ?>">Profil Pegawai</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('index.php/admin/users/edit/'.$users->id) ?>">Edit Akun User</a>
                  </li>
                  <?php if ($this->ion_auth->in_group('skpd')): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('index.php/admin/pegawai/') ?>">Daftar Pegawai SKPD</a>
                    </li>
                  <?php endif ?>
                </ul>
            <?php endif ?>
            <form class="form-inline my-2 my-lg-0">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $users->username; ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url('index.php/login/logout') ?>">Logout</a>
                  </div>
                </li >
                <!--  -->
                <li class="nav-item">
                  <div class="nav-link text-center" href="#">
                   <img class="rounded-circle align-self-center mr-3" src="<?php echo base_url('asset/img/users/'.$users->profile) ?>" alt="<?php echo $users->profile;?>" width="30px">
                 </div>
               </li>
            </ul>
            
          </form>
        </div>
      </div>
  </nav>
</div>
<div class="mt-4"></div>
<div class="container">
  <?php if ($this->session->flashdata('message')): ?>
        <div class="alert alert-danger mb-4"><i class="ti ti-alert"></i> <?php echo $this->session->flashdata('message');?></div>
      <?php endif ;?>
  <div class="card">
    <div class="card-body">
      <?php $this->view($page); ?>
      
    </div>
  </div>
</div>
</body>
</html>

