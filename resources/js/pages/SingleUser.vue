<template>
  <div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="errorModal"
      tabindex="-1"
      aria-labelledby="errorModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="errorModalLabel">Attenzione</h5>
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
            Puoi ordinare da un ristorante alla volta. Svuota il carrello se
            vuoi proseguire gli acquisti presso questo ristorante!
          </div>
          <div class="modal-footer">
            <button
              @click="removeAllFromCart"
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Svuota il carrello
            </button>
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Chiudi
            </button>
          </div>
        </div>
      </div>
    </div>

    <div id="info">
      <div class="container-xl">
        <div class="row p-5">
          <div class="col-md-5">
            <div class="avatar-container">
              <img
                v-if="user.image"
                :src="`/storage/${user.image}`"
                :alt="user.name"
                class="img-fluid rounded avatar"
              />
              <img
                v-else
                src="/images/restaurant-placeholder.png"
                :alt="user.business_name"
                class="img-fluid placeholder-avatar"
              />
            </div>
          </div>
          <div class="col-md-7">
            <h1 class="display-4">{{ user.business_name }}</h1>
            <h5>{{ user.address }}</h5>
            <div class="categories">
              <span
                v-for="category in user.categories"
                :key="category.id + category.name"
                class="badge mx-1"
              >
                {{ category.name }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="dishes" class="py-5">
      <div class="container-fluid">
        <div class="row py-5 px-3">
          <div class="col-md-5 col-lg-6 col-xl-7">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
              <div
                v-for="dish in user.dishes"
                :key="dish.id + dish.name"
                @click.prevent="openDishModal(dish)"
                class="dish col mb-4"
              >
                <div class="card h-100 dish">
                  <div class="avatar-container">
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
                  </div>
                  <div class="card-body text-center">
                    <h5 class="card-title">
                      {{ dish.name }}
                    </h5>
                    <p class="card-text">
                      {{ dish.ingredients }}
                    </p>
                    <h5 class="text-right mt-4">
                      {{ formatPrice(dish.price) }} €
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7 col-lg-6 col-xl-5">
            <div class="rounded py-3 px-4 carrello">
              <h4 class="mb-3">Il tuo ordine</h4>
              <div
                v-if="
                  $store.state.cartCount > 0 &&
                  $store.state.cart[0].user_id == user.id
                "
              >
                <div
                  v-for="dish in $store.state.cart"
                  :key="'cart' + dish.id + dish.name"
                  class="d-flex justify-content-between align-items-center mb-2"
                >
                  <div>
                    {{ dish.name }}
                    <em class="ml-2">x{{ dish.quantity }}</em>
                    ({{ dish.totalPrice }}
                    €)
                  </div>
                  <div>
                    <button
                      class="btn rounded-circle mx-2 py-1 px-2 add_btn"
                      @click.prevent="addToCart(dish)"
                    >
                      <i class="fa-solid fa-plus"></i>
                    </button>
                    <button
                      class="btn rounded-circle mx-2 py-1 px-2 remove_btn"
                      @click.prevent="removeFromCart(dish)"
                    >
                      <i class="fa-solid fa-minus"></i>
                    </button>
                  </div>
                </div>

                <div class="mt-5 mb-2">
                  <h4>Totale: {{ totalPrice }} €</h4>
                </div>
                <button
                  class="btn btn-danger btn-lg btn-block mt-5"
                  @click.prevent="removeAllFromCart()"
                >
                  Svuota carrello
                </button>
                <a
                  href="/payment/checkout"
                  class="btn btn-secondary btn-lg btn-block mt-1"
                >
                  Vai al pagamento
                </a>
              </div>
              <div v-else>Il carrello è vuoto</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SingleUser",
  data() {
    return {
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
    removeAllFromCart() {
      this.$store.commit("removeAllFromCart");
    },
    formatPrice(price) {
      return price.replace(".", ",");
    },
    openDishModal(dish) {
      if (
        this.$store.state.cart.length > 0 &&
        this.$store.state.cart[0].user_id != dish.user_id
      ) {
        $("#errorModal").modal("show");
      } else {
        let user = this.user;
        this.$root.$emit("DishModalEvent", { dish, user });
      }
    },
  },
  computed: {
    totalPrice() {
      return this.$store.getters.getTotal;
    },
  },
  created() {
    axios
      .get(`/api/restaurants/${this.$route.params.id}`)
      .then((apiResponse) => {
        this.user = apiResponse.data;
      })
      .catch((error) => {
        this.$router.push({ name: "error404" });
      });
  },
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";
.dish {
  cursor: pointer;
}
#info {
  position: relative;
  z-index: 2;
  background: linear-gradient(
    $color4 0%,
    rgba($color: $color4, $alpha: 0.5) 15%,
    rgba($color: $color4, $alpha: 0.25) 25%,
    $white 80%
  );
  // border-bottom: 10px solid $grey1;
  box-shadow: 0 10px 10px rgba($color: $grey2, $alpha: 0.3);

  .avatar-container {
    padding-top: 75%;
    position: relative;

    .avatar {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 100%;
      height: 100%;
      object-fit: cover;
      background: rgba($color: $white, $alpha: 0.2);
      box-shadow: inset 0 -15px 50px rgba($color: $black, $alpha: 0.2),
        0 5px 10px rgba($color: $black, $alpha: 0.1);
    }

    .placeholder-avatar {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 15% 20%;
    }
  }

  .categories {
    span {
      text-transform: capitalize;
      background: $color4;
      color: $grey1;
    }
  }
}

#dishes {
  position: relative;
  z-index: 1;
  background: $grey1;

  .dish {
    display: block;
    color: $grey4;
    text-decoration: none;

    .card {
      background: $white;
      border: 0;
      box-shadow: 0 5px 5px rgba($color: $grey3, $alpha: 0.1);
      transition: 0.3s;

      &:hover {
        box-shadow: 0 10px 15px rgba($color: $grey3, $alpha: 0.2);
      }
    }

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
  }

  .carrello {
    background: $white;
    box-shadow: 0 5px 5px rgba($color: $grey3, $alpha: 0.1);

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
