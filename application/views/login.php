<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>WELCOME</title>
	<?php $this->load->view('layout/assets'); ?>
</head>

<body>
	<div class="auth-full-height container d-flex flex-column justify-content-center">
		<div class="row justify-content-center">
			<div class="col-md-9">
				<div class="card row mx-0 flex-row overflow-hidden">
					<div class="col-md-4 bg-size-cover d-flex align-items-center p-4"
						style="background-image: url('<?= base_url()?>assets/images/others/bg-2.jpg');">
						<div>
							<div class="mb-5">
								<div class="logo">
									<img alt="logo" class="img-fluid"
										src="<?= base_url()?>assets/images/logo/logo-white.png" style="height: 50px;">
								</div>
							</div>
							<h3 class="text-white">DISKOMINFO</h3>
							<p class="text-white mt-4 mb-5 o-75" style="font-size:13px;">EDUCATED SOCIEATY TO A BRILIANT CITY</p>
						</div>
					</div>
					<div class="col-md-8 px-0">
						<div class="card-body">
							<?php if ($this->session->flashdata('status')['status'] == 'error') {  ?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong>Gagal !</strong> <?= $this->session->flashdata('status')['msg']; ?>
								<button type="button" class="btn-close" data-bs-dismiss="alert"
									aria-label="Close"></button>
							</div>
							<?php } ?>
							<div class="my-5 mx-auto" style="max-width: 350px;">
								<div class="mb-3">
									<h3>Login</h3>
								</div>
								<form action="<?= site_url('login');?>" method="post" id="form_login">
									<div class="form-group mb-3">
										<label class="form-label">Username</label>
										<input class="form-control" id="username" name="username" />
									</div>
									<div class="mb-3">
										<label class="form-label d-flex justify-content-between">
											<span>Password</span>
											<a href="" class="text-primary font">Forget Password?</a>
										</label>
										<div class="form-group input-affix flex-column">
											<label class="d-none">Password</label>
											<input formcontrolname="password" class="form-control" type="password"
												id="password" name="password">
											<i class="suffix-icon feather cursor-pointer text-dark icon-eye"
												ng-reflect-ng-class="icon-eye"></i>
										</div>
									</div>
									<button type="submit" class="btn btn-primary w-100">Log In</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
