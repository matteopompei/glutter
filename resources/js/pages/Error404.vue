<template>
  <div>
    <div class="flex-center position-ref full-height">
      <div class="code">Not Found</div>

      <div class="message" style="padding: 10px">404</div>

      <div>
        <router-link
          class="btn my_404-btn text-uppercase mx-2"
          :to="{ name: 'home' }"
        >
          Torna alla home
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Error404",
  data() {
    return {};
  },
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";
html,
body {
  font-weight: 100;
  height: 100vh;
  margin: 0;

  .full-height {
    height: 100vh;
  }

  .flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
  }

  .position-ref {
    position: relative;
  }

  .code {
    border-right: 2px solid;
    font-size: 26px;
    padding: 0 15px 0 15px;
    text-align: center;
  }

  .message {
    font-size: 18px;
    text-align: center;
  }

  .my_404-btn {
    background-color: #f2cc8f;
    color: #f8f9fa;
  }
}
</style>