<template>
  <div>
    <div id="info" class="row p-5">
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
    <div id="dishes" class="py-5">
      <div
        href="#"
        v-for="dish in user.dishes"
        :key="dish.id + dish.name"
        class="row rounded my-4 mx-5 p-3"
      >
        <div class="col">
          <div class="row">
            <div class="col-2">
              <div class="avatar-container">
                <img
                  v-if="dish.image"
                  :src="`/storage/${dish.image}`"
                  :alt="dish.name"
                  class="img-fluid rounded avatar"
                />
                <img
                  v-else
                  src="/images/dish-placeholder.png"
                  :alt="dish.name"
                  class="img-fluid rounded avatar"
                />
              </div>
            </div>
            <div class="col-10 d-flex flex-column justify-content-between py-3">
              <h5>{{ dish.name }}</h5>
              <p>{{ dish.ingredients }}</p>
              <p>{{ dish.price }}€</p>
              <button
                class="button is-success"
                @click.prevent="addToCart(dish)"
              >
                Add to Cart
              </button>
              <button class="removeBtn" @click.prevent="removeFromCart(dish)">
                Rimuovi dal carrello
              </button>
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
        this.$router.push({ name: "page-404" });
      });
  },
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

#info {
  position: relative;
  z-index: 2;
  background-image: linear-gradient(
    $color4 0%,
    rgba($color: $color4, $alpha: 0.5) 15%,
    rgba($color: $color4, $alpha: 0.4) 25%,
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
      background-color: $grey1;
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

  & > a {
    display: block;
    background: $white;
    box-shadow: 0 5px 5px rgba($color: $grey3, $alpha: 0.1);
    color: $grey4;
    transition: 0.3s;

    &:hover {
      box-shadow: 0 10px 15px rgba($color: $grey3, $alpha: 0.2);
      text-decoration: none;
    }

    .avatar-container {
      padding-top: 100%;
      position: relative;

      .avatar {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        height: 90%;
        object-fit: cover;
        background-color: $grey1;
      }
    }
  }
}
</style>
