<section class="py-0 overflow-hidden" id="banner">

	<div class="bg-holder overlay"
		 style="background-image:url(<?= base_url('assets/img/generic/bg-1.jpg'); ?>);background-position: center bottom;">
	</div>

	<div class="container">
		<div class="row justify-content-center align-items-center pt-8 pt-lg-5 pb-4">
			<div class="col">
				<h1 class="text-white font-weight-light text-center">
					Browse Projects
				</h1>
			</div>
		</div>
	</div>
</section>

<section class="py-3 bg-light shadow-sm">

	<div class="container-fluid">

		<form action="<?= site_url('projects/search') ?>" method="post">
			<div class="row">
				<div class="col-lg-3 col-12 mb-4">
					<div class="card">
						<div class="card-header">
							<h5 class="mb-0">Filters</h5>
						</div>
						<div class="card-body bg-light">
							<div class="form-group">
								<label for="saved_searches">
									Narrow Your Results
								</label>
								<select name="saved_searches" id="saved_searches" class="custom-select">
									<?php foreach ($saved_searches as $saved_search) { ?>
										<option value="<?= $saved_search; ?>"
												<?= set_value('saved_searches') == $saved_search ? 'selected' : '' ?>>
											<?= $saved_search; ?>
										</option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="keyword">
									Keyword
								</label>
								<input type="text" class="form-control" name="keyword" id="keyword"
									   placeholder="Search by Keyword"
									   value="<?= set_value('keyword'); ?>">
							</div>
							<div class="form-group">
								<label for="city">
									City
								</label>
								<input type="text" class="form-control" name="city" id="city"
									   placeholder="Search by City"
									   value="<?= set_value('city'); ?>">
							</div>
							<div class="form-group">
								<label>
									Zones
								</label>
								<div>
									<?php foreach ($zone_locations as $zone_location) { ?>
										<label>
											<input type="checkbox" name="zones[]" value="<?= $zone_location; ?>"
													<?= is_array(set_value('zones')) && in_array($zone_location, set_value('zones')) ? 'checked' : '' ?>>
											<?= $zone_location; ?>
										</label>
									<?php } ?>
								</div>
							</div>
							<div class="form-group">
								<div class="custom-control custom-radio custom-control-inline">
									<input class="custom-control-input" id="property_all" type="radio"
										   name="property" value="All Projects"
											<?= !set_value('property') || set_value('property') === 'All Projects' ? 'checked' : '' ?>>
									<label class="custom-control-label" for="property_all">
										All Projects
									</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input class="custom-control-input" id="property_my" type="radio"
										   name="property" value="My Projects"
											<?= set_value('property') === 'My Projects' ? 'checked' : '' ?>>
									<label class="custom-control-label" for="property_my">
										My Projects
									</label>
								</div>
							</div>
							<h5>
								Advanced Search
							</h5>
							<button class="btn btn-falcon-default w-100 text-left mb-2" type="button"
									data-toggle="collapse"
									data-target="#dates_collapse" aria-expanded="false" aria-controls="dates_collapse">
								<i class="fa fa-calendar"></i> Dates
							</button>
							<div class="collapse mb-2 <?= set_value('date_created_from') || set_value('date_created_to') || set_value('date_closing_from') || set_value('date_closing_to') || set_value('date_site_meeting_from') || set_value('date_site_meeting_to') || set_value('date_last_updated_from') || set_value('date_last_updated_to') ? 'show' : ''; ?>"
								 id="dates_collapse">
								<div class="border rounded">
									<div class="container">
										<div class="row">
											<div class="col-12 col-lg-6">
												<div class="form-group">
													<label for="date_created_from">
														Date Created From
													</label>
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<span class="input-group-text" id="date_created_from-addon"><i
																		class="fa fa-calendar"></i></span>
														</div>
														<input class="form-control datetimepicker" type="text"
															   id="date_created_from"
															   aria-describedby="date_created_from-addon"
															   name="date_created_from"
															   value="<?= set_value('date_created_from'); ?>"
															   data-options='{"dateFormat":"d/m/yy"}'>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<div class="form-group">
													<label for="date_created_to">
														Date Created To
													</label>
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<span class="input-group-text" id="date_created_to-addon"><i
																		class="fa fa-calendar"></i></span>
														</div>
														<input class="form-control datetimepicker" type="text"
															   id="date_created_to"
															   aria-describedby="date_created_to-addon"
															   name="date_created_to"
															   value="<?= set_value('date_created_to'); ?>"
															   data-options='{"dateFormat":"d/m/yy"}'>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12 col-lg-6">
												<div class="form-group">
													<label for="date_closing_from">
														Closing Date From
													</label>
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<span class="input-group-text" id="date_closing_from-addon"><i
																		class="fa fa-calendar"></i></span>
														</div>
														<input class="form-control datetimepicker" type="text"
															   id="date_closing_from"
															   aria-describedby="date_closing_from-addon"
															   name="date_closing_from"
															   value="<?= set_value('date_closing_from'); ?>"
															   data-options='{"dateFormat":"d/m/yy"}'>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<div class="form-group">
													<label for="date_closing_to">
														Closing Date To
													</label>
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<span class="input-group-text" id="date_closing_to-addon"><i
																		class="fa fa-calendar"></i></span>
														</div>
														<input class="form-control datetimepicker" type="text"
															   id="date_closing_to"
															   aria-describedby="date_closing_to-addon"
															   name="date_closing_to"
															   value="<?= set_value('date_closing_to'); ?>"
															   data-options='{"dateFormat":"d/m/yy"}'>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12 col-lg-6">
												<div class="form-group">
													<label for="date_site_meeting_from">
														Site Meeting From
													</label>
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<span class="input-group-text"
																  id="date_site_meeting_from-addon"><i
																		class="fa fa-calendar"></i></span>
														</div>
														<input class="form-control datetimepicker" type="text"
															   id="date_site_meeting_from"
															   aria-describedby="date_site_meeting_from-addon"
															   name="date_site_meeting_from"
															   value="<?= set_value('date_site_meeting_from'); ?>"
															   data-options='{"dateFormat":"d/m/yy"}'>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<div class="form-group">
													<label for="date_site_meeting_to">
														Site Meeting To
													</label>
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<span class="input-group-text"
																  id="date_site_meeting_to-addon"><i
																		class="fa fa-calendar"></i></span>
														</div>
														<input class="form-control datetimepicker" type="text"
															   id="date_site_meeting_to"
															   aria-describedby="date_site_meeting_to-addon"
															   name="date_site_meeting_to"
															   value="<?= set_value('date_site_meeting_to'); ?>"
															   data-options='{"dateFormat":"d/m/yy"}'>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12 col-lg-6">
												<div class="form-group">
													<label for="date_last_updated_from">
														Last Updated From
													</label>
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<span class="input-group-text"
																  id="date_last_updated_from-addon"><i
																		class="fa fa-calendar"></i></span>
														</div>
														<input class="form-control datetimepicker" type="text"
															   id="date_last_updated_from"
															   aria-describedby="date_last_updated_from-addon"
															   name="date_last_updated_from"
															   value="<?= set_value('date_last_updated_from'); ?>"
															   data-options='{"dateFormat":"d/m/yy"}'>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-6">
												<div class="form-group">
													<label for="date_last_updated_to">
														Last Updated To
													</label>
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<span class="input-group-text"
																  id="date_last_updated_to-addon"><i
																		class="fa fa-calendar"></i></span>
														</div>
														<input class="form-control datetimepicker" type="text"
															   id="date_last_updated_to"
															   aria-describedby="date_last_updated_to-addon"
															   name="date_last_updated_to"
															   value="<?= set_value('date_last_updated_to'); ?>"
															   data-options='{"dateFormat":"d/m/yy"}'>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<button class="btn btn-falcon-default w-100 text-left mb-2" type="button"
									data-toggle="collapse" data-target="#classification_of_work_collapse"
									aria-expanded="false" aria-controls="classification_of_work_collapse">
								<i class="fa fa-border-all"></i> Classification of Work
							</button>
							<div class="collapse mb-2 <?= set_value('classification_of_work') ? 'show' : ''; ?>"
								 id="classification_of_work_collapse">
								<div class="border rounded p-2">
									<div class="form-group">
										<?php foreach ($classification_types as $classification_type) { ?>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input"
													   id="classification_of_work_<?= strtolower($classification_type) ?>"
													   type="radio" name="classification_of_work"
													   value="<?= $classification_type ?>" <?= set_value('classification_of_work') === $classification_type ? 'checked' : '' ?>>
												<label class="custom-control-label"
													   for="classification_of_work_<?= strtolower($classification_type) ?>">
													<?= $classification_type ?>
												</label>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
							<button class="btn btn-falcon-default w-100 text-left mb-2" type="button"
									data-toggle="collapse" data-target="#owner_type_collapse"
									aria-expanded="false" aria-controls="owner_type_collapse">
								<i class="fa fa-university"></i> Owner Type
							</button>
							<div class="collapse mb-2 <?= set_value('owner_type') ? 'show' : ''; ?>"
								 id="owner_type_collapse">
								<div class="border rounded p-2">
									<div class="form-group">
										<select class="custom-select" name="owner_type" title="Owner Type">
											<option value=""></option>
											<?php foreach ($owner_types as $owner_type) { ?>
												<option value="<?= $owner_type ?>" <?= set_value('owner_type') === $owner_type ? 'selected' : ''; ?>>
													<?= $owner_type ?>
												</option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<button class="btn btn-falcon-default w-100 text-left mb-2" type="button"
									data-toggle="collapse" data-target="#stage_collapse"
									aria-expanded="false" aria-controls="stage_collapse">
								<i class="fa fa-chart-bar"></i> Stage
							</button>
							<div class="collapse mb-2 <?= set_value('stage') ? 'show' : ''; ?>" id="stage_collapse">
								<div class="border rounded p-2">
									<div class="form-group">
										<select class="custom-select" name="stage" title="Stage">
											<option value=""></option>
											<?php foreach ($tender_stages as $tender_stage) { ?>
												<option value="<?= $tender_stage ?>" <?= set_value('stage') === $tender_stage ? 'selected' : ''; ?>>
													<?= $tender_stage ?>
												</option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<button class="btn btn-falcon-default w-100 text-left mb-2" type="button"
									data-toggle="collapse" data-target="#procurement_type_collapse"
									aria-expanded="false" aria-controls="procurement_type_collapse">
								<i class="fa fa-book"></i> Procurement Type
							</button>
							<div class="collapse mb-2 <?= set_value('procurement_type') ? 'show' : ''; ?>"
								 id="procurement_type_collapse">
								<div class="border rounded p-2">
									<div class="form-group">
										<select class="custom-select" name="procurement_type" title="Procurement Type">
											<option value=""></option>
											<?php foreach ($procurement_types as $procurement_type) { ?>
												<option value="<?= $procurement_type ?>" <?= set_value('procurement_type') === $procurement_type ? 'selected' : ''; ?>>
													<?= $procurement_type ?>
												</option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="container">
								<div class="row mb-3">
									<div class="col">
										<input type="submit" class="btn btn-primary w-100" value="Search">
									</div>
								</div>
								<div class="row">
									<div class="col">
										<button class="btn btn-falcon-default w-100">
											Save Search
										</button>
									</div>
									<div class="col">
										<input type="reset" class="btn btn-falcon-default w-100" value="Clear All">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-9 col-12 mb-4">
					<div class="card">
						<div class="card-body">
							<?php if (isset($projects) && is_array($projects) && count($projects) > 0) { ?>
								<div class="row mb-3">
									<div class="col-3 text-left">
										<div class="btn-group">
											<a href="#" class="btn btn-falcon-primary">
												View Map
											</a>
											<a href="#" class="btn btn-falcon-info">
												Export to Excel
											</a>
										</div>
									</div>
									<div class="col-7 text-center">
										<?= count($projects); ?> record(s) found
									</div>
									<div class="col-2 text-right">
										<select class="form-control" name="per_page" title="Rows Per Page"
												onchange="this.form.submit();">
											<option value="10"
													<?= set_value('per_page', $per_page) == '10' ? 'selected' : ''; ?>>
												10 / Page
											</option>
											<option value="20"
													<?= set_value('per_page', $per_page) == '20' ? 'selected' : ''; ?>>
												20 / Page
											</option>
											<option value="50"
													<?= set_value('per_page', $per_page) == '50' ? 'selected' : ''; ?>>
												50 / Page
											</option>
											<option value="100"
													<?= set_value('per_page', $per_page) == '100' ? 'selected' : ''; ?>>
												100 / Page
											</option>
										</select>
									</div>
								</div>
								<div class="falcon-data-table">
									<table class="table table-sm mb-0 table-striped table-dashboard fs--1 border-bottom border-200">
										<thead class="bg-200 text-900">
										<tr>
											<th class="align-middle sort">
												OCAA Number
											</th>
											<th class="align-middle sort">
												Project Title
											</th>
											<th class="align-middle sort">
												Closing Date
											</th>
											<th class="align-middle sort">
												Owner
											</th>
											<th class="align-middle sort">
												Addenda
											</th>
											<th class="align-middle sort">
												City
											</th>
											<th class="align-middle sort">
												Tender Stage
											</th>
											<th class="align-middle sort">
												Bidders
											</th>
											<th class="align-middle no-sort"></th>
										</tr>
										</thead>
										<tbody id="projects">
										<?php if (isset($projects) && is_array($projects) && count($projects) > 0) { ?>
											<?php foreach ($projects as $project) { ?>
												<tr class="btn-reveal-trigger">
													<td class="py-2 align-middle">
														<?= $project->ocaa_number; ?>
													</td>
													<td class="py-2 align-middle white-space-nowrap project-name-column">
														<h5 class="mb-0 fs--1">
															<a href="<?= site_url('projects/view/' . $project->project_id); ?>">
																<?= $project->title_of_project ? $project->title_of_project : "N/A"; ?>
															</a>
														</h5>
													</td>
													<td class="py-2 align-middle">
														<?= date(APP_DATE, strtotime($project->closing_date)); ?>
													</td>
													<td class="py-2 align-middle">
														<?= $project->account_first_name . ' ' . $project->account_last_name; ?>
													</td>
													<td class="py-2 align-middle">
														0
													</td>
													<td class="py-2 align-middle">
														<?= $project->location ?>
													</td>
													<td class="py-2 align-middle">
														<?= $project->tender_stage ?>
													</td>
													<td class="py-2 align-middle">
														---
													</td>
													<td class="py-2 align-middle white-space-nowrap">

													</td>
												</tr>
											<?php } ?>
										<?php } ?>
										</tbody>
									</table>
								</div>
							<?php } else { ?>
								<h4 class="text-center my-5">There are no projects matching your criteria, please try
									again
									later.</h4>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
