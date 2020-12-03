<template>
    <div class="row ml-4 mr-4">
        <div class="col-md-6">
            <bar-chart-component :title="'BarChart'"></bar-chart-component>
        </div>
        <div class="col-md-6">
            <!-- PieChartComponent-->
        </div>
    </div>

</template>

<script>
    import BarChartComponent from './BarChartComponent.vue'

    export default {
        components: {BarChartComponent},
        data() {
            return {

            }
        },
        mounted() {

        },
        methods: {

        }
    }
</script>

<style>
</style>
