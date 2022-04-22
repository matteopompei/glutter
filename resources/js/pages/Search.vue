<template>
    <div>
        <section id="search">
            <div class="container-fluid">
                <div class="row py-5">
                    <div class="col-md-3">
                        <h4 class="mb-4">Criteri di ricerca</h4>
                        <!-- QUI SOTTO AGGIUNGERE I VARI FILTRI -->
                    </div>
                    <div class="col-md-9">
                        <h4 class="mb-4">Risultati della ricerca</h4>
                        <div
                            class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-5"
                        >
                            <div class="col" v-for="n in 20" :key="n">
                                <div class="card mb-3">
                                    <img
                                        src="https://www.ricettasprint.it/wp-content/uploads/2021/10/Cannacavacciuolo-su-MasterChef-RicettaSprint-1.jpg"
                                        class="card-img-top"
                                        alt=""
                                    />
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Nome ristorante
                                        </h5>
                                        <p class="card-text">Indirizzo</p>
                                        <span class="badge badge-light mx-1"
                                            >Categoria</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: "Search",
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";
</style>
