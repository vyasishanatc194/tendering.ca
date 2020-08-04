<link href="<?= na_base_url('assets/lib/flatpickr/flatpickr.min.css'); ?>" rel="stylesheet">

<div class="card mb-3">
	<div class="bg-holder d-none d-lg-block bg-card"
		 style="background-image:url('<?= na_base_url('assets/img/illustrations/corner-4.png'); ?>');">
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-8">
				<h3 class="mb-0">Approve Project</h3>
				<p class="mt-2">
					Project with assigned OCAA and LCA Numbers is approved. Please fill or update fields below.
				</p>
			</div>
		</div>
	</div>
</div>

<?= validation_errors('<div class="align-items-center justify-content-between"><div class="alert alert-danger">', '</div></div>'); ?>

<form action="<?= site_url('projects/approve/' . $project->project_id); ?>" method="post" class="form-validation">
	<div class="card mb-3">
		<div class="card-header">
			<h5 class="mb-0">Project Identification</h5>
		</div>
		<div class="card-body bg-light">

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="ocaa_number">
						OCAA Number
					</label>
					<input type="text" class="form-control" name="ocaa_number" id="ocaa_number"
						   value="<?= set_value('ocaa_number') ? set_value('ocaa_number') : $project->ocaa_number; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="lca_number">
						LCA Number
					</label>
					<input type="text" class="form-control" name="lca_number" id="lca_number"
						   value="<?= set_value('lca_number') ? set_value('lca_number') : $project->lca_number; ?>">
				</div>
			</div>

		</div>
	</div>

	<div class="card mb-3">
		<div class="card-body bg-light">
			<div class="form-group">
				<input type="submit" class="btn btn-info" value="Save">
			</div>
		</div>
	</div>
</form>
