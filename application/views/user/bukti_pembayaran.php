  <!-- konten -->
  <section id="konten-login">
    <div class="container">
      <div class="row">
        <div class="login">
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
        <?php echo form_open_multipart(site_url('/user/bukti_pembayaran/add')) ?>
        <form>
          <h1 class="title-login">Form Upload Bukti Pembayaran</h1>
          <div class="form-group">
            <label for="">Nama Pembayar</label>
            <input type="text" class="form-control c" id="" name="nama_pembayaran" placeholder="Masukkan nama pembayar">
          </div>
          <div class="form-group">
            <label for="">Jumlah Pembayaran</label>
            <input type="number" class="form-control c" id="" name="nominal_pembayaran" placeholder="Masukkan jumlah pembayaran">
          </div>
          <div class="form-group">
            <label for="">Tanggal Pembayaran</label>
            <input type="date" class="form-control c" id="" name="tglbayar_pembayaran" placeholder="Masukkan tanggal pembayaran">
          </div>
          <div class="form-group">
            <label for="">Upload Bukti Pembayaran</label>
            <input type="file" class="form-control c" id="" name="bukti_pembayaran" required>
          </div>
          <button type="submit" class="btn btn-warning sippeta c">Submit</button>
        </form>
        <?php echo form_close(); ?>
      </div>
      </div>
    </div>
  </section>