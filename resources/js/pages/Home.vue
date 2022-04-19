<template>
    <div class="jumbotron jumbotron-fluid custom-jumbo">
        <div class="container-xl">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <h1 class="display-4 mb-5">#FoodIsComing</h1>
                    <blockquote class="blockquote p-3">
                        <p class="mb-0">
                            A tavola perdonerei chiunque. Anche i miei parenti.
                        </p>
                        <footer class="blockquote-footer">Oscar Wilde</footer>
                    </blockquote>
                </div>
                <div class="col-md-7">
                    <div class="search p-5">
                        <p class="lead">Inserisci un nome o un alimento.</p>
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Es. pizza"
                                aria-label="Recipient's username"
                                aria-describedby="basic-addon2"
                            />
                            <div class="input-group-append">
                                <button class="btn" type="button">Cerca</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    background: $color4;
    color: $white;

    blockquote {
        width: fit-content;
        background: rgba($color: #000000, $alpha: 0.1);
        border-radius: 10px;

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
}
</style>
