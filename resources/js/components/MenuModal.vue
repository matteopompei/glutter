<template>
  <div
    class="modal fade"
    id="piatto"
    tabindex="-1"
    aria-labelledby="piatto"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content box-piatto">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            {{ dish.name }}
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
          <div class="avatar-container">
            <img
              v-if="dish.image"
              :src="`/storage/${dish.image}`"
              :alt="dish.name"
              class="rounded img-fluid img-food"
            />
            <img
              v-else
              src="/images/dish-placeholder.png"
              :alt="dish.name"
              class="rounded img-fluid img-food"
            />
          </div>
          <p class="my-4">
            {{ dish.ingredients }}
          </p>

          <h5 v-if="dish['price']" class="text-right">
            {{ formatPrice(dish.price) }} €
          </h5>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button
            class="btn rounded-circle mx-2 py-1 px-2 add_btn"
            @click.prevent="addToCart(dish)"
          >
            <i class="fa-solid fa-plus"></i>
          </button>
          <div v-if="quantity" class="quantity">{{ quantity }}</div>
          <div v-else>0</div>
          <button
            class="btn rounded-circle mx-2 py-1 px-2 remove_btn"
            @click.prevent="removeFromCart(dish)"
          >
            <i class="fa-solid fa-minus"></i>
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
    addToCart(dish) {
      let businessName = this.user.business_name;
      this.$store.commit("addToCart", { dish, businessName });
    },
    removeFromCart(dish) {
      this.$store.commit("removeFromCart", dish);
    },
    formatPrice(price) {
      return price.replace(".", ",");
    },
    getQuantity() {
      console.log(this.dish.id);
    },
  },
  computed: {
    quantity() {
      let found = this.$store.state.cart.find(
        (element) => element.id == this.dish.id
      );
      if (found) {
        return found.quantity;
      } else {
        return 0;
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

#piatto {
  background: rgba($color: $black, $alpha: 0.2);

  .box-piatto {
    box-shadow: 0 10px 40px rgba($color: $black, $alpha: 0.7);

    .avatar-container {
      padding-top: 50%;
      position: relative;

      .img-food {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100%;
        object-fit: cover;
        background-color: $grey1;
      }
    }

    .add_btn,
    .remove_btn {
      background: $white;
      box-shadow: 0 3px 5px rgba($color: $black, $alpha: 0.1);
      transition: 0.3s;

      &:hover {
        box-shadow: 0 3px 10px rgba($color: $black, $alpha: 0.15);
      }

      &:active {
        background: $grey1;
        box-shadow: 0 0 3px rgba($color: $black, $alpha: 0.2);
      }
    }
    .add_btn {
      color: $color3;
    }
    .remove_btn {
      color: $color2;
    }
  }
}
</style>
