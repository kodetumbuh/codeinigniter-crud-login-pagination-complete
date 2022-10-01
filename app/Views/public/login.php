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
					<form>
						<div class="form-group">
							<label for="exampleInputEmail1">Alamat Email</label>
							<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Email">
							<small id="emailHelp" class="form-text text-muted">Kami Menjaga Kerahasiaan Data Anda.</small>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>
						<a href="/admin" class="btn btn-primary mt-2" role="button">Login</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- load end body -->
<?= $this->include('user/components/body') ?>
