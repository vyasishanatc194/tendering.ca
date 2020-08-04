<main class="main" id="top">
	<div class="container-fluid">
		<div class="row min-vh-100 bg-100">
			<div class="col-6 d-none d-lg-block">
				<div class="bg-holder" style="background-image:url('<?= na_base_url('assets/img/generic/19.jpg') ?>');">
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
								<div class="text-center">
									<img class="d-block mx-auto mb-4"
										 src="<?= na_base_url('assets/img/illustrations/rocket.png'); ?>" alt="shield"
										 width="70"/>
									<h3>See you again!</h3>
									<p>Thanks for using <?= $this->config->item('app_title'); ?>. You are <br/>now
										successfully signed out.</p>
									<a class="btn btn-primary btn-sm mt-3" href="<?= site_url('admins/login'); ?>">
										<span class="fas fa-chevron-left mr-1"
											  data-fa-transform="shrink-4 down-1"></span>Return to Login
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
