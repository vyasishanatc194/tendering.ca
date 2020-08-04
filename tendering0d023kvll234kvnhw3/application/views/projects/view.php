<section class="py-0 overflow-hidden" id="banner">

	<div class="bg-holder overlay"
		 style="background-image:url(<?= base_url('assets/img/generic/bg-1.jpg'); ?>);background-position: center bottom;">
	</div>

	<div class="container">
		<div class="row justify-content-center align-items-center pt-8 pt-lg-5 pb-4">
			<div class="col">
				<h1 class="text-white font-weight-light text-center">
					Project Information Sheet
				</h1>
			</div>
		</div>
	</div>
</section>

<section class="py-3 overflow-hidden">
	<div class="container">

		<div class="row">
			<div class="col">
				<h1>
					<?= $project->title_of_project; ?>
				</h1>
				<p>
					Closing Date: <?= date(APP_DATE, strtotime($project->closing_date)); ?>
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col">

				<ul class="nav nav-pills" id="pill-sheet" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="pill-details-tab" data-toggle="tab" href="#pill-tab-details"
						   role="tab" aria-controls="pill-tab-details" aria-selected="true">
							Project Details
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="pill-contacts-tab" data-toggle="tab" href="#pill-tab-contacts"
						   role="tab" aria-controls="pill-tab-contacts" aria-selected="false">
							Project Contacts
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="pill-documents-tab" data-toggle="tab" href="#pill-tab-documents"
						   role="tab" aria-controls="pill-tab-documents" aria-selected="false">
							Documents &amp; Addenda
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="pill-bidders-tab" data-toggle="tab" href="#pill-tab-bidders" role="tab"
						   aria-controls="pill-tab-bidders" aria-selected="false">
							Bidders
						</a>
					</li>
				</ul>
				<div class="tab-content p-0 mt-3" id="pill-sheetContent">
					<div class="tab-pane fade show active" id="pill-tab-details" role="tabpanel"
						 aria-labelledby="details-tab">
						<div class="card mb-4">
							<div class="card-body">
								<div class="container">
									<div class="row">
										<div class="col">
											<h4>
												Project Identification
											</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											OCAA Number
										</div>
										<div class="col-8">
											<?= $project->ocaa_number; ?>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											LCA Number
										</div>
										<div class="col-8">
											<?= $project->lca_number; ?>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											Project Zone Location
										</div>
										<div class="col-8">
											<?= $project->zone_location; ?>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											Project Title
										</div>
										<div class="col-8">
											<?= $project->title_of_project; ?>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card mb-4">
							<div class="card-body">
								<div class="container">
									<div class="row">
										<div class="col">
											<h4>
												Project Details
											</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											Site Addresses
										</div>
										<div class="col-8">
											<?= $project->site_addresses; ?>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											Closing Date
										</div>
										<div class="col-8">
											<?= date(APP_DATE, strtotime($project->closing_date)); ?>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											Number of Addenda
										</div>
										<div class="col-8">
											<?= $project->number_of_addenda; ?>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											Submit Bids To
										</div>
										<div class="col-8">
											<?= $project->account_email; ?>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											Obtain Bid Documents
										</div>
										<div class="col-8">
											<?= $project->obtain_bid_documents; ?>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card mb-4">
							<div class="card-body">
								<div class="container">
									<div class="row">
										<div class="col">
											<h4>
												Project Description
											</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											Tender Stage
										</div>
										<div class="col-8">
											<?= $project->tender_stage; ?>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											Funding
										</div>
										<div class="col-8">
											<?= $project->funding; ?>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											Procurement Type
										</div>
										<div class="col-8">
											<?= $project->procurement_type; ?>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											Classification Type
										</div>
										<div class="col-8">
											<?= $project->classification_type; ?>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											Owner Type
										</div>
										<div class="col-8">
											<?= $project->owner_type; ?>
										</div>
									</div>
									<div class="row">
										<div class="col-4">
											Scope Of Work
										</div>
										<div class="col-8">
											<?= $project->scope_of_work; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="pill-tab-contacts" role="tabpanel" aria-labelledby="contacts-tab">
						<div class="card mb-4">
							<div class="card-body">
								<div class="container">
									<div class="row">
										<div class="col">
											<h4>
												Project Contacts
											</h4>
										</div>
									</div>
									<div class="row border py-2 my-2">
										<div class="col-6">
											<b>
												Owner
											</b>
										</div>
										<div class="col-6">
											<b>
												Information
											</b>
										</div>
									</div>
									<div class="row">
										<div class="col-6">
											<?= $project->account_first_name . " " . $project->account_last_name; ?>
										</div>
										<div class="col-6">
											<?= $project->email; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="pill-tab-documents" role="tabpanel" aria-labelledby="documents-tab">
						<div class="card mb-4">
							<div class="card-body">
								<div class="container">
									<div class="row">
										<div class="col">
											<h4>
												Documents
											</h4>
										</div>
									</div>
									<div class="row border py-2 my-2">
										<div class="col-6">
											<b>
												File Name
											</b>
										</div>
										<div class="col-3">
											<b>
												Uploaded On
											</b>
										</div>
										<div class="col-3">
											<b>
												Document Type
											</b>
										</div>
									</div>
									<div class="row">
										<div class="col">
											No documents assigned
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="pill-tab-bidders" role="tabpanel" aria-labelledby="bidders-tab">
						<div class="card mb-4">
							<div class="card-body">
								<div class="container">
									<div class="row">
										<div class="col">
											<h4>
												Bidders
											</h4>
										</div>
									</div>
									<div class="row border py-2 my-2">
										<div class="col-6">
											<b>
												Contractor Name
											</b>
										</div>
										<div class="col-3">
											<b>
												Contractor Email
											</b>
										</div>
										<div class="col-3">
											<b>
												Contractor Telephone
											</b>
										</div>
									</div>
									<div class="row">
										<div class="col">
											No bidders found in system
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
