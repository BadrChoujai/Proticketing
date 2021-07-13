<template>
	<ul class="list-group">
		<li
			class="list-group-item list-group-item-primary d-flex justify-content-between"
		>
			<span>
				agents
				<span class="badge badge-primary badge-pill">total </span>
			</span>
			<span>
				opened/closed
			</span>
		</li>

		<li
			v-for="(list, index) in lists"
			:key="index"
			class="list-group-item d-flex justify-content-between align-items-center"
		>
			<span>
				{{ list.name }}
				<span class="badge badge-primary badge-pill">{{
					list.tickets_count
				}}</span>
			</span>

			<span>
				<span>{{ list.tickets_open }} </span>
				/
				<span>{{ list.tickets_closed }} </span>
			</span>
		</li>
	</ul>
</template>
<script>
export default {
	props: ['lists']
};
</script>
