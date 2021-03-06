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

<div class="card">
	<div class="card-header">
		<div class="row align-items-center justify-content-between">
			<div class="col-4 col-sm-auto d-flex align-items-center pr-0">
				<h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">
					Accounts Accounts
				</h5>
			</div>
			<div class="col-8 col-sm-auto text-right pl-2">
				<div class="d-none" id="accounts-actions">
					<div class="input-group input-group-sm">
						<select class="custom-select cus" aria-label="Bulk actions">
							<option selected="">
								Bulk actions
							</option>
							<option value="delete">
								Delete
							</option>
						</select>
						<button class="btn btn-falcon-default btn-sm ml-2" type="button">
							Apply
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body p-0">
		<div class="falcon-data-table">
			<table class="table table-sm mb-0 table-striped table-dashboard fs--1 data-table border-bottom border-200"
				   data-options='{"searching":false,"responsive":false,"pageLength":12,"info":false,"lengthChange":false,"sWrapper":"falcon-data-table-wrapper","dom":"<&#39;row mx-1&#39;<&#39;col-sm-12 col-md-6&#39;l><&#39;col-sm-12 col-md-6&#39;f>><&#39;table-responsive&#39;tr><&#39;row no-gutters px-1 py-3 align-items-center justify-content-center&#39;<&#39;col-auto&#39;p>>","language":{"paginate":{"next":"<span class=\"fas fa-chevron-right\"></span>","previous":"<span class=\"fas fa-chevron-left\"></span>"}}}'>
				<thead class="bg-200 text-900">
				<tr>
					<th class="align-middle no-sort pr-3">
						<div class="custom-control custom-checkbox">
							<input class="custom-control-input checkbox-bulk-select" id="checkbox-bulk-accounts-select"
								   type="checkbox" data-checkbox-body="#accounts"
								   data-checkbox-actions="#accounts-actions"
								   data-checkbox-replaced-element="#customer-table-actions"/>
							<label class="custom-control-label" for="checkbox-bulk-accounts-select"></label>
						</div>
					</th>
					<th class="align-middle sort">
						First Name
					</th>
					<th class="align-middle sort">
						Last Name
					</th>
					<th class="align-middle sort">
						Email
					</th>
					<th class="align-middle sort">
						Type
					</th>
					<th class="align-middle sort">
						Last Login
					</th>
					<th class="align-middle no-sort"></th>
				</tr>
				</thead>
				<tbody id="accounts">
				<?php if (isset($accounts) && is_array($accounts) && count($accounts) > 0) { ?>
					<?php foreach ($accounts as $account) { ?>
						<tr class="btn-reveal-trigger">
							<td class="py-2 align-middle white-space-nowrap">
								<div class="custom-control custom-checkbox">
									<input class="custom-control-input checkbox-bulk-select-target" type="checkbox"
										   id="account-checkbox-<?= $account->account_id; ?>"/>
									<label class="custom-control-label"
										   for="account-checkbox-<?= $account->account_id; ?>"></label>
								</div>
							</td>
							<td class="py-2 align-middle white-space-nowrap account-name-column">
								<h5 class="mb-0 fs--1">
									<?= $account->first_name; ?>
								</h5>
							</td>
							<td class="py-2 align-middle white-space-nowrap account-name-column">
								<h5 class="mb-0 fs--1">
									<?= $account->last_name; ?>
								</h5>
							</td>
							<td class="py-2 align-middle">
								<a href="mailto:<?= $account->email ?>">
									<?= $account->email ?>
								</a>
							</td>
							<td class="py-2 align-middle">
								<?= ucfirst($account->type) ?>
							</td>
							<td class="py-2 align-middle">
								<?= date(APP_DATE, strtotime($account->date_last_login)); ?>
							</td>
							<td class="py-2 align-middle white-space-nowrap">
								<div class="dropdown text-sans-serif">
									<button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3"
											type="button"
											id="account-dropdown-0" data-toggle="dropdown" data-boundary="viewport"
											aria-haspopup="true" aria-expanded="false">
										<span class="fas fa-ellipsis-h fs--1"></span>
									</button>
									<div class="dropdown-menu dropdown-menu-right border py-0"
										 aria-labelledby="account-dropdown-0">
										<div class="bg-white py-2">
											<a class="dropdown-item text-danger"
											   href="<?= site_url('accounts/delete/' . $account->account_id) ?>">
												Delete
											</a>
										</div>
									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
