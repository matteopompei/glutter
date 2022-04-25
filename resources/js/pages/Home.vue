<template>
  <div>
    <section class="jumbotron jumbotron-fluid m-0 custom-jumbo">
      <div class="container-xl">
        <div class="row align-items-center py-5">
          <div class="col-md-7 mx-auto">
            <h1 class="display-2 d-none d-lg-block mb-5">#FoodIsComing</h1>
            <h1 class="display-3 d-none d-md-block d-lg-none mb-5">
              #FoodIsComing
            </h1>
            <h1 class="display-4 d-sm-block d-md-none text-center mb-5">
              #FoodIsComing
            </h1>
            <blockquote class="blockquote mx-auto mx-md-0 p-3">
              <p class="mb-0">
                A tavola perdonerei chiunque. Anche i miei parenti.
              </p>
              <footer class="blockquote-footer">Oscar Wilde</footer>
            </blockquote>
          </div>
          <div class="col-md-5">
            <div class="mt-5 mt-md-0 p-5 search">
              <p class="lead mb-3">Cerca un ristorante.</p>
              <div class="input-group">
                <input
                  type="text"
                  v-model="searchInput"
                  class="form-control"
                  placeholder="Es. pizza"
                  aria-label="Cerca ristorante"
                  aria-describedby="basic-addon2"
                />

                <div class="input-group-append">
                  <button class="btn" type="button" @click="sendSearchInput()">
                    <router-link :to="{ name: 'search' }">Cerca</router-link>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="categories" class="py-5">
      <div class="container-xl">
        <h2 class="display-4 mb-4">Le categorie più gettonate</h2>
        <div class="row">
          <div class="col-md-7 p-1">
            <a href="#" class="text-center p-5 pizza"><h3>Pizza</h3></a>
          </div>
          <div class="col-md-5 p-1">
            <a href="#" class="text-center p-5 sushi"><h3>Sushi</h3></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5 p-1">
            <a href="#" class="text-center p-5 hamburger">
              <h3>Hamburger</h3></a
            >
          </div>
          <div class="col-md-7 p-1">
            <a href="#" class="text-center p-5 pasta"> <h3>Pasta</h3></a>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col">
            <h3 class="mb-3">Cerchi qualcos'altro?</h3>
            <div class="text-center text-md-left">
              <div
                v-for="(singleCategory, index) in all_categories"
                :key="index"
                class="btn btn-light text-uppercase font-weight-bold m-2"
              >
                {{ singleCategory.name }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="download" class="py-5">
      <div class="container-xl">
        <div class="row align-items-center py-5">
          <div class="col-md-8">
            <h2 class="display-4 text-center text-md-left mb-5">
              Hai già installato la nostra app?
            </h2>
            <div class="row text-left">
              <div class="col-md py-4 py-md-0 px-5 px-md-1 px-lg-4">
                <a href="#" target="_blank">
                  <img
                    src="/images/download-google-play-store.png"
                    alt="Google Play"
                    class="img-fluid"
                  />
                </a>
              </div>
              <div class="col-md py-4 py-md-0 px-5 px-md-1 px-lg-4">
                <a href="#" target="_blank">
                  <img
                    src="/images/download-apple-app-store.png"
                    alt="Apple App Store"
                    class="img-fluid"
                  />
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-none d-md-block">
            <img
              src="images/sticker-app.png"
              alt="App Glutter"
              class="img-fluid"
            />
          </div>
        </div>
      </div>
    </section>

    <section id="user-area" class="py-5">
      <div class="container-xl">
        <h2 class="display-4 text-center mb-5">Sei un ristoratore?</h2>
        <div class="container-sm">
          <div class="row">
            <div class="col-5 text-right px-lg-5">
              <a href="/login" class="btn btn-light btn-lg text-uppercase">
                Accedi</a
              >
            </div>
            <div class="col-2 text-center text-light py-2">- o -</div>
            <div class="col-5 text-left px-lg-5">
              <a href="/register" class="btn btn-light btn-lg text-uppercase"
                >Registrati</a
              >
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "Home",
  data() {
    return {
      all_categories: {},
      searchInput: "",
    };
  },
  methods: {
    setSearchInput() {
      this.$store.commit("setSearchInput", this.searchInput);
    },
    sendSearchInput() {
      this.$root.$emit("SearchInputEvent", this.searchInput);
    },
  },
  created() {
    axios
      .get(`/api/categories`)
      .then((apiResponse) => {
        this.all_categories = apiResponse.data;
      })
      .catch((error) => {
        this.$router.push({ name: "error404" });
      });
  },
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";
a {
  text-decoration: none;
  color: white;
}
.custom-jumbo {
  position: relative;
  background: $color4;
  color: $white;

  blockquote {
    width: fit-content;
    background: rgba($color: #000000, $alpha: 0.2);
    border-radius: 10px;
    box-shadow: 0 5px 5px rgba($color: $color3, $alpha: 0.1);

    footer {
      color: $white;
    }
  }

  .search {
    background: $white;
    border-radius: 20px;
    box-shadow: 0 15px 20px rgba($color: #000000, $alpha: 0.1);
    color: $grey4;

    & > div {
      box-shadow: 0 1px 3px rgba($color: #000000, $alpha: 0.1);
      border-radius: 5px;
    }

    button {
      background: $color2;
      border-color: none;
      box-shadow: none;
      font-weight: 600;
      color: $white;
      text-transform: uppercase;

      &:hover {
        background: rgba($color: $color2, $alpha: 0.9);
      }

      &:active {
        background: $color5;
      }
    }

    input {
      border-color: $grey2;
      box-shadow: inset 0 0 5px rgba($color: #000000, $alpha: 0.05);

      &:focus {
        border-color: $color2;
        box-shadow: 0 0 0 3px rgba($color: $color2, $alpha: 0.2);
      }
    }
  }

  &::before {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: url("~/images/food-pattern.png") repeat;
    background-size: contain;
    box-shadow: inset 0 10px 20px $color4;
    filter: blur(3px);
    opacity: 0.2;
    animation: slide 15s infinite linear;
  }

  @keyframes slide {
    from {
      background-position: 0;
    }
    to {
      background-position: 2456px;
    }
  }
}

#categories {
  a {
    display: block;
    position: relative;
    background: rgba($color: $black, $alpha: 0.4);
    color: $white;
    text-decoration: none;
    transition: 1s;
    overflow: hidden;

    &:hover {
      background: rgba($color: $black, $alpha: 0.3);

      &::before {
        transform: scale(1.3);
        filter: blur(3px);
      }
    }

    &::before {
      content: "";
      z-index: -1;
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      transition: 0.5s;
    }

    &.pizza {
      &::before {
        background: url("~/images/pizza-margherita.jpeg");
      }
    }

    &.sushi {
      &::before {
        background: url("~/images/sushi-misto.png");
      }
    }

    &.pasta {
      &::before {
        background: url("~/images/carbonara.png");
      }
    }

    &.hamburger {
      &::before {
        background: url("~/images/hamburger-2.png");
      }
    }

    &.pizza,
    &.sushi,
    &.pasta,
    &.hamburger {
      &::before {
        background-size: cover;
        background-position: center;
      }
    }
  }
}

#download {
  background: linear-gradient(90deg, $white, $grey1);

  h2 {
    color: $color3;
  }
}

#user-area {
  background: $color2;

  a {
    width: 100%;
  }
}
</style>
