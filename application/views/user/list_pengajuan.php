  <!-- konten -->
  <section id="konten-pembayaran">
    <div class="container">
      <div class="row" style="margin-bottom: 40px;">
        <div class="col-md-12">
          <h1 class="title-pembayaran">Tata Cara Pengajuan Berkas</h1>
        </div>
        <div class="col-md-12">
          <hr class="line-user">
          <div class="pembayaran">
            Alur Pengajuan Berkas SIP PETA
            <ol><br>
              <li>Silahkan login, jika belum mempunyai akun silahkan tekan tombol daftar untuk mendapatkan username dan password.</li>
              <li>Pengaju masuk kehalaman <b class="infobold">pengajuan berkas</b> untuk mendownload formulir pengajuan berkas.</li>
              <li>Pengaju mengisi form yang telah didownload, lalu diprint</li>
              <li>Tanda tangani formulir pengajuan dengan materai cukup.</li>
              <li>Pengaju menscan formulir pengajuan berkas yang telah ditanda tangani.</li>
              <li>Terakhir pengaju tinggal masuk lagi ke website dan upload berkas pada halaman <b class="infobold">pengajuan berkas</b> dengan klik tombol <b class="infobold">tambah</b> dibawah ini.</li>
            </ol>
            Formulir pengajuan berkas dapat diunduh <a href="#">disini</a>.
          </div>
        </div>   
      </div> 
      <div class="row">
        <div class="col-md-9">
          <h1 class="title-pembayaran">Pengajuan Berkas</h1>
        </div>
        <div class="col-md-3">
          <a href="<?php echo base_url('user/list_pengajuan/add') ?>" class="">
            <button type="button" class="btn btn-outline-primary p">Tambah</button>
          </a>
        </div>
        <div class="col-md-12">
          <hr class="line-user">
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
          <div class="pembayaran">
            <div class="table-responsive">
              <table id="table_id" class="display">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Berkas</th>
                    <th>Biaya Berkas</th>
                    <th>No. Invoice</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php   
                  $no = 1;
                  foreach ($pengajuan as $pengajuan):
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $pengajuan->nama_berkas; ?></td>
                      <td>Rp. <?php echo number_format($pengajuan->biaya_berkas,'0',',',',') ?></td>
                      <td><?php echo $pengajuan->kode_pembayaran; ?></td>
                      <td>
                        <?php if ($pengajuan->status_berkas=='2'){ ?>  
                          <button class="btn btn-sm btn-warning sippeta">Pending</button>
                        <?php } else if ($pengajuan->status_berkas=='1') { ?>
                          <button class="btn btn-sm btn-success">Diterima</button>
                        <?php } else { ?>
                          <button class="btn btn-sm btn-danger">Ditolak</button>
                        <?php } ?>
                      </td>
                      <td><?php $date=date_create($pengajuan->tgl_berkas); echo date_format($date, 'd F Y'); ?></td>
                    </tr>
                    <?php
                    $no++;  
                  endforeach;
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>