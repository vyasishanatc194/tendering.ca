<link href="<?= na_base_url('assets/lib/flatpickr/flatpickr.min.css'); ?>" rel="stylesheet">

<div class="card mb-3">
	<div class="bg-holder d-none d-lg-block bg-card"
		 style="background-image:url('<?= na_base_url('assets/img/illustrations/corner-4.png'); ?>');">
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-8">
				<h3 class="mb-0">Edit My Profile</h3>
				<p class="mt-2">
					<span class="text-danger">*</span> - mandatory fields.
				</p>
			</div>
		</div>
	</div>
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

<?= validation_errors('<div class="align-items-center justify-content-between"><div class="alert alert-danger">', '</div></div>'); ?>

<form action="<?= site_url('profile/edit/information'); ?>" method="post" class="form-validation">
	<div class="card mb-3">
		<div class="card-header">
			<h5 class="mb-0">General Information</h5>
		</div>
		<div class="card-body bg-light">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="first_name">
						First Name <span class="text-danger">*</span>
					</label>
					<input type="text" class="form-control" name="first_name" id="first_name" required
						   value="<?= set_value('first_name') ? set_value('first_name') : $active_admin->first_name; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="last_name">
						Last Name <span class="text-danger">*</span>
					</label>
					<input type="text" class="form-control" name="last_name" id="last_name" required
						   value="<?= set_value('last_name') ? set_value('last_name') : $active_admin->last_name; ?>">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col">
					<label for="email">
						Email <span class="text-danger">*</span>
					</label>
					<input type="email" class="form-control" name="email" id="email" required
						   value="<?= set_value('email') ? set_value('email') : $active_admin->email; ?>">
				</div>
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-info" value="Save">
			</div>
		</div>
	</div>
</form>

<form action="<?= site_url('profile/edit/password'); ?>" method="post" class="form-validation">
	<div class="card mb-3">
		<div class="card-header">
			<h5 class="mb-0">General Information</h5>
		</div>
		<div class="card-body bg-light">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="password">
						New Password <span class="text-danger">*</span>
					</label>
					<input type="password" class="form-control" name="password" id="password" required
						   value="">
				</div>
				<div class="form-group col-md-6">
					<label for="password_confirm">
						Confirm New Password <span class="text-danger">*</span>
					</label>
					<input type="password" class="form-control" name="password_confirm" id="password_confirm" required
						   value="">
				</div>
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-info" value="Update Password">
			</div>
		</div>
	</div>
</form>
