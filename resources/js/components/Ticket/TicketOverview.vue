<template>
	<div class="row">
		<div class="col-8">
			<div class="row">
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							Total share of tickets
						</div>
						<div class="card-body">
							<pie-chart
								:data="[
									['tickets open', charts.total_open],
									['tickets', charts.total_tickets],
									['tickets closed', charts.total_closed]
								]"
							></pie-chart>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							Tickets share per category
						</div>
						<div class="card-body">
							<pie-chart
								:data="[
									['Events', charts.cat],
									['Alerts', charts.no],
									[' Incidents ', charts.high],
									['Requests', charts.low],
									['Technique', charts.technique]
								]"
							></pie-chart>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col">
					<div class="card">
						<div class="card-header">
							Tickets share per City
						</div>
						<div class="card-body">
							<bar-chart
								:data="[
									['Tanger', charts.citiet],
									['Casa', charts.citiec],
									['Marrakech', charts.citiem],
									['Tetouan', charts.citiett]
								]"
							></bar-chart>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-4">
			<List :lists="lists" />
		</div>
	</div>
</template>
<script>
import List from '../Base/List';
export default {
	components: {
		List
	},

	data() {
		return {
			charts: [],
			lists: []
		};
	},
	created() {
		this.getCharts();
		this.getList();
	},
	methods: {
		getCharts() {
			var requestOptions = {
				method: 'GET',
				redirect: 'follow'
			};

			fetch('http://proticketing.test/api/tickets', requestOptions)
				.then(response => response.json())
				.then(result => (this.charts = result))
				.catch(error => console.log('error', error));
		},
		getList() {
			var requestOptions = {
				method: 'GET',
				redirect: 'follow'
			};

			fetch('http://proticketing.test/api/agents', requestOptions)
				.then(response => response.json())
				.then(result => (this.lists = result.totaleusers))
				.catch(error => console.log('error', error));
		}
	}
};
</script>
<style scoped></style>
