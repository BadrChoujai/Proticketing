<template>
	<div class="col-xl-3 col-md-6">
		<div class="card-counter" :class="color">
			<i class="fas fa-lg" :class="icon"></i>
			<span class="count-numbers">{{ number }}</span>
			<span class="count-name">{{ name }}</span>
		</div>
	</div>
</template>

<script>
export default {
	props: {
		name: {
			type: String,
			default: 'Total Tickets'
		},
		number: {
			type: Number,
			default: 12
		},
		icon: {
			type: String,
			default: 'fa-ticket-alt'
		},
		color: {
			type: String,
			default: 'success'
		}
	},
	data() {
		return {
			data: []
		};
	},
	computed: {
		// icon() {
		// 	return 'fa-ticket-alt';
		// }
	}
};
</script>
<style scoped>
.card-counter {
	display: flex;
	align-items: center;
	box-shadow: 2px 2px 10px #dadada;
	margin: 5px;
	padding: 20px 10px;
	background-color: #fff;
	height: 100px;
	border-radius: 5px;
	transition: 0.3s linear all;
}

.card-counter:hover {
	box-shadow: 4px 4px 20px #dadada;
	transition: 0.3s linear all;
}

.card-counter.primary {
	background-color: #007bff;
	color: #fff;
}

.card-counter.danger {
	background-color: #ef5350;
	color: #fff;
}

.card-counter.success {
	background-color: #66bb6a;
	color: #fff;
}

.card-counter.info {
	background-color: #26c6da;
	color: #fff;
}

.card-counter svg {
	font-size: 5em;
	opacity: 0.2;
}

.card-counter .count-numbers {
	position: absolute;
	right: 35px;
	top: 20px;
	font-size: 32px;
	display: block;
}

.card-counter .count-name {
	position: absolute;
	right: 35px;
	top: 65px;
	font-style: italic;
	text-transform: capitalize;
	opacity: 0.5;
	display: block;
	font-size: 18px;
}
</style>
