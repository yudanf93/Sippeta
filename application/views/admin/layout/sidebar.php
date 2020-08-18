<div class="wrapper">
  <!-- Sidebar Holder -->
  <nav id="sidebar">
    <div class="sidebar-header">
      <center> 
        <img src="<?php echo base_url();?>img/img_user/<?php echo $this->session->userdata('foto'); ?>" alt="Foto_Profil" class="rounded-circle coba mb-2" width="60%">
        <br>
        <span><?php echo $this->session->userdata('nama_user'); ?></span> 
        <hr>
      </center>
    </div>

    <ul class="list-unstyled components">
      <li>
        <a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fas fa-tachometer-alt pr-2"></i> Dasboard</a>
      </li>
      <li>
        <a href="<?php echo base_url('admin/user'); ?>"><i class="far fa-user pr-3"></i>User</a>
      </li>
      <li>
        <a href="<?php echo base_url('admin/berkas'); ?>"><i class="fa fa-book pr-3"></i>Berkas</a>
      </li>      
      <li>
        <a href="<?php echo base_url('admin/pembayaran'); ?>"><i class="fa fa-credit-card pr-3"></i>Pembayaran</a>
      </li>
            <li>
        <a href="<?php echo base_url('admin/pengaduan'); ?>"><i class="fa fa-comments pr-3"></i>Pengaduan</a>
      </li>


      <li>
        <a href="<?php echo base_url('login/logout'); ?>"><i class="fas fa-sign-out-alt pr-2"></i> Logout</a>
      </li>
    </ul>
  </nav>