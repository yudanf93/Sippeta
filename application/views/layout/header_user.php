<body>
  <nav class="navbar pt navbar-expand-lg sticky-top">
    <img class="navbar-brand" src="<?php echo base_url(); ?>frontend/assets/images/logo.png" alt="logo-sip-peta">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span><i class="fa fa-align-justify iconStyle"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('home') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('user/bukti_pembayaran') ?>">Upload Bukti Pembayaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('user/list_pengajuan') ?>">Pengajuan Berkas</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?php echo base_url('login/logout') ?>">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>