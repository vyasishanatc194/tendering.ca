<main class="main" id="top">


	<div class="container-fluid">
		<div class="row min-vh-100 bg-100">
			<div class="col-6 d-none d-lg-block">
				<div class="bg-holder"
					 style="background-image:url('<?= base_url('assets/img/generic/14.jpg') ?>');background-position: 50% 20%;">
				</div>

			</div>
			<div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-9 col-xl-8 col-xxl-6">
						<div class="card">
							<div class="card-header bg-circle-shape text-center p-2">
								<a class="text-white text-sans-serif font-weight-extra-bold fs-4 z-index-1 position-relative"
								   href="<?= site_url(); ?>">
									<?= $this->config->item('app_title'); ?>
								</a>
							</div>
							<div class="card-body p-4">
								<div class="d-flex align-items-center justify-content-between">
									<h3>Login</h3>
									<p class="mb-0 fs--1">
										<span class="font-weight-semi-bold">New User? </span>
										<a href="<?= site_url('accounts/registration'); ?>">
											Create account
										</a>
									</p>
								</div>

								<?php if (isset($success) && $success) { ?>
									<div class="align-items-center justify-content-between">
										<div class="alert alert-success text-center">
											<?= $success; ?>
										</div>
									</div>
								<?php } ?>

								<?php if (isset($error) && $error) { ?>
									<div class="align-items-center justify-content-between">
										<div class="alert alert-danger text-center">
											<?= $error; ?>
										</div>
									</div>
								<?php } ?>

								<?= validation_errors('<div class="align-items-center justify-content-between"><div class="alert alert-danger text-center">', '</div></div>'); ?>

								<form action="<?= site_url('accounts/login'); ?>" method="post">
									<div class="form-group">
										<label for="email">
											Email address
										</label>
										<input class="form-control" type="email" name="email" id="email" required
											   autofocus value="<?= set_value('email') ?>"/>
									</div>
									<div class="form-group">
										<div class="d-flex justify-content-between">
											<label for="password">
												Password
											</label>
										</div>
										<input class="form-control" type="password" name="password" id="password"
											   required value=""/>
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block mt-3" type="submit" name="submit">
											Log in
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
