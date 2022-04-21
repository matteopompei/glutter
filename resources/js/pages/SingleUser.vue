<template>
  <div>
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
                :alt="user.name"
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
          <div class="col-md-5 col-lg-8">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
              <a
                href="#"
                v-for="dish in user.dishes"
                :key="dish.id + dish.name"
                class="col mb-4"
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
                    <button
                      class="button btn add_btn is-success"
                      @click.prevent="addToCart(dish)"
                    >
                      +
                    </button>
                    <button
                      class="removeBtn btn remove_btn"
                      @click.prevent="removeFromCart(dish)"
                    >
                      -
                    </button>
                    <h5 class="text-right mt-4">
                      {{ formatPrice(dish.price) }} €
                    </h5>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-7 col-lg-4">
            <div class="rounded py-3 px-4 carrello">
              <h4 class="mb-3">Il tuo ordine</h4>
              <div v-if="$store.state.cartCount > 0">
                <div
                  v-for="dish in $store.state.cart"
                  :key="'cart' + dish.id + dish.name"
                  class="navbar-item"
                  href=""
                >
                  <span
                    >{{ dish.name }} x{{ dish.quantity }} ({{
                      dish.totalPrice
                    }}€)</span
                  >
                  <button
                    class="button btn add_btn is-success"
                    @click.prevent="addToCart(dish)"
                  >
                    +
                  </button>
                  <button
                    class="removeBtn btn remove_btn"
                    @click.prevent="removeFromCart(dish)"
                  >
                    -
                  </button>
                </div>

                <div class="navbar-item" href="">Totale: {{ totalPrice }}€</div>
                <button
                  class="button btn btn_scoop is-success"
                  @click.prevent="removeAllFromCart()"
                >
                  Svuota Carrello
                </button>
                <button
                  type="button"
                  class="btn btn-secondary btn-lg btn-block mt-5"
                  disabled
                >
                  Vai al pagamento
                </button>
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
  methods: {
    addToCart(dish) {
      this.$store.commit("addToCart", dish);
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
  },
  computed: {
    totalPrice() {
      return this.$store.getters.getTotal;
    },
  },
  data() {
    return {
      user: {},
    };
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
.add_btn {
  background-color: $color3;
  color: #fff;
}
.remove_btn {
  background-color: $red;
  color: #fff;
}
.btn_scoop {
  background-color: $red;
  color: white;
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

  a {
    display: block;
    color: $grey4;
    text-decoration: none;

    .dish {
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
    background: #fff;
    box-shadow: 0 5px 5px rgba($color: $grey3, $alpha: 0.1);
  }
}
</style>
