<link href="<?= na_base_url('assets/lib/flatpickr/flatpickr.min.css'); ?>" rel="stylesheet">

<div class="card mb-3">
	<div class="bg-holder d-none d-lg-block bg-card"
		 style="background-image:url('<?= na_base_url('assets/img/illustrations/corner-4.png'); ?>');">
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-8">
				<h3 class="mb-0">Edit Project</h3>
				<p class="mt-2">
					<span class="text-danger">*</span> - mandatory fields.
				</p>
			</div>
		</div>
	</div>
</div>

<?= validation_errors('<div class="align-items-center justify-content-between"><div class="alert alert-danger">', '</div></div>'); ?>

<form action="<?= site_url('projects/edit/' . $project->project_id); ?>" method="post" class="form-validation">
	<div class="card mb-3">
		<div class="card-header">
			<h5 class="mb-0">General Information</h5>
		</div>
		<div class="card-body bg-light">

			<div class="form-row">
				<div class="form-group col">
					<label for="company">
						Company/Organization <span class="text-danger">*</span>
					</label>
					<input type="text" class="form-control" name="company" id="company" required
						   value="<?= set_value('company') ? set_value('company') : $project->company; ?>"/>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="first_name">
						First Name <span class="text-danger">*</span>
					</label>
					<input type="text" class="form-control" name="first_name" id="first_name" required
						   value="<?= set_value('first_name') ? set_value('first_name') : $project->first_name; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="last_name">
						Last Name <span class="text-danger">*</span>
					</label>
					<input type="text" class="form-control" name="last_name" id="last_name" required
						   value="<?= set_value('last_name') ? set_value('last_name') : $project->last_name; ?>">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col">
					<label for="job_title">
						Job Title
					</label>
					<input type="text" class="form-control" name="job_title" id="job_title"
						   value="<?= set_value('job_title') ? set_value('job_title') : $project->job_title; ?>"/>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="city">
						City <span class="text-danger">*</span>
					</label>
					<input type="text" class="form-control" name="city" id="city" required
						   value="<?= set_value('city') ? set_value('city') : $project->city; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="province">
						Province
					</label>
					<input type="text" class="form-control" name="province" id="province"
						   value="<?= set_value('province') ? set_value('province') : $project->province; ?>">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="email">
						Email <span class="text-danger">*</span>
					</label>
					<input type="email" class="form-control" name="email" id="email" required
						   value="<?= set_value('email') ? set_value('email') : $project->email; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="phone_number">
						Phone Number <span class="text-danger">*</span>
					</label>
					<input type="text" class="form-control" name="phone_number" id="phone_number" required
						   value="<?= set_value('phone_number') ? set_value('phone_number') : $project->phone_number; ?>">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="title_of_project">
						Title of Project
					</label>
					<input type="text" class="form-control" name="title_of_project" id="title_of_project"
						   value="<?= set_value('title_of_project') ? set_value('title_of_project') : $project->title_of_project; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="location">
						Location
					</label>
					<input type="text" class="form-control" name="location" id="location"
						   value="<?= set_value('location') ? set_value('location') : $project->location; ?>">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="construction_date">
						Construction Date
					</label>
					<input type="email" class="form-control datetimepicker" name="construction_date"
						   id="construction_date"
						   value="<?= set_value('construction_date') ? set_value('construction_date') : ($project->construction_date ? date("d/m/Y", strtotime($project->construction_date)) : ''); ?>"
						   data-options='{"dateFormat":"d/m/Y"}'>
				</div>
				<div class="form-group col-md-6">
					<label for="bid_closing_date">
						Bid Closing Date
					</label>
					<input type="text" class="form-control datetimepicker" name="bid_closing_date" id="bid_closing_date"
						   value="<?= set_value('bid_closing_date') ? set_value('bid_closing_date') : ($project->bid_closing_date ? date("d/m/Y", strtotime($project->bid_closing_date)) : ''); ?>"
						   data-options='{"dateFormat":"d/m/Y"}'>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="project_type">
						Project Type
					</label>
					<select class="form-control" name="project_type" id="project_type">
						<option value="">Please Select</option>
						<?php if (isset($project_types) && is_array($project_types) && count($project_types) > 0) { ?>
							<?php foreach ($project_types as $key => $title) { ?>
								<option value="<?= $key ?>" <?= set_value('project_type') == $key ? 'selected' : ($project->project_type == $key ? 'selected' : ''); ?>><?= $title ?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for="project_stage">
						Project Stage
					</label>
					<select class="form-control" name="project_stage" id="project_stage">
						<option value="">Please Select</option>
						<?php if (isset($project_stages) && is_array($project_stages) && count($project_stages) > 0) { ?>
							<?php foreach ($project_stages as $key => $title) { ?>
								<option value="<?= $key ?>" <?= set_value('project_stage') == $key ? 'selected' : ($project->project_stage == $key ? 'selected' : ''); ?>><?= $title ?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col">
					<label for="link_to_documents">
						Link to Project Documents (Dropbox, Google Drive etc.)
					</label>
					<input type="text" class="form-control" name="link_to_documents" id="link_to_documents"
						   value="<?= set_value('link_to_documents') ? set_value('link_to_documents') : $project->link_to_documents; ?>"/>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col">
					<label for="description">
						Project Description
					</label>
					<textarea class="form-control" name="description"
							  id="description"><?= set_value('description') ? set_value('description') : $project->description; ?></textarea>
				</div>
			</div>
		</div>
	</div>

	<div class="card mb-3">
		<div class="card-header">
			<h5 class="mb-0">Project Identification</h5>
		</div>
		<div class="card-body bg-light">

			<div class="form-row">
				<div class="form-group col">
					<label for="zone_location">
						Project Zone Location
					</label>
					<select class="form-control" name="zone_location" id="zone_location">
						<option value="">Please Select</option>
						<?php if (isset($zone_locations) && is_array($zone_locations) && count($zone_locations) > 0) { ?>
							<?php foreach ($zone_locations as $key => $title) { ?>
								<option value="<?= $key ?>" <?= set_value('zone_location') == $key ? 'selected' : ($project->zone_location == $key ? 'selected' : ''); ?>><?= $title ?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>
			</div>

		</div>
	</div>

	<div class="card mb-3">
		<div class="card-header">
			<h5 class="mb-0">Project Details</h5>
		</div>
		<div class="card-body bg-light">

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="site_addresses">
						Site Addresses
					</label>
					<input type="text" class="form-control" name="site_addresses" id="site_addresses"
						   value="<?= set_value('site_addresses') ? set_value('site_addresses') : $project->site_addresses; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="closing_date">
						Closing Date
					</label>
					<input type="text" class="form-control datetimepicker" name="closing_date" id="closing_date"
						   value="<?= set_value('closing_date') ? set_value('closing_date') : ($project->closing_date ? date("d/m/Y", strtotime($project->closing_date)) : ""); ?>"
						   data-options='{"dateFormat":"d/m/Y"}'>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="number_of_addenda">
						Number Of Addenda
					</label>
					<input type="number" min="0" step="1" class="form-control" name="number_of_addenda"
						   id="number_of_addenda"
						   value="<?= set_value('number_of_addenda') ? set_value('number_of_addenda') : $project->number_of_addenda; ?>">
				</div>
				<div class="form-group col-md-6">
					<label for="obtain_bid_documents">
						Obtain Bid Documents
					</label>
					<input type="text" class="form-control" name="obtain_bid_documents" id="obtain_bid_documents"
						   value="<?= set_value('obtain_bid_documents') ? set_value('obtain_bid_documents') : $project->obtain_bid_documents; ?>">
				</div>
			</div>

		</div>
	</div>

	<div class="card mb-3">
		<div class="card-header">
			<h5 class="mb-0">Project Description</h5>
		</div>
		<div class="card-body bg-light">

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="tender_stage">
						Tender Stage
					</label>
					<select class="form-control" name="tender_stage" id="tender_stage">
						<option value="">Please Select</option>
						<?php if (isset($tender_stages) && is_array($tender_stages) && count($tender_stages) > 0) { ?>
							<?php foreach ($tender_stages as $key => $title) { ?>
								<option value="<?= $key ?>" <?= set_value('tender_stage') == $key ? 'selected' : ($project->tender_stage == $key ? 'selected' : ''); ?>><?= $title ?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for="funding">
						Funding
					</label>
					<select class="form-control" name="funding" id="funding">
						<option value="">Please Select</option>
						<?php if (isset($fundings) && is_array($fundings) && count($fundings) > 0) { ?>
							<?php foreach ($fundings as $key => $title) { ?>
								<option value="<?= $key ?>" <?= set_value('funding') == $key ? 'selected' : ($project->funding == $key ? 'selected' : ''); ?>><?= $title ?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="procurement_type">
						Procurement Type
					</label>
					<select class="form-control" name="procurement_type" id="procurement_type">
						<option value="">Please Select</option>
						<?php if (isset($procurement_types) && is_array($procurement_types) && count($procurement_types) > 0) { ?>
							<?php foreach ($procurement_types as $key => $title) { ?>
								<option value="<?= $key ?>" <?= set_value('procurement_type') == $key ? 'selected' : ($project->funding == $key ? 'procurement_type' : ''); ?>><?= $title ?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for="classification_type">
						Classification Type
					</label>
					<select class="form-control" name="classification_type" id="classification_type">
						<option value="">Please Select</option>
						<?php if (isset($classification_types) && is_array($classification_types) && count($classification_types) > 0) { ?>
							<?php foreach ($classification_types as $key => $title) { ?>
								<option value="<?= $key ?>" <?= set_value('classification_type') == $key ? 'selected' : ($project->funding == $key ? 'classification_type' : ''); ?>><?= $title ?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col">
					<label for="owner_type">
						Owner Type
					</label>
					<select class="form-control" name="owner_type" id="owner_type">
						<option value="">Please Select</option>
						<?php if (isset($owner_types) && is_array($owner_types) && count($owner_types) > 0) { ?>
							<?php foreach ($owner_types as $key => $title) { ?>
								<option value="<?= $key ?>" <?= set_value('owner_type') == $key ? 'selected' : ($project->funding == $key ? 'owner_type' : ''); ?>><?= $title ?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>
			</div>


			<div class="form-row">
				<div class="form-group col">
					<label for="scope_of_work">
						Scope of Work
					</label>
					<textarea class="form-control" name="scope_of_work"
							  id="scope_of_work"><?= set_value('scope_of_work') ? set_value('scope_of_work') : $project->scope_of_work; ?></textarea>
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
