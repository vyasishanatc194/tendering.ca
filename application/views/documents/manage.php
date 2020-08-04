<link href="<?= base_url('assets/lib/flatpickr/flatpickr.min.css'); ?>" rel="stylesheet">

<div class="card mb-3">
	<div class="bg-holder d-none d-lg-block bg-card"
		 style="background-image:url('<?= base_url('assets/img/illustrations/corner-4.png'); ?>');">
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-8">
				<h3 class="mb-0">Manage Documents <i class="fa fa-arrow-circle-right"></i> <?= $project->title_of_project ?></h3>
				<p class="mt-2">
					Here you can upload, move or delete project documents.
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


<div class="card mb-3">
	<div class="card-header">
		<div class="row justify-content-between align-items-center">
			<div class="col-auto">
				<h6 class="card-header-title mb-0">Documents List</h6>
			</div>
			<div class="col-auto">
				<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#document_add_modal">
					Add Document
				</button>
				<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#folder_add_modal">
					Add Folder
				</button>
			</div>
		</div>
	</div>
	<div class="card-body bg-light">

	</div>
</div>
