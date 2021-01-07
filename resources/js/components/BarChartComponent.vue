<template>
    <div class="card">
        <div class="card-header">
            {{title}}
        </div>
        <div class="card-body">
            <!--       Les données du graphiques -->
            <bar-chart :chart-data="barChartData" :height="300" :options="barChartOptions"></bar-chart>
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
                barChartData: {},

                stockList : {}
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

                    this.stockList = response.data;

                    // Je créé deux tableaux
                    let productLabels = []; // Pour la liste des labels
                    let productData = [];   // Pour la liste des data

                    // Je boucle sur la liste de produits pour remplir mes deux listes
                    response.data.forEach( product => {
                        productLabels.push(product.name);
                        productData.push(product.amount);
                    });

                    // J'affiche les données de mes liste la console de votre navigateur
                    console.log('productLabels :', productLabels);
                    console.log('productData :', productData);
                    // Inutile de le reproduire les console.log, c'est surtout pour vous aider ;-)

                    // J'alimente la donnée "barChartData" que l'on donne au <bar-chart> ligne 9
                    this.barChartData = {
                        datasets: [
                            {
                                label: 'Quantité par produit',
                                data: productData,
                                backgroundColor: 'rgb(93,235,101)',
                                borderColor: 'rgba(93,235,101, 1)',
                                borderWidth: 2,
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
