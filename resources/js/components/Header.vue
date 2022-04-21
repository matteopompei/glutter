<template>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark py-3 fixed-top">
      <a class="navbar-brand" href="/">
        <img src="/images/Glutter1.png" alt="Glutter" class="img-fluid logo" />
      </a>

      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div
        class="collapse navbar-collapse justify-content-end"
        id="navbarSupportedContent"
      >
        <div class="form-inline mt-5 mb-3 my-md-2 justify-content-center user">
          <a href="/login" class="btn mx-2">Accedi</a>
          <a href="/register" class="btn btn-light text-uppercase mx-2"
            >Registrati</a
          >
          <!-- <ShoppingCart /> -->
          <Cart />
        </div>
      </div>
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
