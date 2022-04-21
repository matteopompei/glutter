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
@import "../../sass/_variables.scss";

.cart {
  color: #fff;
  cursor: pointer;
  position: relative;
  i{
    transition: 0.3s;
      &:hover,
      &:active {
        transform: scale(1.1);
        // color: $grey1;
      }
  }
  

  i {
    font-size: 2rem;
  }
  .cart-counter {
    // font-size: 15px;
    height: 30px;
    width: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    right: 10px;
    bottom: -10px;

    background-color: red;
    border-radius: 50%;
  }
}
</style>