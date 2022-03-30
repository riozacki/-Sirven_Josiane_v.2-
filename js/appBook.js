Vue.createApp({
    data() {
        return {
            produits: [
                { produitBague: 'Bague' },
                { produitCollier: 'Collier' },
                { produitRasDuCoup: 'Ras du coup' },
                { produitBouclesOreilless: "Boucles d'oreilles" }
            ]
        };
    },

    methods: {
        afficherproduits() {
            produits = this.produits;
        }


    },
    computed: {

    }


}).mount('#appBook')