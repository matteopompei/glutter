<template>
  <div class="navbar-item has-dropdown is-hoverable">
    <div class="cart">
      <i class="fa-solid fa-cart-shopping mx-4" />
      <div class="cart-counter">{{ $store.state.cartCount }}</div>
    </div>

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

      <button class="button is-success" @click.prevent="removeAllFromCart()">
        Svuota Carrello
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Cart",
  methods: {
    removeAllFromCart() {
      this.$store.commit("removeAllFromCart");
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
.cart {
  color: #fff;
  transition: 0.3s;
  cursor: pointer;
  position: relative;

  &:hover,
  &:active {
    transform: scale(1.1);
  }

  i {
    font-size: 2rem;
  }
  .cart-counter {
    font-size: 15px;
    padding: 0 7px;
    position: absolute;
    right: 10px;
    bottom: -10px;

    background-color: red;
    border-radius: 50%;
  }
}
</style>