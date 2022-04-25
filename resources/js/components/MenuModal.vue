<template>
  <div
    class="modal fade"
    id="MenuModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ dish.name }}</h5>
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
          <img
            v-if="dish.image"
            :src="`/storage/${dish.image}`"
            :alt="dish.name"
            class="card-img-top img-food"
          />
          <img
            v-else
            src="/images/dish-placeholder.png"
            :alt="dish.name"
            class="card-img-top img-food"
          />
          <p class="card-text">
            {{ dish.ingredients }}
          </p>

          <h5 v-if="dish['price']" class="text-right mt-4">
            {{ formatPrice(dish.price) }} €
          </h5>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button class="button btn add_btn" @click.prevent="addToCart(dish)">
            +
          </button>
          <div v-if="quantity" class="quantity">{{ quantity }}</div>
          <div v-else>0</div>
          <button
            class="removeBtn btn remove_btn"
            @click.prevent="removeFromCart(dish)"
          >
            -
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "MenuModal",
  data() {
    return {
      dish: {},
      user: {},
    };
  },
  methods: {
    showMenuModal() {
      this.$root.$emit("DishModalEvent");
    },
    addToCart(dish) {
      let businessName = this.user.business_name;
      this.$store.commit("addToCart", { dish, businessName });
    },
    removeFromCart(dish) {
      this.$store.commit("removeFromCart", dish);
    },
    formatPrice(price) {
      console.log(price);
      return price.replace(".", ",");
    },
  },
  computed: {
    totalPrice() {
      return this.$store.getters.getTotal;
    },
    quantity() {
      for (let item of this.$store.state.cart) {
        if (item.id == this.dish.id) {
          return item.quantity;
        } else {
          return 0;
        }
      }
    },
  },
  mounted() {
    this.$root.$on("DishModalEvent", (data) => {
      this.dish = data.dish;
      this.user = data.user;
    });
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