<template>
    <div class="card">
        <div class="card-header">
            {{title}}
        </div>
        <div class="card-body">

            <!--       Les données du graphiques -->
            <pie-chart :chart-data="pieChartData" :height="200" :options="pieChartOptions"></pie-chart>
        </div>
        <div class="col-md-6 mx-auto text-center">
            <button @click="randomData()">Randomize</button>
        </div>
    </div>
</template>

<script>
    import PieChart from './PieChart.js'

    export default {
        name: "PieChartComponent",
        components: {PieChart},
        props:{
          title : ''
        },
        data() {
            return {
                // Pour ajouter des options à mon graphique, ici je n'en n'ajoute pas
                pieChartOptions: {},
                // Pour les série de données à mettre dans le graphique
                pieChartData: {}
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

                    // J'alimente la donnée "pieChartData" que l'on donne au <pie-chart> ligne 9
                    this.pieChartData = {
                        datasets: [
                            {
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

            randomData () {
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

                    // J'alimente la donnée "pieChartData" que l'on donne au <pie-chart> ligne 9
                    this.pieChartData = {
                        datasets: [
                            {
                                label: 'Quantité par produit',
                                data: [
                                    this.getRandomInt(),
                                    this.getRandomInt(),
                                    this.getRandomInt(),
                                    this.getRandomInt(),
                                    this.getRandomInt(),
                                    this.getRandomInt(),
                                    this.getRandomInt(),
                                    this.getRandomInt(),
                                    this.getRandomInt(),
                                    this.getRandomInt(),
                                ],
                                
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

            getRandomInt () {
                return Math.floor(Math.random() * 100);
            }
        }
    }
</script>

<style scoped>

</style>
