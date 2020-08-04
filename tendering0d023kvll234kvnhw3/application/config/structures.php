<?php

/**
 * Global array
 */
$config['structures'] = array();

/**
 * Project structures
 */
$config['structures']['project'] = array();

//
$config['structures']['project']['project_types'] = array(
	'Commercial' => 'Commercial',
	'Industrial' => 'Industrial',
	'Infrastructure' => 'Infrastructure',
	'Residential' => 'Residential',
);

//
$config['structures']['project']['project_stages'] = array(
	'Pre-Design' => 'Pre-Design',
	'Design Development' => 'Design Development',
	'Planning Schematics' => 'Planning Schematics',
	'Construction Documents' => 'Construction Documents',
	'GC Bidding' => 'GC Bidding',
	'GC Bidding-Invitation' => 'GC Bidding-Invitation',
	'Sub Bidding' => 'Sub Bidding',
);

//
$config['structures']['project']['zone_locations'] = array(
	'Alberta' => 'Alberta',
	'BC' => 'BC'
);

//
$config['structures']['project']['fundings'] = array(
	'Public' => 'Public',
	'Private' => 'Private',
);

// OWNER TYPE DROPDOWN OPTIONS
$config['structures']['project']['owner_types'] = array(
	'Crown Corporation' => 'Crown Corporation',
	'Community Housing' => 'Community Housing',
	'Other' => 'Other',
	'College/University' => 'College/University',
	'Commercial/Office/Retail' => 'Commercial/Office/Retail',
	'Federal Government' => 'Federal Government',
	'Healthcare Facility' => 'Healthcare Facility',
	'Municipal Government' => 'Municipal Government',
	'Provincial Government' => 'Provincial Government',
	'Religious Institutions' => 'Religious Institutions',
	'Residential' => 'Residential',
	'Schools' => 'Schools',
);

// STAGE DROPDOWN OPTIONS
$config['structures']['project']['tender_stages'] = array(
	'Prebid' => 'Prebid',
	'Open' => 'Open',
	'Closed' => 'Closed',
	'Unofficial Results' => 'Unofficial Results',
	'Awarded' => 'Awarded',
	'Cancelled' => 'Cancelled',
);

// PROCUREMENT TYPE DROPDOWN OPTIONS
$config['structures']['project']['procurement_types'] = array(
	'All' => 'All',
	'Request for Services' => 'Request for Services',
	'ACAN' => 'ACAN',
	'Request for Information' => 'Request for Information',
	'Request for Standing Offer' => 'Request for Standing Offer',
	'Pre Qualification' => 'Pre Qualification',
	'Expression of Interest' => 'Expression of Interest',
	'Notice of Proposed Procurement' => 'Notice of Proposed Procurement',
	'Request for Tender' => 'Request for Tender',
	'Request for Proposal' => 'Request for Proposal',
	'Request for Quote' => 'Request for Quote',
);

// CLASSIFICATION OF WORK RADIO BUTTON OPTIONS
$config['structures']['project']['classification_types'] = array(
	'All' => 'All',
	'ICI' => 'ICI',
	'CIVIL' => 'CIVIL',
);


// SAVED SEARCHES DROPDOWN OPTIONS
$config['structures']['searches']['saved'] = array(
	'Awarded last 7 days' => 'Awarded last 7 days',
	'Project updated in the past 24hrs' => 'Project updated in the past 24hrs',
	'Project updated in the past 3 days' => 'Project updated in the past 3 days',
	'Project created in the past 24hrs' => 'Project created in the past 24hrs',
	'Bid Results posted last 7 days' => 'Bid Results posted last 7 days',
	'SICA Open Projects' => 'SICA Open Projects',
	'VRCA Open Projects' => 'VRCA Open Projects',
	'Mandatory Site Visits (for open projects)' => 'Mandatory Site Visits (for open projects)',
	'VICA Open Projects' => 'VICA Open Projects',
	'Project created this week' => 'Project created this week',
	'NRCA Open Projects' => 'NRCA Open Projects'
);
// NEW CONTRACTOR SAVED SEARCHES APPEAR AT THE BOTTOM OF THIS LIST
