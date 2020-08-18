<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Pengaduan</h1>
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
       				<th>Nama</th>
       				<th>Email</th>
       				<th>No Hp</th> 
              <th>Pesan</th>
              <th>Balaske</th>
       				<th>Aksi</th>  
       			</tr>
       		</thead>
       		<tbody>
       			<?php   
       			$no = 1;
       			foreach ($pengaduan as $pengaduan):
       				?>
       				<tr>
       					<td><?php echo $no; ?></td>
       					<td><?php echo $pengaduan->nama_pengaduan; ?></td>
       					<td><?php echo $pengaduan->email_pengaduan; ?></td>
                <td><?php echo $pengaduan->nohp_pengaduan; ?></td>
                <td><?php echo $pengaduan->pesan_pengaduan; ?></td>
                <td><?php echo $pengaduan->balaske_pengaduan; ?></td>
                <td>
       						<a href="<?php echo site_url('admin/pengaduan/edit/'.$pengaduan->id_pengaduan); ?>">
       							<button class="btn btn-sm btn-outline-success">Edit</button>
       						</a>

       						<button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#<?php echo $pengaduan->id_pengaduan; ?><?php echo $pengaduan->id_pengaduan; ?>">
       							Delete
       						</button>

       						<!-- Modal -->
       						<div class="modal fade" id="<?php echo $pengaduan->id_pengaduan; ?><?php echo $pengaduan->id_pengaduan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       							<div class="modal-dialog" role="document">
       								<div class="modal-content">
       									<div class="modal-header">
       										<h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
       										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
       											<span aria-hidden="true">&times;</span>
       										</button>
       									</div>
       									<div class="modal-body">
       										Apakah Anda ingin menghapus data <b><?php echo $pengaduan->nama_pengaduan; ?></b> ?
       									</div>
       									<div class="modal-footer">
       										<a href="<?php echo site_url('admin/pengaduan/delete/'.$pengaduan->id_pengaduan)?>">
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

