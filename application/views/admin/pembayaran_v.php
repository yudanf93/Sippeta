<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Pembayaran</h1>
  </div>

  <div class="row my-4">
  	<div class="col-12 ">
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
 	 <div class="card">
       <div class="table-responsive p-4">
       	<table id="example" class="table table-striped table-bordered" style="width:100%">
       		<thead>
       			<tr>
       				<th>No</th>
       				<th>Berkas</th>
       				<th>Nama </th>
       				<th>Nominal</th> 
              <th>Tanggal</th>
              <th>Status</th>
       				<th>Aksi</th>  
       			</tr>
       		</thead>
       		<tbody>
       			<?php   
       			$no = 1;
       			foreach ($pembayaran as $pembayaran):
       				?>
       				<tr>
       					<td><?php echo $no; ?></td>
       					<td><?php echo $pembayaran->nama_berkas; ?></td>
       					<td><?php echo $pembayaran->nama_pembayaran; ?></td>
                <td>Rp. <?php echo number_format($pembayaran->nominal_pembayaran,'0',',',',') ?></td>
                <td><?php $date=date_create($pembayaran->tglbayar_pembayaran); echo date_format($date, 'd F Y'); ?></td>
                <td>
                  <?php if ($pembayaran->status_pembayaran=='0'){ ?>  
                    <button class="btn btn-sm btn-danger">Ditolak</button>
                  <?php }else {?>
                    <button class="btn btn-sm btn-success">Diterima</button>
                  <?php } ?>
                </td>
       					<td>
       						<a href="<?php echo site_url('admin/pembayaran/edit/'.$pembayaran->id_pembayaran); ?>">
       							<button class="btn btn-sm btn-outline-success">Edit</button>
       						</a>

       						<button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $pembayaran->id_pembayaran; ?><?php echo $pembayaran->id_pembayaran; ?>">
       							Delete
       						</button>

       						<!-- Modal -->
       						<div class="modal fade" id="<?php echo $pembayaran->id_pembayaran; ?><?php echo $pembayaran->id_pembayaran; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       							<div class="modal-dialog" role="document">
       								<div class="modal-content">
       									<div class="modal-header">
       										<h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
       										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
       											<span aria-hidden="true">&times;</span>
       										</button>
       									</div>
       									<div class="modal-body">
       										Apakah Anda ingin menghapus data <b><?php echo $pembayaran->nama_berkas; ?></b> ?
       									</div>
       									<div class="modal-footer">
       										<a href="<?php echo site_url('admin/pembayaran/delete/'.$pembayaran->id_pembayaran)?>">
       											<button type="button" class="btn btn-danger">Delete</button>
       										</a>
       									</div>
       								</div>
       							</div>
       						</div>
       					</td>
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

</main>

