<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		<h1 class="h2">Form Tambah User</h1>

		<div class="btn-toolbar mb-2 mb-md-0">
			<a href="<?php echo base_url(); ?>admin/user">
				<button class="btn btn-sm btn-outline-success">Kembali</button></a>

			</div>

		</div>  
    <?php
    echo validation_errors('<div class="alert alert-danger">', '</div>');
    echo form_open_multipart(site_url('admin/user/add')) ?>
		<div class="row my-4">

			<div class="col-md-6">  
				<div class="card">
					<div class="card-body">   
						<div class="form-group">
							<label>Nama User</label>
							<input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama_user">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control"  placeholder="Masukkan Email Anda"  name="email_user">
						</div>		
						<div class="form-group">
							<label>No Telepon</label>
							<input type="number" class="form-control" placeholder="Masukkan No Telepoone" name="nohp_user">
						</div>
					</div>
				</div>  
			</div>

			<div class="col-md-6">  
				<div class="card">
					<div class="card-body">   				
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control"  placeholder="Masukkan Password Anda"  name="password_user">
						</div>
						<div class="form-group">
							<label>Akses level</label>
							<select class="custom-select form-control" name="akses_level">
								<option selected>Pilih jenis Akses Level</option>
								<option value="admin">Admin</option>
								<option value="user">User</option>
							</select>  
						</div>
						<div class="form-group">
							<label>Upload Foto</label>
							<input type="file" class="form-control"  name="foto">
						</div>						
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>  
			</div>

		</div>
		<?php echo form_close(); ?>
	</main>
