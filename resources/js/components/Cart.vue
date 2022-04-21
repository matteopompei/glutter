<template>
  <div class="navbar-item has-dropdown is-hoverable">
    <div class="cart">
      <i @click="showModal" class="fa-solid fa-cart-shopping mx-4" />
      <div class="cart-counter">{{ $store.state.cartCount }}</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Cart",
  methods: {
    showModal() {
      this.$root.$emit("Main");
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