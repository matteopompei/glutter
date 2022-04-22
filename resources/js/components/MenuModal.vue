<template>
  <div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Nome Piatto
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
              class="navbar-item"
              href=""
            >
              <span
                >{{ dish.name }} x{{ dish.quantity }} ({{
                  dish.totalPrice
                }}€)</span
              >
              <button
                class="button btn add_btn is-success"
                @click.prevent="addToCart(dish)"
              >
                +
              </button>
              <button
                class="removeBtn btn remove_btn"
                @click.prevent="removeFromCart(dish)"
              >
                -
              </button>
            </div>

            <div class="navbar-item" href="">Totale: {{ formatPrice(totalPrice) }}€</div>
          </div>
          <div v-else>Il carrello è vuoto</div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="btn ms_btn_dismiss" data-dismiss="modal">
            Torna al ristorante
          </button>
          <button type="button" class="btn ms_btn_checkout">
            Vai al checkout
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "MenuModal",
  methods: {
    addToCart(dish) {
      this.$store.commit("addToCart", dish);
    },
    removeFromCart(dish) {
      this.$store.commit("removeFromCart", dish);
    },
    showMenuModal() {
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

.add_btn {
  background-color: $color3;
  color: #fff;
}
.remove_btn {
  background-color: $red;
  color: #fff;
}
.ms_btn_dismiss {
  color: white;
  background-color: $grey3;
}
.ms_btn_checkout {
  color: white;
  background-color: $color3;
}
.btn_scoop {
  background-color: $red;
  color: white;
}
</style>