<template>
    <div>
        <section>
            <div class="container-xl">
                <div class="row">
                    <div class="col text-center py-5">
                        <h1 class="display-3 d-none d-md-block mt-5">
                            Pagamento avvenuto con successo!
                        </h1>
                        <h1 class="display-4 d-block d-md-none mt-5 mb-3">
                            Pagamento avvenuto con successo!
                        </h1>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-md-10 text-center">
                        <h2 class="mb-5 mb-md-0">
                            Il nostro rider arriverà puntuale all'orario
                            stabilito!
                        </h2>
                    </div>
                    <div
                        class="col-12 col-md-2 text-center text-md-left py-md-5 px-4 px-md-0"
                    >
                        <img
                            src="/images/rider-stiker.png"
                            alt="Rider"
                            class="img-fluid mb-3"
                        />
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-md-5 text-right px-lg-5">
                        <a href="/" class="btn btn-lg py-3 home">
                            Torna alla home
                        </a>
                    </div>
                    <div class="col-md-2 text-center py-3">oppure</div>
                    <div class="col-md-5 text-left px-lg-5">
                        <a href="/search?s=" class="btn btn-lg py-3 search">
                            Cerca altri ristoranti
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: "CheckoutSuccess",
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

section {
    min-height: calc(100vh - 100px - 191.19px - 424.81px);

    a {
        width: 100%;

        &.home {
            background: $color4;
        }

        &.search {
            background: $color5;
        }
    }
}
</style>
