<template>
  <a href="#">
    <i class="fa-solid fa-cart-shopping mx-4 cart">{{ cart.length }}</i>
  </a>
</template>

<script>
import { bus } from "../front.js";
export default {
  name: "ShoppingCart",
  data: () => {
    return {
      cart: [],
    };
  },
  created() {
    bus.$on("gotShoppingCart", (data) => {
      this.cart = data;
      console.log(this.cart);
    });
  },
};
</script>

<style lang="scss" scoped>
.cart {
  font-size: 2rem;
  color: #fff;
  transition: 0.3s;

  &:hover,
  &:active {
    transform: scale(1.1);
  }
}
</style>