<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Berkas</h1>
<!--     <div class="btn-toolbar mb-2 mb-md-0">
      <a href="<?php echo site_url('admin/berkas/add'); ?>">
        <button class="btn btn-sm btn-outline-primary">Tambah</button></a>
      </div> -->
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
       				<th>User</th>
       				<th>Nama Berkas</th>
              <th>Biaya Berkas</th>
       				<th>Kode Pembayaran</th>  
       				<th>Status Berkas</th> 
              <th>Aksi</th> 
       			</tr>
       		</thead>
       		<tbody>
       			<?php   
       			$no = 1;
       			foreach ($berkas as $berkas):
       				?>
       				<tr>
       					<td><?php echo $no; ?></td>
       					<td><?php echo $berkas->nama_user; ?></td>
       					<td><?php echo $berkas->nama_berkas; ?></td>
                <td>Rp. <?php echo number_format($berkas->biaya_berkas,'0',',',',') ?></td>
                <td><?php echo $berkas->kode_pembayaran; ?></td>
                <td>
                  <?php if ($berkas->status_berkas=='0'){ ?>  
                    <button class="btn btn-sm btn-danger">Ditolak</button>
                  <?php }else {?>
                    <button class="btn btn-sm btn-success">Diterima</button>
                  <?php } ?>
                </td>
       					<td>
       						<a href="<?php echo site_url('admin/berkas/edit/'.$berkas->id_berkas); ?>">
       							<button class="btn btn-sm btn-outline-success">Edit</button>
       						</a>

       						<button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $berkas->id_berkas; ?><?php echo $berkas->id_berkas; ?>">
       							Delete
       						</button>

       						<!-- Modal -->
       						<div class="modal fade" id="<?php echo $berkas->id_berkas; ?><?php echo $berkas->id_berkas; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       							<div class="modal-dialog" role="document">
       								<div class="modal-content">
       									<div class="modal-header">
       										<h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
       										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
       											<span aria-hidden="true">&times;</span>
       										</button>
       									</div>
       									<div class="modal-body">
       										Apakah Anda ingin menghapus data <b><?php echo $berkas->nama_berkas; ?></b> ?
       									</div>
       									<div class="modal-footer">
       										<a href="<?php echo site_url('admin/berkas/delete/'.$berkas->id_berkas)?>">
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

