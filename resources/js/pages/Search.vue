<template>
    <div>
        <section id="search">
            <div class="container-fluid">
                <div class="row py-5">
                    <div class="col-md-3 col-xl-2 filters">
                        <h4 class="mb-4">Criteri di ricerca</h4>
                        <!-- QUI SOTTO AGGIUNGERE I VARI FILTRI -->
                        <div class="form-group">
                            <input
                                v-model="search"
                                type="text"
                                placeholder="Cerca ristorante"
                                class="form-control search-bar"
                            />
                        </div>
                        <div class="form-group">
                            <div
                                v-for="(category, index) in all_categories"
                                :key="index"
                                class="form-check py-1 category"
                            >
                                <input
                                    :id="'category' + category.id"
                                    type="checkbox"
                                    v-model="checkArray"
                                    :value="category.name"
                                    class="form-check-input"
                                />
                                <label
                                    :for="'category' + category.id"
                                    class="form-check-label text-capitalize"
                                >
                                    {{ category.name }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-xl-10 restaurant-list">
                        <h4 class="mt-5 mt-md-0 mb-4">
                            Risultati della ricerca
                        </h4>
                        <div
                            class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4"
                        >
                            <div
                                class="col pb-4"
                                v-for="(
                                    restaurant, index
                                ) in searchedRestaurants"
                                :key="index"
                                :info="restaurant"
                                :class="{ not_visible: restaurant.visible }"
                            >
                                <router-link
                                    :to="{
                                        name: 'singleuser',
                                        params: { id: restaurant.id },
                                    }"
                                    class="card restaurant"
                                >
                                    <div class="avatar-container">
                                        <img
                                            v-if="restaurant.image"
                                            :src="`/storage/${restaurant.image}`"
                                            class="card-img-top img-restaurant"
                                            :alt="restaurant.business_name"
                                        />
                                        <img
                                            v-else
                                            src="/images/restaurant-placeholder.png"
                                            :alt="restaurant.business_name"
                                            class="img-fluid img-restaurant"
                                        />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ restaurant.business_name }}
                                        </h5>
                                        <p class="card-text">
                                            {{ restaurant.address }}
                                        </p>
                                        <span
                                            v-for="(
                                                category, index
                                            ) in restaurant.categories"
                                            :key="index"
                                            class="badge badge-light text-capitalize mx-1"
                                        >
                                            {{ category.name }}
                                        </span>
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
            search: this.$route.query.s,
            checkArray: [],
        };
    },
    watch: {
        search(newVal) {
            this.$router.push({ query: { ...this.$route.query, s: newVal } });
        },
        "$route.query.s": function (val) {
            this.search = val;
        },
        checkArray(newVal) {
            this.$router
                .push({ query: { ...this.$route.query, c: newVal } })
                .catch(() => {});
        },
        "$route.query.c": function (val) {
            this.checkArray = val;
        },
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

        if (this.$route.query.c.isArray) {
            for (let category of this.$route.query.c) {
                this.checkArray.push(category);
            }
        } else {
            this.checkArray.push(this.$route.query.c);
        }
    },
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

.filters {
    .search-bar {
        border-color: $grey2;
        box-shadow: inset 0 0 5px rgba($color: #000000, $alpha: 0.05);

        &:focus {
            border-color: $color2;
            box-shadow: 0 0 0 3px rgba($color: $color2, $alpha: 0.2);
        }
    }

    .category {
        transition: 0.1s;

        &:hover {
            background: $grey1;
        }

        &:active {
            background: $grey2;
        }

        label {
            width: 100%;
        }

        * {
            cursor: pointer;
        }
    }
}

.restaurant {
    display: block;
    height: 100%;
    color: $black;
    background: $white;
    border: 0;
    box-shadow: 0 5px 5px rgba($color: $grey3, $alpha: 0.1);
    transition: 0.3s;

    &:hover {
        text-decoration: none;
        box-shadow: 0 10px 15px rgba($color: $grey3, $alpha: 0.2);
    }

    .avatar-container {
        padding-top: 50%;
        position: relative;

        .img-restaurant {
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
</style>
