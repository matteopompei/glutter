<template>
    <div
        class="modal fade"
        id="carrello"
        tabindex="-1"
        aria-labelledby="carrello"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content box-carrello">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Carrello
                        <span v-if="$store.state.cartCount > 0"
                            >({{ $store.state.businessName }})</span
                        >
                    </h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div v-if="$store.state.cartCount > 0">
                        <div
                            v-for="dish in $store.state.cart"
                            :key="'cart' + dish.id + dish.name"
                            class="d-flex justify-content-between align-items-center mb-2"
                        >
                            <div>
                                {{ dish.name }} x{{ dish.quantity }} ({{
                                    dish.totalPrice
                                }}
                                €)
                            </div>
                            <div>
                                <button
                                    class="btn rounded-circle mx-2 py-1 px-2 add_btn"
                                    @click.prevent="addToCart(dish)"
                                >
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                                <button
                                    class="btn rounded-circle mx-2 py-1 px-2 remove_btn"
                                    @click.prevent="removeFromCart(dish)"
                                >
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="font-weight-bold my-3">
                            Totale: {{ formatPrice(totalPrice) }} €
                        </div>
                    </div>
                    <div v-else>Il carrello è vuoto</div>
                </div>
                <div
                    v-if="$store.state.cartCount > 0"
                    class="modal-footer d-flex justify-content-center"
                >
                    <button
                        class="btn btn-danger"
                        @click.prevent="removeAllFromCart()"
                    >
                        Svuota carrello
                    </button>
                    <!-- <router-link :to="`/restaurant/${this.$store.state.cart[0].user_id}`">Torna al ristorante</router-link> -->
                    <router-link
                        :to="{
                            name: 'singleuser',
                            params: { id: $store.state.userID },
                        }"
                        class="btn btn-info"
                        data-dismiss="modal"
                        >Torna al ristorante</router-link
                    >
                    <a href="/payment/checkout" class="btn btn-success">
                        Vai al checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Modal",
    methods: {
        addToCart(dish) {
            this.$store.commit("addToCart", { dish });
        },
        removeFromCart(dish) {
            this.$store.commit("removeFromCart", dish);
        },
        removeAllFromCart() {
            this.$store.commit("removeAllFromCart");
        },
        showModal() {
            this.$root.$emit("Main");
        },
        formatPrice(price) {
            return price.replace(".", ",");
        },
    },
    computed: {
        totalPrice() {
            return this.$store.getters.getTotal;
        },
    },
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

#carrello {
    background: rgba($color: $black, $alpha: 0.2);

    .box-carrello {
        box-shadow: 0 10px 40px rgba($color: $black, $alpha: 0.7);

        .add_btn,
        .remove_btn {
            background: $white;
            box-shadow: 0 3px 5px rgba($color: $black, $alpha: 0.1);
            transition: 0.3s;

            &:hover {
                box-shadow: 0 3px 10px rgba($color: $black, $alpha: 0.15);
            }

            &:active {
                background: $grey1;
                box-shadow: 0 0 3px rgba($color: $black, $alpha: 0.2);
            }
        }
        .add_btn {
            color: $color3;
        }
        .remove_btn {
            color: $color2;
        }
    }
}
</style>
