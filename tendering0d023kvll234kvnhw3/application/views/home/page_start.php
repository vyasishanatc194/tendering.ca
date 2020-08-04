<main class="main" id="top">
	<nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark navbar-theme">
		<div class="container">
			<a class="navbar-brand" href="<?= site_url(); ?>">
				<span class="text-white"><?= $this->config->item('app_title'); ?></span>
			</a>
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarStandard">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url(); ?>">
							Home
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('projects/search'); ?>">
							Browse Projects
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('about-us'); ?>">
							About Us
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('contact-us'); ?>">
							Contact Us
						</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<?php if(is_logged()) { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('dashboard'); ?>">
								<span class="fas fa-chart-pie d-none d-lg-inline-block" data-toggle="tooltip" data-placement="bottom" title="Dashboard"></span>
								<span class="pl-1">Dashboard</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('profile/logout'); ?>">
								<span class="fas fa-sign-out-alt d-none d-lg-inline-block" data-toggle="tooltip" data-placement="bottom" title="Dashboard"></span>
								<span class="pl-1">Sign Out</span>
							</a>
						</li>
					<?php } else { ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="navbarDropdownLogin" href="<?= site_url('accounts/login'); ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Login
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-card" aria-labelledby="navbarDropdownLogin">
								<div class="card shadow-none navbar-card-login">
									<div class="card-body fs--1 p-4 font-weight-normal">
										<div class="row text-left justify-content-between align-items-center mb-2">
											<div class="col-auto">
												<h5 class="mb-0">Log in</h5>
											</div>
											<div class="col-auto">
												<p class="fs--1 text-600 mb-0">
													or <a href="<?= site_url('accounts/registration'); ?>">
														Create an account
													</a>
												</p>
											</div>
										</div>
										<form action="<?= site_url('accounts/login'); ?>" method="post">
											<div class="form-group">
												<input class="form-control" type="email" name="email" id="email" required
													   placeholder="Email address" value=""/>
											</div>
											<div class="form-group">
												<input class="form-control" type="password" name="password" id="password"
													   placeholder="Password" required value=""/>
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
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= site_url('accounts/registration'); ?>">
								Register
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
