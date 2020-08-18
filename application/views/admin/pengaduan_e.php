<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		<h1 class="h2">Form Ubah Pengaduan</h1>

		<div class="btn-toolbar mb-2 mb-md-0">
			<a href="<?php echo base_url(); ?>admin/pengaduan">
				<button class="btn btn-sm btn-outline-success">Kembali</button></a>

			</div>

		</div>     
		<?php
		echo validation_errors('<div class="alert alert-danger">', '</div>');
		echo form_open_multipart(site_url('admin/pengaduan/edit/'.$edit->id_pengaduan)) ?>
		<div class="row my-4">
			<div class="col-md-7">  
				<div class="card">  
					<div class="card-body">   
						<div class="form-group">
							<label>Pesan Pengaduan</label>
							<textarea rows="6" cols="40" name="pesan_pengaduan" class="form-control" required><?php echo $edit->pesan_pengaduan ?>"</textarea>
						</div>
						<div class="form-group">
							<label>Balaske</label>
							<input type="text" class="form-control" value="<?php echo $edit->balaske_pengaduan ?>" name="balaske_pengaduan">
						</div>
					</div>
				</div>  
			</div>

			<div class="col-md-5">  
				<div class="card">
					<div class="card-body"> 
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" value="<?php echo $edit->nama_pengaduan ?>" name="nama_pengaduan" readonly>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" value="<?php echo $edit->email_pengaduan ?>" name="email_pengaduan" readonly>
						</div>
						<div class="form-group">
							<label>Tanggal</label>
							<input type="text" class="form-control" value="<?php echo $edit->tgl_pengaduan ?>" name="tgl_pengaduan" readonly>
						</div>
						<button type="submit" class="btn btn-primary btn-sm">Submit</button>
					</div>  
				</div>  
			</div>
		</div>
		<?php echo form_close(); ?>
	</main>
