<template>
  <div id="app">
    <Header />
    <Main />
    <Footer />
  </div>
</template>

<script>
import Header from "./components/Header.vue";
import Main from "./components/Main.vue";
import Footer from "./components/Footer.vue";

export default {
  name: "App",
  components: {
    Header,
    Main,
    Footer,
  },
};
</script>

<style lang="scss">
@import "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css";
// @import "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css";

@import "~bootstrap/scss/bootstrap";

* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}
</style>
