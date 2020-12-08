<template>
    <div class="row ml-4 mr-4">
        <div class="col-md-6">
            <bar-chart-component :title="'BarChart'"></bar-chart-component>
        </div>
        <div class="col-md-6">
            <pie-chart-component :title="'PieChart'"></pie-chart-component>
        </div>
        <div class="col-md-6">
            <table-component></table-component>
        </div>
    </div>
</template>

<script>
    import BarChartComponent from './BarChartComponent.vue'
    import PieChartComponent from './PieChartComponent.vue'
    import TableComponent from './TableComponent.vue'

    export default {
        components: {BarChartComponent, PieChartComponent, TableComponent},
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
