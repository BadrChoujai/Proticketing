<template>
	<div class="container-fluid">
		<h1 class="mt-4">Dashboard</h1>
		<ol class="breadcrumb mb-2" style="background-color:white;">
			<li class="breadcrumb-item active">Dashboard</li>
		</ol>
		<div class="d-flex flex-column justify-content-center">
			<!-- Header -->
			<div class="card-1">
				<TicketSummary />
			</div>
			<!-- Overview -->
			<div class="mt-4">
				<TicketOverview />
			</div>
		</div>
	</div>
</template>
<script>
import TicketSummary from './Ticket/TicketSummary';
import TicketOverview from './Ticket/TicketOverview';

export default {
	components: {
		TicketSummary,
		TicketOverview
	}
};
</script>
