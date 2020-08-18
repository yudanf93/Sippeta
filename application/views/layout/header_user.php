<body>
  <nav class="navbar navbar-expand-lg navStyle sticky-top">
      <a class="brand-navbar" href="<?php echo base_url('home') ?>">
        <img class="img-fluid logo" src="<?php echo base_url(); ?>assets/frontend/assets/images/logo-perusahaan.png" alt="logo-perusahaan">
      </a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#mainMenu">
          <span><i class="fa fa-align-right iconStyle"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="mainMenu">
          <ul class="navbar-nav ml-auto navList">
              <li class="nav-item active">
                <a href="<?php echo base_url('home') ?>" class="nav-link">Home</a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo base_url('user/profil') ?>" class="nav-link">Profil</a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo base_url('user/manajemen_artikel') ?>" class="nav-link">Manajemen Artikel</a>
              </li>
          </ul>
          <a href="<?php echo base_url('login/logout') ?>" style="color: #393939;"><i class="fa fa-user" style="color: #91A440"></i> Logout</a>
      </div>
  </nav>