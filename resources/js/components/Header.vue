<template>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark py-3 fixed-top d-flex justify-content-between">
      <a class="navbar-brand" href="/">
        <img src="/images/Glutter1.png" alt="Glutter" class="img-fluid logo" />
      </a>
      <Cart />
    </nav>
  </header>
</template>

<script>
// import ShoppingCart from "./ShoppingCart.vue";
import Cart from "./Cart.vue";

export default {
  name: "Header",
  components: {
    //ShoppingCart,
    Cart,
  },
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

nav {
  background: rgba($color: $color4, $alpha: 0.7);
  backdrop-filter: blur(10px);
  box-shadow: 0 5px 10px rgba($color: #000000, $alpha: 0.1);

  .logo {
    max-width: 250px;
  }
}
</style>
