<!-- load all modules css -->
<?= $this->include('user_normal/components/head') ?>

<!-- load navbar -->
<?= $this->include('user_normal/components/navbar') ?>

<!-- content -->
<div class="container">
	<div class="card my-3">
		<div class="card-header">
			Halaman Tambah User
		</div>
		<div class="card-body">
			<h5 class="card-title">Formulir Tambah Data</h5>
			<?php if(session()->getFlashdata('msg')):?>
				<div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
			<?php endif;?>
			<form method="post" id="add_create" name="add_create" 
			action="<?= site_url('/user/post') ?>">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="username" class="form-control" value="<?= old('username'); ?>">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" value="<?= old('email'); ?>">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" value="<?= old('password'); ?>">
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
			<a class="btn btn-secondary btn-sm" href="/user" role="button">Keluar</a>
			<button type="submit" onclick="this.form.submit();this.disabled = true;" class="btn btn-primary btn-sm">Tambah Data</button>
		</form>
	</div>
</div>
</div>

<!-- load end body -->
<?= $this->include('user_normal/components/body') ?>