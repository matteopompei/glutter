<template>
  <main>
    <div class="nav-space"></div>

    <router-view></router-view>
    <Modal ref="modal" />
    <MenuModal ref="dishModal" />
  </main>
</template>

<script>
import Modal from "./Modal.vue";
import MenuModal from "./MenuModal.vue";

export default {
  name: "Main",
  components: {
    Modal,
    MenuModal,
  },
  methods: {
    showModal() {
      let element = this.$refs.modal.$el;
      $(element).modal("show");
    },
    openDishModal() {
      let dishModal = this.$refs.dishModal.$el;
      $(dishModal).modal("show");
    },
  },
  mounted() {
    this.$root.$on("Main", () => {
      this.showModal();
    });

    this.$root.$on("DishModalEvent", () => {
      this.openDishModal();
    });
  },
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

main {
  .nav-space {
    padding-top: 100px;
    background: $color4;
    box-shadow: 0 10px 40px 30px $color4;
  }
}
</style>
