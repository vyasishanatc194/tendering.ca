<main class="main" id="top">


	<div class="container-fluid">
		<div class="row min-vh-100 bg-100">
			<div class="col-6 d-none d-lg-block">
				<div class="bg-holder" style="background-image:url('<?= base_url('assets/img/generic/15.jpg') ?>');">
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
									<h3>Register</h3>
									<p class="mb-0 fs--1"><span class="font-weight-semi-bold">Already User? </span>
										<a href="<?= site_url('accounts/login') ?>">
											Login
										</a>
									</p>
								</div>

								<?= validation_errors('<div class="align-items-center justify-content-between"><div class="alert alert-danger text-center">', '</div></div>'); ?>

								<form action="<?= site_url('accounts/registration'); ?>" method="post">
									<div class="form-group">
										<div class="text-center">
											<b>I am a Project</b>
										</div>
									</div>
									<div class="form-row">
										<div class="col-6">
											<div class="form-group form-check">
												<input class="form-check-input" type="radio" name="type"
													   id="type_contractor" required
													   value="contractor" <?= set_value('type') === "contractor" ? "checked" : ""; ?>/>
												<label class="form-check-label" for="type_contractor">
													Contractor
												</label>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group form-check">
												<input class="form-check-input" type="radio" name="type"
													   id="type_owner" required
													   value="owner" <?= set_value('type') === "owner" ? "checked" : ""; ?>/>
												<label class="form-check-label" for="type_owner">
													Owner
												</label>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-6">
											<label for="first_name">
												First Name
											</label>
											<input class="form-control" type="text" name="first_name" id="first_name"
												   autofocus required value="<?= set_value('first_name'); ?>"/>
										</div>
										<div class="form-group col-6">
											<label for="last_name">
												Last Name
											</label>
											<input class="form-control" type="text" name="last_name" id="last_name"
												   required value="<?= set_value('last_name'); ?>"/>
										</div>
									</div>
									<div class="form-group">
										<label for="email">
											Email Address
										</label>
										<input class="form-control" type="email" name="email" id="email"
											   required value="<?= set_value('email'); ?>"/>
									</div>
									<div class="form-row">
										<div class="form-group col-6">
											<label for="password">
												Password
											</label>
											<input class="form-control" type="password" name="password" id="password"
												   required value=""/>
										</div>
										<div class="form-group col-6">
											<label for="password_confirm">
												Confirm Password
											</label>
											<input class="form-control" type="password" name="password_confirm"
												   id="password_confirm" required value=""/>
										</div>
									</div>
									<div class="custom-control custom-checkbox">
										<input class="custom-control-input" type="checkbox"
											   name="terms_checkbox"
											   id="cover-register-checkbox" required value="Yes"/>
										<label class="custom-control-label" for="cover-register-checkbox">
											I accept the <a href="#">
												terms
											</a> and <a href="#">
												privacy policy
											</a>
										</label>
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block mt-3" type="submit" name="submit">
											Register
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
