  <!-- konten -->
  <section id="konten-login">
    <div class="container">
      <div class="row">
        <div class="login">
         <?php echo validation_errors('<div class="alert alert-danger" style="text-align: center">', '</div>');?>
        <?php echo form_open_multipart(site_url('/daftar/add')) ?>
        <form>
          <h1 class="title-login">Daftar SIP PETA</h1>
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control c" id="" name="nama_user" placeholder="Masukkan nama Anda">
            <input type="text" class="form-control c" id="" name="akses_level" value="user" hidden>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control c" id="" name="email_user" placeholder="Masukkan email Anda">         
          </div>
          <div class="form-group">
            <label for="">No. Hp</label>
            <input type="number" class="form-control c" id="" name="nohp_user" placeholder="Masukkan no handphone Anda">
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control c" id="" name="password_user" placeholder="Masukkan password Anda">
          </div>
          <button type="submit" class="btn btn-warning sippeta c">Daftar</button>
        </form>
        <?php echo form_close(); ?>
      </div>
      </div>
    </div>
  </section>