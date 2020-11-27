<template>
    <div class="row ml-4 mr-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Graphique 1 (BarChart)
                </div>
                <div class="card-body">
                    <!--       Les données du graphiques -->
                    <bar-chart :chart-data="barChartData" :height="200" :options="barChartOptions"></bar-chart>
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
    import BarChart from './BarChart.js'

    export default {
        components: {BarChart},
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

                    // J'affiche les données de mes liste la console de votre navigateur
                    console.log('productLabels :', productLabels);
                    console.log('productData :', productData);

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

<style>
</style>
