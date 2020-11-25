<template>
    <div class="row ml-4 mr-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Graphique 1 (BarChart)
                </div>
                <div class="card-body">
                    <h5 class="card-title">Example</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Graphique 2 (PieChart)
                </div>
                <div class="card-body">
                    <h5 class="card-title">Example</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    export default {
        components: {},
        data() {
            return {

            }
        },
        mounted() {
            this.fillData()
        },
        methods: {
            fillData() {
                // Appeler un route pour récupérer les données
            },
        }
    }
</script>

<style>
</style>
