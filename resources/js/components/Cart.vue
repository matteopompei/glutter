<template>
  <div class="navbar-item has-dropdown is-hoverable">
    <div>Carrello ({{ $store.state.cartCount }})</div>

    <div v-if="$store.state.cartCount > 0">
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

<style>
</style>