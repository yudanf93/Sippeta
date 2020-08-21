  <!-- konten -->
  <section id="konten-pengaduan">
    <div class="container">
      <div class="row">
        <div class="pengaduan">
          <?php
          if ($this->session->flashdata('notifikasi')) {
            echo "<br>";
            echo "<div class='alert alert-success alert-dismissible fade show'><center>";
            echo $this->session->flashdata('notifikasi');
            echo "</center><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button></div>";
          }
          ?>      
        <?php echo validation_errors('<div class="alert alert-danger" style="text-align: center">', '</div>');?>
        <?php echo form_open_multipart(site_url('/pengaduan/add')) ?>
        <form>
          <h1 class="title-pengaduan">PENGADUAN</h1>
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control r" id="" name="nama_pengaduan" placeholder="Masukkan nama Anda">
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control r" id="" name="email_pengaduan" placeholder="Masukkan email Anda">
          </div>
          <div class="form-group">
            <label for="">No. Hp</label>
            <input type="number" class="form-control r" id="" name="nohp_pengaduan" placeholder="Masukkan no handphone Anda">
          </div>
          <div class="form-group">
            <label for="">Pengaduan</label>
            <textarea class="form-control r" rows="3" name="pesan_pengaduan" placeholder="Masukkan pengaduan Anda"></textarea>
          </div>
          <button type="submit" class="btn btn-warning sippeta r">Submit</button>
        </form>
        <?php echo form_close(); ?>
      </div>
      </div>
    </div>  
  </section>