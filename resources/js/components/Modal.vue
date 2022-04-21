<template>
  <!-- Modal -->
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
          <h5 class="modal-title" id="exampleModalLabel">Carrello</h5>
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
            <div>Stai acquistando presso: Nome ristorante</div>
            <div
              v-for="dish in $store.state.cart"
              :key="'cart' + dish.id + dish.name"
              class="navbar-item"
              href=""
            >
              {{ dish.name }} x{{ dish.quantity }} ({{ dish.totalPrice }}€)
            </div>

            <div class="navbar-item" href="">Totale: {{ totalPrice }}€</div>

            <button
              class="button is-success"
              @click.prevent="removeAllFromCart()"
            >
              Svuota Carrello
            </button>
          </div>
          <div v-else>Il carrello è vuoto</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn ms_btn_dismiss" data-dismiss="modal">
            Torna al ristorante
          </button>
          <button type="button" class="btn ms_btn_checkout">Vai al checkout</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Modal",
  methods: {
    removeAllFromCart() {
      this.$store.commit("removeAllFromCart");
    },
    showModal() {
      this.$root.$emit("Main");
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
.ms_btn_dismiss{
  color: white;
  background-color: $grey3;
}
.ms_btn_checkout{
  color: white;
  background-color: $color3;
}
</style>