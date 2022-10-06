<?= $this->include('admin/components/head') ?>

<!-- login -->
<div class="container">
	<div class="row align-items-center vh-100">
		<div class="col-6 mx-auto">
			<div class="card text">
				<div class="card-header text-center">
					Login CRUD Sederhana
				</div>
				<div class="card-body">
				<?php if(session()->getFlashdata('msg')):?>
					<div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
				<?php endif;?>
				<form action="/login/auth" method="post">
					<div class="mb-3">
						<label for="InputForEmail" class="form-label">Email address</label>
						<input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>">
					</div>
					<div class="mb-3">
						<label for="InputForPassword" class="form-label">Password</label>
						<input type="password" name="password" class="form-control" id="InputForPassword">
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
				</form>
			</div>
		</div>
	</div>
</div>



<!-- load end body -->
<?= $this->include('admin/components/body') ?>
