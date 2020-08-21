  <!-- konten -->
  <section id="konten-pembayaran">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <h1 class="title-pembayaran">Upload Bukti Pembayaran</h1>
        </div>
        <div class="col-md-3">
          <a href="<?php echo base_url('/user/bukti_pembayaran/add') ?>" class="">
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
                  <th>Bukti Pembayaran</th>
                  <th>No. Invoice</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                  <?php   
                  $no = 1;
                  foreach ($list_pembayaran as $list_pembayaran):
                    ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><img src="<?php echo base_url().'img/img_pembayaran/'.$list_pembayaran->bukti_pembayaran ?>" class="img-fluid" width="60px" ></td>
                      <td><?php echo $list_pembayaran->kode_pembayaran; ?></td>
                      <td>
                        <?php if ($list_pembayaran->status_pembayaran=='2'){ ?>  
                          <button class="btn btn-sm btn-warning sippeta">Proses</button>
                        <?php } else if ($list_pembayaran->status_pembayaran=='1') { ?>
                          <button class="btn btn-sm btn-success">Diterima</button>
                        <?php } else { ?>
                          <button class="btn btn-sm btn-danger">Ditolak</button>
                        <?php } ?>
                      </td>
                      <td><?php $date=date_create($list_pembayaran->tgl_berkas); echo date_format($date, 'd F Y'); ?></td>
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