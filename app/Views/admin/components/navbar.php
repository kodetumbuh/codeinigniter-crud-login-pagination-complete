<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crud PHP</title>
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">
</head>
<body>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">Codeigniter</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="/admin">Crud <span class="sr-only">(current)</span></a>
						
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/admin/tentang">Tentang  </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/admin/github">Github</a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbar-list-4">
						<ul class="navbar-nav">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="30" height="30" class="rounded-circle">
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item font-weight-bold" href="#">Username</a>
									<a class="dropdown-item" href="/admin">Dashboard</a>
									<a class="dropdown-item" href="/logout">Log Out</a>
								</div>
							</li>   
						</ul>
					</form>
				</div>
			</div>
		</div>
	</nav>
