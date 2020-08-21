<section id="konten-login">
  <div class="container">
    <div class="row">
      <div class="login">

      <?php echo validation_errors('<div class="alert alert-danger" style="text-align: center">', '</div>');?>
         <?php echo form_open_multipart(site_url('user/list_pengajuan/add')) ?>
      <form>

        <h1 class="title-login">Form Pengajuan Berkas SIP PETA</h1>
        <div class="form-group">
          <label for="">Nama Berkas</label>
          <input type="text" class="form-control c" name="nama_berkas" placeholder="Masukkan nama berkas yang di ajukan">
          <input type="text" class="form-control" name="id_user" value="<?php echo $user->nama_user ?>" readonly hidden >
          <input type="text" class="form-control" name="status_berkas" value="2" readonly hidden>
          <input type="text" class="form-control" name="kode_pembayaran" value="-" readonly hidden>
          <input type="text" class="form-control" name="biaya_berkas" value="-" readonly hidden>
        </div>
        <div class="form-group">
          <label for="">Upload Bukti Pembayaran</label>
          <input type="file" name="file_berkas" class="form-control c">
        </div>
        <button type="submit" class="btn btn-warning sippeta c">Submit</button>
      </a>

    </form>
    <?php echo form_close(); ?>
  </div>

  </div>
</div>
</section>
