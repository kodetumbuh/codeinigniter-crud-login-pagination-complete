<!-- load all modules css -->
<?= $this->include('admin/components/head') ?>

<!-- load navbar -->
<?= $this->include('admin/components/navbar') ?>

<!-- content -->
<div class="container">
	<div class="card my-3">
		<div class="card-header">
			Halaman Tambah User
		</div>
		<div class="card-body">
			<h5 class="card-title">Formulir Tambah Data</h5>
			<form method="post" id="add_create" name="add_create" 
			action="<?= site_url('/admin/post') ?>">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
					<label>Level</label>
					<select name="name_level_user_id" class="form-control name_level_user_id">
                        <?php foreach($level as $row):?>
                        <option value="<?= $row->id;?>"><?= $row->name_level_user;?></option>
                        <?php endforeach;?>
					</select>
				</div>
		</div>
		<div class="modal-footer">
			<a class="btn btn-secondary btn-sm" href="/admin" role="button">Keluar</a>
			<button type="submit" class="btn btn-primary btn-sm">Tambah Data</button>
		</form>
	</div>
</div>
</div>

<!-- load end body -->
<?= $this->include('admin/components/body') ?>