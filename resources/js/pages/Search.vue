<template>
  <div>
    <section id="search">
      <div class="container-fluid">
        <div class="row py-5">
          <div class="col-md-2">
            <h4 class="mb-4">Criteri di ricerca</h4>
            <!-- QUI SOTTO AGGIUNGERE I VARI FILTRI -->
            <div class="input-group mb-3">
              <input
                v-model="search"
                type="text"
                class="form-control"
                placeholder="Cerca il nome di un ristorante"
              />
            </div>
            <div class="filter_container">
              <div v-for="(category, index) in all_categories" :key="index">
                <input
                  id="checkbox"
                  type="checkbox"
                  v-model="checkArray"
                  :value="category.name"
                />
                <span>{{ category.name }}</span>
              </div>
            </div>
          </div>
          <div class="col-md-10">
            <h4 class="mb-4">Risultati della ricerca</h4>
            <div
              class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-5"
            >
              <div
                class="col pb-3"
                v-for="(restaurant, index) in searchedRestaurants"
                :key="index"
                :info="restaurant"
                :class="{ not_visible: restaurant.visible }"
              >
                <router-link
                  :to="{ name: 'singleuser', params: { id: restaurant.id } }"
                >
                  <div class="card restaurant">
                    <div class="avatar-container">
                      <img
                        :src="`/storage/${restaurant.image}`"
                        class="card-img-top img-food"
                        alt=""
                      />
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">
                        {{ restaurant.business_name }}
                      </h5>
                      <p class="card-text">{{ restaurant.address }}</p>
                      <span
                        v-for="(category, index) in restaurant.categories"
                        :key="index"
                        class="badge badge-light mx-1"
                      >
                        {{ category.name }}
                      </span>
                    </div>
                  </div>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "Search",
  data() {
    return {
      all_categories: [],
      all_restaurants: [],
      search: "",
      checkArray: [],
    };
  },
  methods: {
    //Ritorna ristoranti filtrati tramite search bar
    // searchRestaurant: function () {
    //   for (let index = 0; index < this.all_restaurants.length; index++) {
    //     const element = this.all_restaurants[index];
    //     if (
    //       !element.business_name
    //         .toLowerCase()
    //         .includes(this.search.toLowerCase())
    //     ) {
    //       element.visible = true;
    //     } else {
    //       element.visible = false;
    //     }
    //   }
    // },
    // search(input) {
    //   this.search = input;
    // },
  },

  computed: {
    //Ritorna ristoranti filtrati tramite chekbox
    searchedRestaurants() {
      return this.all_restaurants.filter((restaurant) => {
        if (
          restaurant.business_name
            .toLowerCase()
            .includes(this.search.toLowerCase())
        ) {
          if (this.checkArray.length == 0) {
            return restaurant;
          } else {
            let categories = [];
            for (let category of restaurant.categories) {
              categories.push(category.name);
            }

            if (
              this.checkArray.every((element) => {
                return categories.includes(element);
              })
            ) {
              return restaurant;
            }
          }
        }
      });
    },
  },
  created() {
    //AAAAAAAAAAH FUNZIONA SOLO SE GLI VA
    // this.search = this.$store.state.searchInput;
    // console.log(this.search, "ciao");

    axios
      .get(`/api/categories`)
      .then((apiResponse) => {
        this.all_categories = apiResponse.data;
      })
      .catch((error) => {
        this.$router.push({ name: "error404" });
      });
    axios
      .get(`/api/restaurants`)
      .then((apiResponse) => {
        this.all_restaurants = apiResponse.data;
      })
      .catch((error) => {
        this.$router.push({ name: "error404" });
      });
  },
  mounted() {
    this.$root.$on("SearchInputEvent", (data) => {
      this.search = data;
      //   this.searchRestaurant();
    });
  },
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";
.restaurant {
  height: 100%;
  color: black;
  &:hover {
    cursor: pointer;
  }
}
a {
  text-decoration: none;
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
.not_visible {
  display: none;
}
</style>
