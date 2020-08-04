<main class="main" id="top">
	<div class="container" data-layout="container">
		<nav class="navbar navbar-vertical navbar-expand-xl navbar-light">
			<div class="d-flex align-items-center">
				<div class="toggle-icon-wrapper">

					<button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-toggle="tooltip"
							data-placement="left" title="Toggle Navigation">
						<span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
					</button>

				</div>
				<a class="navbar-brand" href="<?= site_url(); ?>">
					<div class="d-flex align-items-center py-3">
						<img class="mr-2" src="<?= site_url('assets/img/illustrations/falcon.png'); ?>" alt=""
							 width="40"/>
						<span class="text-sans-serif"><?= $this->config->item('app_title'); ?></span>
					</div>
				</a>
			</div>
			<div class="collapse navbar-collapse navbar-glass perfect-scrollbar scrollbar" id="navbarVerticalCollapse">
				<ul class="navbar-nav flex-column">
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('projects') ?>">
							<div class="d-flex align-items-center">
								<span class="nav-link-icon"><span class="fas fa-project-diagram"></span></span>
								<span class="nav-link-text">
									Projects
								</span>
							</div>
						</a>
					</li>
					<div class="px-3 px-xl-0 navbar-vertical-divider">
						<hr class="border-300 my-2"/>
					</div>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('profile/edit') ?>">
							<div class="d-flex align-items-center">
								<span class="nav-link-icon"><span class="fas fa-user"></span></span>
								<span class="nav-link-text">
									My Profile
								</span>
							</div>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= site_url('profile/logout') ?>">
							<div class="d-flex align-items-center">
								<span class="nav-link-icon"><span class="fas fa-sign-out-alt"></span></span>
								<span class="nav-link-text">
									Sign Out
								</span>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="content">
			<nav class="navbar navbar-light navbar-glass navbar-top sticky-kit navbar-expand-lg">

				<button class="btn navbar-toggler-humburger-icon navbar-toggler mr-1 mr-sm-3" type="button"
						data-toggle="collapse" data-target="#navbarVerticalCollapse"
						aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
					<span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
				</button>
				<a class="navbar-brand mr-1 mr-sm-3" href="<?= site_url(); ?>">
					<div class="d-flex align-items-center">
						<img class="mr-2" src="<?= site_url('assets/img/illustrations/falcon.png'); ?>" alt=""
							 width="40"/>
						<span class="text-sans-serif">falcon</span>
					</div>
				</a>
				<ul class="navbar-nav navbar-nav-icons ml-auto flex-row align-items-center">
					<li class="nav-item dropdown dropdown-on-hover">
						<a class="nav-link pr-0" id="navbarDropdownUser" href="#" role="button" data-toggle="dropdown"
						   aria-haspopup="true" aria-expanded="false">
							<div class="avatar avatar-xl">
								<img class="rounded-circle" src="<?= site_url('assets/img/team/3-thumb.png'); ?>"
									 alt=""/>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownUser">
							<div class="bg-white rounded-soft py-2">
								<a class="dropdown-item" href="<?= site_url('profile/edit'); ?>">My Profile</a>
								<a class="dropdown-item" href="<?= site_url('profile/logout'); ?>">Logout</a>
							</div>
						</div>
					</li>
				</ul>
			</nav>
