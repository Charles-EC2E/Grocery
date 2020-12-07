<template>
    <div class="card">
        <div class="card-header">
            {{title}}
        </div>
        <div class="card-body">
            <!--       Les données du graphiques -->
            <bar-chart :chart-data="barChartData" :height="200" :options="barChartOptions"></bar-chart>
        </div>
    </div>
</template>

<script>
    import BarChart from './BarChart.js'

    export default {
        name: "BarChartComponent",
        components: {BarChart},
        props:{
          title : ''
        },
        data() {
            return {
                // Pour ajouter des options à mon graphique, ici je n'en n'ajoute pas
                barChartOptions: {},
                // Pour les série de données à mettre dans le graphique
                barChartData: {}
            }
        },
        mounted() {
            // J'appel la fonction "fillData" disponible dans les méthodes ci-dessous
            this.fillData()
        },
        methods: {
            fillData() {
                // Appeler un route pour récupérer les données
                this.axios.get(`/dashboard`).then((response) => {
                    // response.data = La liste des produits renvoyé par la fonction "getChartData" dans le "HomeController"

                    // Je créé deux tableaux
                    let productLabels = []; // Pour la liste des labels
                    let productData = [];   // Pour la liste des data

                    // Je boucle sur la liste de produits pour remplir mes deux listes
                    response.data.forEach( product => {
                        productLabels.push(product.name);
                        productData.push(product.amount);
                    });

                    // J'alimente la donnée "barChartData" que l'on donne au <bar-chart> ligne 9
                    this.barChartData = {
                        datasets: [
                            {
                                label: 'Quantité par produit',
                                data: productData,
                                backgroundColor: [
                                    '#fc2605',
                                    '#fc7805',
                                    '#fc9f3c',
                                    '#7bfc3f',
                                    '#cefc00',
                                    '#fcf800',
                                    '#f400fc',
                                    '#21fc00',
                                    '#adfca6',
                                    '#fc5305',
                                ],
                            },
                        ],
                        labels: productLabels,
                    };
                })
            },
        }
    }
</script>

<style scoped>

</style>
