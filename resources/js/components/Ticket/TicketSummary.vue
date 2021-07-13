<template>
	<div class="col">
		<div class="row justify-content-center" style="padding-top:10px;">
			<Card
				name="Total Tickets"
				icon="fa-clipboard-list"
				:number="cards.total_tickets"
				color="primary"
			/>
			<Card
				name="Open Tickets"
				:number="cards.total_open"
				icon="fa-wrench"
				color="danger"
			/>
			<Card
				name="Closed Tickets"
				:number="cards.total_closed"
				icon="fa-clipboard-check"
				color="success"
			/>
		</div>
	</div>
</template>

<script>
import Card from '../Base/Card';

export default {
	components: {
		Card
	},
	data() {
		return {
			cards: []
		};
	},
	created() {
		this.getCards();
	},
	methods: {
		getCards() {
			var requestOptions = {
				method: 'GET',
				redirect: 'follow'
			};

			fetch('http://proticketing.test/api/tickets', requestOptions)
				.then(response => response.json())
				.then(result => (this.cards = result))
				.catch(error => console.log('error', error));
		}
	}
};
</script>
