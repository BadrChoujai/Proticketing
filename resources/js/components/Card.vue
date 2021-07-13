<template>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">Total its {{ data.total_its}}</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            data: []
        }
    },
    created() {
        var requestOptions = {
            method: 'GET',
            redirect: 'follow'
        };

        fetch("http://proticketing.test/api/its", requestOptions)
            .then(response => response.json())
            .then(result => this.data = result)
            .catch(error => console.log('error', error));
    }
}
</script>

<style>

</style>