  <!-- konten -->
  <section id="konten-login">
    <div class="container">
      <div class="row">
        <form action="<?php echo site_url('login') ?>" method="post" class="login">
          <h1 class="title-login">Login SIP PETA</h1>
          <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
          <?php
          if ($this->session->flashdata('pesan')) {
            echo "<br>";
            echo "<div class='alert alert-danger alert-dismissible fade show'><center>";
            echo $this->session->flashdata('pesan');
            echo "</center><button type='button' class='close' data-dismiss='alert'>
            </button></div>";
          }  
          ?>  
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control c" id="inputEmail" placeholder="Masukkan email Anda" name="email_user">
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control c" id="inputPassword" placeholder="Masukkan password Anda" name="passsword_user">
          </div>
          <button type="submit" class="btn btn-warning sippeta c">Login</button>
        </form>
      </div>
    </div>
  </section>
