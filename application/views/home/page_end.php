<section class="bg-dark pt-8 pb-4">

	<div class="container">
		<div class="position-absolute btn-back-to-top bg-dark">
			<a class="text-600" href="#banner" data-fancyscroll="data-fancyscroll">
				<span class="fas fa-chevron-up" data-fa-transform="rotate-45"></span>
			</a>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<h5 class="text-uppercase text-white opacity-85 mb-3">
					Our Mission
				</h5>
				<p class="text-600">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
					et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
					aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
					culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<div class="icon-group mt-4">
					<a class="icon-item bg-white text-facebook" href="<?= site_url('#!'); ?>">
						<span class="fab fa-facebook-f"></span>
					</a>
					<a class="icon-item bg-white text-twitter" href="<?= site_url('#!'); ?>">
						<span class="fab fa-twitter"></span>
					</a>
					<a class="icon-item bg-white text-linkedin" href="<?= site_url('#!'); ?>">
						<span class="fab fa-linkedin-in"></span>
					</a>
				</div>
			</div>
			<div class="col pl-lg-6 pl-xl-8">
				<div class="row mt-5 mt-lg-0">
					<div class="col-6 col-md-3">
						<h5 class="text-uppercase text-white opacity-85 mb-3">Company</h5>
						<ul class="list-unstyled">
							<li class="mb-1">
								<a class="text-600" href="<?= site_url('about-us'); ?>">
									About Us
								</a>
							</li>
							<li class="mb-1">
								<a class="text-600" href="<?= site_url('contact-us'); ?>">
									Contact Us
								</a>
							</li>
							<li class="mb-1">
								<a class="text-600" href="#">
									Terms
								</a>
							</li>
							<li class="mb-1">
								<a class="text-600" href="#">
									Privacy
								</a>
							</li>
						</ul>
					</div>
					<div class="col-6 col-md-3">
						<h5 class="text-uppercase text-white opacity-85 mb-3">Users</h5>
						<ul class="list-unstyled">
							<?php if (is_logged()) { ?>
								<li class="mb-1">
									<a class="text-600" href="<?= site_url('dashboard'); ?>">
										Dashboard
									</a>
								</li>
								<li class="mb-1">
									<a class="text-600" href="<?= site_url('profile/logout'); ?>">
										Sign Out
									</a>
								</li>
							<?php } else { ?>
								<li class="mb-1">
									<a class="text-600" href="<?= site_url('accounts/login'); ?>">
										Login
									</a>
								</li>
								<li class="mb-1">
									<a class="text-600" href="<?= site_url('accounts/registration'); ?>">
										Registration
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>

<section class="py-0 bg-dark">

	<div>
		<hr class="my-0 border-600 opacity-25"/>
		<div class="container py-3">
			<div class="row justify-content-between fs--1">
				<div class="col-12 col-sm-auto text-center">
					<p class="mb-0 text-600 opacity-85">
						<?= date("Y"); ?> &copy; <a class="text-white opacity-85" href="<?= site_url(); ?>">
							<?= $this->config->item('app_title'); ?>
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>

</section>
</main>
