<!-- load all modules css -->
<?= $this->include('admin/components/head') ?>

<!-- load navbar -->
<?= $this->include('admin/components/navbar') ?>

<!-- content -->
<div class="container">
	<div class="card my-3">
		<div class="card-header">
			Halaman Edit User
		</div>
		<div class="card-body">
			<h5 class="card-title">Formulir Mengubah Data</h5>
			<?php if(session()->getFlashdata('msg')):?>
				<div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
			<?php endif;?>
			<form method="post" form action="<?php echo base_url('user/update/'. $user->id_number) ?>">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="username" class="form-control" value="<?=$user->username;?>">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" value="<?=$user->email;?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" value="<?=$user->password;?>">
				</div>
				<div class="form-group">
					<label>Level</label>
					<select name="name_level_user_id" class="form-control">
                        <?php foreach($level as $row):?>
                        <option value="<?= $row->id;?>"><?= $row->name_level_user;?></option>
                        <?php endforeach;?>
					</select>
				</div>
			</div>
			<input type="hidden" name="id_number" value="<?= $user->id_number;?>">
			<div class="modal-footer">
				<a class="btn btn-secondary btn-sm" href="/user" role="button">Keluar</a>
				<button type="submit" class="btn btn-primary btn-sm">Edit Data</button>
			</form>
		</div>
	</div>
</div>

<!-- load end body -->
<?= $this->include('admin/components/body') ?>