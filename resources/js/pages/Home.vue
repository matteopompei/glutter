<template>
    <div>
        <section class="jumbotron jumbotron-fluid m-0 custom-jumbo">
            <div class="container-xl">
                <div class="row align-items-center py-5">
                    <div class="col-md-7 mx-auto">
                        <h1 class="display-2 d-none d-lg-block mb-5">
                            #FoodIsComing
                        </h1>
                        <h1 class="display-3 d-none d-md-block d-lg-none mb-5">
                            #FoodIsComing
                        </h1>
                        <h1
                            class="display-4 d-sm-block d-md-none text-center mb-5"
                        >
                            #FoodIsComing
                        </h1>
                        <blockquote class="blockquote mx-auto mx-md-0 p-3">
                            <p class="mb-0">
                                A tavola perdonerei chiunque. Anche i miei
                                parenti.
                            </p>
                            <footer class="blockquote-footer">
                                Oscar Wilde
                            </footer>
                        </blockquote>
                    </div>
                    <div class="col-md-5">
                        <div class="search mt-5 mt-md-0 p-5">
                            <p class="lead mb-3">
                                Inserisci un nome o un alimento.
                            </p>
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Es. pizza"
                                    aria-label="Recipient's username"
                                    aria-describedby="basic-addon2"
                                />
                                <div class="input-group-append">
                                    <button class="btn" type="button">
                                        Cerca
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="download" class="py-5">
            <div class="container-xl">
                <div class="row align-items-center py-5">
                    <div class="col-md-8">
                        <h2 class="display-4 text-center text-md-left mb-5">
                            Hai già installato la nostra app?
                        </h2>
                        <div class="row text-left">
                            <div
                                class="col-md py-4 py-md-0 px-5 px-md-1 px-lg-4"
                            >
                                <a href="#" target="_blank">
                                    <img
                                        src="images/download-google-play-store.png"
                                        alt="Google Play"
                                        class="img-fluid"
                                    />
                                </a>
                            </div>
                            <div
                                class="col-md py-4 py-md-0 px-5 px-md-1 px-lg-4"
                            >
                                <a href="#" target="_blank">
                                    <img
                                        src="images/download-apple-app-store.png"
                                        alt="Apple App Store"
                                        class="img-fluid"
                                    />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-none d-md-block">
                        <img
                            src="images/sticker-app.png"
                            alt="App Glutter"
                            class="img-fluid"
                        />
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: "Home",
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

.custom-jumbo {
    position: relative;
    background: $color4;
    color: $white;

    blockquote {
        width: fit-content;
        background: rgba($color: #000000, $alpha: 0.2);
        border-radius: 10px;
        box-shadow: 0 5px 5px rgba($color: $color3, $alpha: 0.1);

        footer {
            color: $white;
        }
    }

    .search {
        background: $white;
        border-radius: 20px;
        box-shadow: 0 15px 20px rgba($color: #000000, $alpha: 0.1);
        color: $grey4;

        & > div {
            box-shadow: 0 1px 3px rgba($color: #000000, $alpha: 0.1);
            border-radius: 5px;
        }

        button {
            background: $color2;
            border-color: none;
            box-shadow: none;
            font-weight: 600;
            color: $white;
            text-transform: uppercase;

            &:hover {
                background: rgba($color: $color2, $alpha: 0.9);
            }

            &:active {
                background: $color5;
            }
        }

        input {
            border-color: $grey2;
            box-shadow: inset 0 0 5px rgba($color: #000000, $alpha: 0.05);

            &:focus {
                border-color: $color2;
                box-shadow: 0 0 0 3px rgba($color: $color2, $alpha: 0.2);
            }
        }
    }

    &::before {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: url("~/images/food-pattern.png") repeat-x;
        background-size: contain;
        box-shadow: inset 0 10px 20px $color4;
        filter: blur(2px);
        opacity: 0.1;
    }
}

#download {
    background: linear-gradient(90deg, $white, $grey1);

    h2 {
        color: $color3;
    }
}
</style>
